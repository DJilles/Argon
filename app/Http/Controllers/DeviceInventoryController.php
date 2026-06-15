<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceInventoryRequest;
use App\Models\Brand;
use App\Models\DeviceInventory;
use App\Models\DeviceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeviceInventoryController extends Controller
{
    public function index()
    {
        $devices_inventories = DeviceInventory::with('device_type:id,dev_name','brand:id,b_name')->get();
        return view('DeviceInventory.index', compact('devices_inventories'));
    }

    public function create()
    {
        $device_inventory = new DeviceInventory();
        $devices_types = DeviceType::all();
        $brands = Brand::all();
        return view('DeviceInventory.create', compact('device_inventory','devices_types','brands'));
    }
    //Mismo que los de tablas fuertes

    public function store(DeviceInventoryRequest $request)
    {
        $this->validatePassword($request);
        DeviceInventory::create($request->validated());
        return redirect()->route('devices_inventories.index')->with('success','Agregado al inventario.');
    }

    public function show(string $id)
    {
        $device_inventory = DeviceInventory::with(
            'device_type',
            'brand'
        )
        ->findOrFail($id);
        return view('DeviceInventory.show', compact('device_inventory'));

    }

    public function edit(string $id)
    {
        $device_inventory= DeviceInventory::findOrFail($id);
        $devices_types = DeviceType::all();
        $brands = Brand::all();
        return view('DeviceInventory.edit', compact('device_inventory', 'devices_types','brands'));

    }

    //Mismo que los de tablas fuertes
    public function update(DeviceInventoryRequest $request, string $id)
    {
        $device_inventory = DeviceInventory::findOrFail($id);
        $device_inventory->update($request->validated());
        return redirect()->route('devices_inventories.index')->with('success','Inventario actualizado.');
    }

    //Mismo que los de tablas fuertes
    public function destroy(string $id)
    {
        $device_inventory = DeviceInventory::findOrFail($id);
        $device_inventory->delete();
        return redirect()->route('devices_inventories.index')->with('success','Registro eliminado.');
    }

    public function deleteConfirm(string $id){
        $device_inventory = DeviceInventory::findOrFail($id);

        return view('DeviceInventory.delete', compact('device_inventory'));
    }

    private function validatePassword(Request $request){
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
