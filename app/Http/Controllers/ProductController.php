<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MassUnit;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ProductController extends FileController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $massUnits = MassUnit::all();
        return view('products.create', ['categories' => $categories, 'brands' => $brands, 'massUnits' => $massUnits]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        if ($request->validated()) {

            $product = new Product();
            $product->name = $request->get('name');
            $product->mass = $request->get('mass');
            $product->barcode = $request->get('barcode');
            $product->brand_id = $request->get('brand_id');
            $product->category_id = $request->get('category_id');
            $product->mass_unit_id = $request->get('mass_unit_id');

            if ($request->hasFile('image')) {
                $product->image = $this->uploadFile($request, 'public/products');
            }

            $product->save();

            return redirect()->to('/products');
        } else {
            return redirect()->to('/products/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return void
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $massUnits = MassUnit::all();
        return view('products.edit', ['product' => $product, 'categories' => $categories, 'brands' => $brands, 'massUnits' => $massUnits]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->get('name');
        $product->mass = $request->get('mass');
        $product->barcode = $request->get('barcode');
        $product->brand_id = $request->get('brand_id');
        $product->category_id = $request->get('category_id');
        $product->mass_unit_id = $request->get('mass_unit_id');

        if ($request->hasFile('image')) {
            Storage::disk('local')->delete("public/products/{$product->image}");
            $product->image = $this->uploadFile($request, 'public/products');
        }

        $product->save();
        return redirect()->to('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return void
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        $this->deleteFile("public/products/{$product->image}");
        $product->delete();
    }
}
