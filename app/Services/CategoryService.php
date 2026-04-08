<?php

namespace App\Services;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
//use App\Models\Image;
use Illuminate\Support\Facades\File;

class CategoryService
{
    public function create($data, $request): Category
    {
        if($request->hasFile('thumbnail')){
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("category/{$folder}", 'public_uploads');
        }

        return Category::create($data);
    }

    public function update($data, $request, Category $category): Category
    {
        if($category->thumbnail && $request->boolean('clear_img')){
            Storage::disk('public_uploads')->delete($category->thumbnail);
            $data['thumbnail'] = null;
        }

        if($request->hasFile('thumbnail')){

            if($category->thumbnail && Storage::disk('public_uploads')->exists($category->thumbnail)){
                Storage::disk('public_uploads')->delete($category->thumbnail);
            }

            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("posts/{$folder}", 'public_uploads');
        }

        $category->update($data);
        
        if(!blank($category->thumbnail)){
            $directory = public_path() . '/uploads/' . dirname($category->thumbnail);
            if (File::exists($directory) && File::isEmptyDirectory($directory)) {
                File::deleteDirectory($directory);
            }        
        }

        return $category;
    }

    public function delete(Category $category): Category
    {
        if($category->thumbnail && Storage::disk('public_uploads')->exists($category->thumbnail)){
            Storage::disk('public_uploads')->delete($category->thumbnail);
        }
        $category->delete();
        
        return $category;
    }

}