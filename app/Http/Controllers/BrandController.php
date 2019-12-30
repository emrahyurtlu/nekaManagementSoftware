<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class BrandController extends FileController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(BrandRequest $request)
    {
        if ($request->validated()) {

            $brand = new Brand();
            $brand->name = $request->get('name');

            if ($request->hasFile('image')) {
                $brand->image = $this->uploadFile( 'brands');
            }

            $brand->save();

            return redirect()->to('/brands');
        } else {
            return redirect()->to('/brands/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Brand $brand
     * @return Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     * @return Response
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Brand $brand
     * @return Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->name = $request->get('name');
        if ($request->hasFile('image')) {
            $this->deleteFile($brand->image);
            $brand->image = $this->uploadFile('brands');
        }

        $brand->save();
        return redirect()->to('/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return Response
     * @throws Exception
     */
    public function destroy(Brand $brand)
    {
        if ($brand->isUsed() == false) {
            $this->deleteFile($brand->image);
            $brand->delete();
        } else {
            throw new Exception('Sistemde bu markaya ait ürünler bulunmaktadır. Silinemez.');
        }
    }
}
