<?php

namespace App\Http\Controllers\backend;

use App\Domains\Auth\Services\CategoryService;
use App\Domains\Auth\Services\MediaUploadService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {  
        $category = $this->categoryService->store($request->validated()); 
        return redirect()->route('admin.category')->withFlashSuccess(__('The Category was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category = $this->categoryService->update($category,$request->validated()); 
        return redirect()->route('admin.category')->withFlashSuccess(__('The Category was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    { 
        try {
            $isDeleted = $this->categoryService->destroy($category);
            if ($isDeleted) {
                return redirect()->route('admin.category')->withFlashSuccess(__('The Category was successfully deleted.'));
            } else {
                return redirect()->route('admin.category')->withFlashDanger(__('Failed to delete the Category.'));
            }
        } catch (\Throwable $th) {
            return redirect()->route('admin.category')->withFlashDanger(__('An error occurred: ') . $th->getMessage());
        }
    }
}
