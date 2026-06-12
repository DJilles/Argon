<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('Brand.index', compact('brands'));
    }

    public function create(){
        $brand = new Brand();
        return view('Brand.create', compact('brand'));
    }

    public function store(BrandRequest $request){
        Brand::create($request->validated());
        return redirect()->route('brands.index')->with('success','Brand creada.');
    }

    public function show(string $id){
        $brand = Brand::findOrFail($id);
        return view('Brand.show', compact('brand'));
    }

    public function edit(string $id){
        $brand = Brand::findOrFail($id);
        return view('Brand.edit', compact('brand'));
    }

    public function update(BrandRequest $request, string $id){
        $brand = Brand::findOrFail($id);
        $brand->update($request->validated());
        return redirect()->route('brands.index')->with('success','Brand actualizada.');
    }

    public function destroy(string $id){
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()-> route('brands.index')->with('success','Brand eliminada.');
    }


}
