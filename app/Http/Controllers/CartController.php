<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add(Product $product)
    {
        if($product->colors || $product->sizes){
            return redirect()->back()->with('error', 'Is Product esty options!');
        }
        
        $cart = session()->get('cart', []);
        
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += 1; // Увеличиваем, если есть
            $cart[$product->id]['summ'] += $product->price;
        } else {
            $cart[$product->id] = [
                "thumbnail" => $product->thumbnail,
                "title" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "summ" => $product->price,
            ];
        }


        if(session()->has('totalQty')){
            session(['totalQty' => session()->get('totalQty') + 1]);
        }else{
            session(['totalQty' => 1]);
        }

        if(session()->has('totalSumm')){
            session(['totalSumm' => session()->get('totalSumm') + $product->price ]);
        }else{
            session(['totalSumm' => $product->price]);
        }
            
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Is Product ' .$product->title. ' success add to cart!');

    }

    public function addCartShow(Request $request, Product $product)
    {
        $validate = $request->validate([
            'qty' => 'required|min:1'
        ]);

        if($product->colors || $product->sizes){
            return redirect()->back()->with('error', 'Is Product esty options!');
        }
    
        $cart = session()->get('cart', []);
        
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $validate['qty']; // Увеличиваем, если есть
            $cart[$product->id]['summ'] += $product->price * $validate['qty'];
        } else {
            $cart[$product->id] = [
                "thumbnail" => $product->thumbnail,
                "title" => $product->title,
                "quantity" => $validate['qty'],
                "price" => $product->price,
                "summ" => $product->price * $validate['qty'],
            ];
        }


        if(session()->has('totalQty')){
            session(['totalQty' => session()->get('totalQty') + $validate['qty']]);
        }else{
            session(['totalQty' => $validate['qty']]);
        }

        if(session()->has('totalSumm')){
            session(['totalSumm' => session()->get('totalSumm') + ($product->price * $validate['qty']) ]);
        }else{
            session(['totalSumm' => $product->price * $validate['qty']]);
        }
            
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Is Product ' .$product->title. ' success add to cart!');

    }

    public function clear()
    {
        session()->forget('cart');
        session()->forget('totalQty');
        session()->forget('totalSumm');
        return redirect()->back()->with('success', 'Is Cart success clear!');        
    }

    public function delete($key)
    {
        session(['totalQty' => session()->get('totalQty') - session()->get("cart.$key.quantity")]);
        session(['totalSumm' => session()->get('totalSumm') - session()->get("cart.$key.summ")]);
        session()->forget("cart.$key");
        return redirect()->back()->with('success', 'Is Cart item success delete!');        
    }

    public function order(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        if (auth()->check()) {
            $data['user_id'] = auth()->id();
        }else{
            $data['user_id'] = null;
        }

        $data['qty'] = session()->get('totalQty');
        $data['summ'] = session()->get('totalSumm');

        $order = Order::create($data);

        foreach(session()->get('cart') as $key => $value){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $key,
                'thumbnail' => $value['thumbnail'],
                'title' => $value['title'],
                'price' => $value['price'],
                'qty_item' => $value['quantity'],
                'summ_item' => $value['summ'],
            ]);
        }
        session()->forget('cart');
        session()->forget('totalQty');
        session()->forget('totalSumm');

        return redirect()->back()->with('success', 'Заказ успешно создан, менеджер вскоре свяжется с Вами!');
    }

}
