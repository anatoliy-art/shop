<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(
        CategoryService $categoryService
    ){
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        $category = $this->categoryService->create($data, $request);

        return redirect('/admin/categories/' . $category->id)->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        $category = $this->categoryService->update($data, $request, $category);

        return redirect('/admin/categories/' . $category->id)->with('success', 'Category created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);

        return redirect()->route('admin.categories.index')->with('success', 'Category delete success!');
    }

    public function search(Request $request, Category $category)
    {
        $data = $request->validate([
            'search' => 'required'
        ]);
        //dd($data['s']);

        $search = $data['search'];

        $categories = Category::query()
            ->when($search, function ($query, $search_term) {
                $query->where('title', 'like', '%' . $search_term . '%')
                      ->orWhere('description', 'like', '%' . $search_term . '%');
            })
            ->paginate(2)
            ->withQueryString();

        return view('admin.category.index', compact('categories'));       

    }

}
