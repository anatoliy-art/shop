<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class ProductController extends Controller
{
    public function category($id)
    {
        $products = Product::orderBy('id', 'desc')->where('category_id', $id)->with('category')->paginate(9);
        $category = Category::find($id);

        return view('product.category', compact('products', 'category'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $products = Product::orderBy('id', 'desc')->where('category_id', $product->category->id)->with('category')->limit(16)->get();
        $comments = Comment::orderBy('id', 'desc')->where('product_id', $id)->where('is_published', 1)->get();

        $all_img = [];
        if(!empty($product->gallery) && $product->thumbnail){
            $all_img = Arr::prepend($product->gallery, $product->thumbnail);
        }elseif(empty($product->gallery) && $product->thumbnail){
            $all_img[] = $product->thumbnail;
        }elseif(!empty($product->gallery)){
            $all_img = $product->gallery;
        }

        $product->increment('view');
        
        return view('product.show', compact('product', 'products', 'comments', 'all_img'));
    }

    public function comment(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:255',
            'comment' => 'required|string|min:10|max:1000',
            'rate' => 'required',
        ]);
        
        $data['product_id'] = $product->id;

        Comment::create($data);

        if($product->stars == 0){
            $product->update(['stars' => $request['rate']]);
        }else{
            $product->update(['stars' => ceil(($product->stars + $request['rate']) / 2)]);
        }

        return redirect()->back()->with('success', 'Коментарий успешно добавлен, после рассмотрения администратора он будет размещен.');
    }

    public function search(Request $request)
    {
        $data = $request->validate([
            's' => 'required|string',
        ]);

        $search = $data['s'];
        
        $products = Product::query()
            ->when($search, function ($query, $search_term) {
                $query->where('title', 'like', '%' . $search_term . '%')
                      ->orWhere('description', 'like', '%' . $search_term . '%');
            })
            ->paginate(12)
            ->withQueryString();

        return view('product.search', compact('products', 'search'));
    }

}
