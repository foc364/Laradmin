<?php

namespace Larashop\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Larashop\Http\Controllers\Controller;
use Larashop\Models\Brand;

class BrandsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        $params = [
            'title' => 'Brands Listing',
            'brands' => $brands,
        ];

        return view('admin.brands.brands_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.brands_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $brand = Brand::create([
            'name' => $request->input('brand'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('brands.index')->with('success', "The brand <strong>$brand->name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.brands.brands_delete');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.brands.brands_edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('brands.index')->with('success', "The brand <strong>Brand</strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('brands.index')->with('success', "The brand <strong>Brand</strong> has successfully been archived.");
    }
}