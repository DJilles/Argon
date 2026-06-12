<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceInventoryRequest;
use App\Models\Brand;
use App\Models\DeviceInventory;
use App\Models\DeviceType;
use Illuminate\Http\Request;

class DeviceInventoryController extends Controller
{
    public function index()
    {
        $devices_inventories = DeviceInventory::with(
            'device_type:name',
            'brand:name'
        )->get();
        return view('DeviceInventory.index', compact('devices_inventories'));
    }

    public function create()
    {
        $device_inventory = new DeviceInventory();
        $devices_types = DeviceType::all();
        $brands = Brand::all();
        return view('DeviceType.create', compact('device_inventory','devices_types','brands'));
    }
    //Mismo que los de tablas fuertes
    public function store(DeviceInventoryRequest $request)
    {
        DeviceInventory::create($request->validated());
        return redirect()->route('devices_inventories.index')->with('success','DeviceInventory creada.');
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
        return redirect()->route('device_inventory.index')->with('success','DeviceInventory actualizado.');
    }

    //Mismo que los de tablas fuertes
    public function destroy(string $id)
    {
        $device_inventory = DeviceInventory::findOrFail($id);
        $device_inventory->delete();
        return redirect()->route('device_inventory.index')->with('success','DeviceInventory eliminado.');
    }


}
