<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->with('category')->paginate(10);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('thumbnail')){
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("posts/{$folder}", 'public_uploads');
        }

        if($request->hasFile('gallery')){
            $folder = date('Y-m-d');
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store("posts/{$folder}", 'public_uploads');
            }
            $data['gallery'] = $gallery;
        }
                 
        $product = Product::create($data);

        return redirect('/admin/products/' . $product->id)->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        
        $data['hit'] = $request->has('hit') == 1;
        $data['new'] = $request->has('new') == 1;
        $data['sale'] = $request->has('sale') == 1;

        if($product->thumbnail && $request->boolean('clear_img')){
            if(Storage::disk('public_uploads')->exists($product->thumbnail)){
                Storage::disk('public_uploads')->delete($product->thumbnail);
            }            
            $data['thumbnail'] = null;
        }

        if($product->gallery && $request->boolean('clear_gallery')){

            foreach($product->gallery as $photo){
                if(Storage::disk('public_uploads')->exists($photo)){
                    Storage::disk('public_uploads')->delete($photo);
                }                
            }
            
            $data['gallery'] = null;
        }

        if($request->hasFile('thumbnail')){

            if($product->thumbnail && Storage::disk('public_uploads')->exists($product->thumbnail)){
                Storage::disk('public_uploads')->delete($product->thumbnail);
            }

            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("posts/{$folder}", 'public_uploads');
        }


        if($request->hasFile('gallery')){

            if($product->gallery){

                foreach($product->gallery as $photo){
                    if(Storage::disk('public_uploads')->exists($photo)){
                        Storage::disk('public_uploads')->delete($photo);
                    }                
                }
            }

            $folder = date('Y-m-d');
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store("posts/{$folder}", 'public_uploads');
            }
            $data['gallery'] = $gallery;
        }
        
        if(!isset($data['colors']) || $data['colors'][0] == 0){
            $data['colors'] = null;
        }
        if(!isset($data['sizes']) || $data['sizes'][0] == 0){
            $data['sizes'] = null;
        }
                 
        $product->update($data);

        return redirect('/admin/products/' . $product->id)->with('success', 'Product created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->thumbnail){
            if(Storage::disk('public_uploads')->exists($product->thumbnail)){
                Storage::disk('public_uploads')->delete($product->thumbnail);
            }
        }

        if($product->gallery){

            foreach($product->gallery as $photo){
                if(Storage::disk('public_uploads')->exists($photo)){
                    Storage::disk('public_uploads')->delete($photo);
                }                
            }
            $product->delete();

        }
        return redirect()->route('admin.products.index')->with('success', 'Product delete successfully!');
    }

    public function search(Request $request)
    {
        $data = $request->validate([
            's' => 'required'
        ]);
        //dd($data['s']);

        $search = $data['s'];

        $products = Product::query()
            ->when($search, function ($query, $search_term) {
                $query->where('title', 'like', '%' . $search_term . '%')
                      ->orWhere('description', 'like', '%' . $search_term . '%');
            })
            ->paginate(10)
            ->withQueryString();

        return view('admin.product.index', compact('products'));       

    }

}
