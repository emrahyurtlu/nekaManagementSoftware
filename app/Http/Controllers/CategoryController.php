<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class CategoryController extends FileController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        $rootCategories = Category::all()->where('parent_id', '==', 0);
        return view('categories.index', ['categories' => $categories, 'rootCategories' => $rootCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $rootCategories = Category::all()->where('parent_id', '==', 0);
        return view('categories.create', ['rootCategories' => $rootCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        if ($request->validated()) {

            $category = new Category();
            $category->name = $request->get('name');
            $category->parent_id = $request->get('parent_id');

            if ($request->hasFile('image')) {
                $category->image = $this->uploadFile('categories');
            }

            $category->save();

            return redirect()->to('/categories');
        } else {
            return redirect()->to('/categories/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        $rootCategories = Category::all()->where('parent_id', '==', 0);
        return view('categories.edit', ['category' => $category, 'rootCategories' => $rootCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->get('name');
        $category->parent_id = $request->get('parent_id');

        if ($request->hasFile('image')) {
            $this->deleteFile($category->image);
            $category->image = $this->uploadFile('categories');
        }

        $category->save();
        return redirect()->to('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        if ($category->isUsed() == false) {
            $this->deleteFile($category->image);
            $category->delete();
        } else {
            throw new Exception('Sistemde bu kategoriye ait ürünler bulunmaktadır. Silinemez.');
        }

    }
}
