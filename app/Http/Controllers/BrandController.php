<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $this->validatePassword($request);
        Brand::create($request->validated());
        return redirect()->route('brands.index')->with('success','Marca creada.');
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
        return redirect()->route('brands.index')->with('success','Marca actualizada.');
    }

    public function destroy(string $id){
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()-> route('brands.index')->with('success','Brand eliminada.');
    }

    public function deleteConfirm(string $id){
        $brand = Brand::findOrFail($id);

        return view('Brand.delete', compact('brand'));
    }

    public function validatePassword(Request $request){
        $request->validate([
            'password_confirmation' => 'required'
        ], [
            'password_confirmation.required' =>'Debe introducir su contraseña para ejectuar esta acción'
        ]);

        if (!Hash::check($request->password_confirmation, Auth::user()->password)){
            abort(back()->withErrors([
                'password_confirmation' => 'La contraseña ingresada no es correcta.'
            ]))->withInput();
        }
    }


}
