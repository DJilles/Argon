<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceTypeRequest;
use App\Models\DeviceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeviceTypeController extends Controller
{
    public function index(){
        $devices_types = DeviceType::all();
        return view('DeviceType.index', compact('devices_types'));
    }

    public function create() {
        $device_type = new DeviceType();
        return view('DeviceType.create',compact('device_type'));
    }

    public function store(DeviceTypeRequest $request){
        $this->validatePassword($request);
        DeviceType::create($request->validated());
        return redirect()->route('devices_types.index')->with('success','Registro creado.');
    }

    public function show(string $id){
        $device_type = DeviceType::findOrFail($id);
        return view('DeviceType.show', compact('device_type'));
    }

    public function edit(string $id){
        $device_type = DeviceType::findOrFail($id);
        return view('DeviceType.edit', compact('device_type'));
    }

    public function update(DeviceTypeRequest $request, string $id){
        $device_type = DeviceType::findOrFail($id);
        $device_type->update($request->validated());
        return redirect()->route('devices_types.index')->with('success','DeviceType actualizado.');
    }

    public function destroy(Request $request,string $id){
        $this->validatePassword($request);

        $device_type = DeviceType::findOrFail($id);
        $device_type->delete();
        return redirect()->route('devices_types.index')->with('success','Registro eliminado.');
    }

    public function deleteConfirm(string $id){
        $device_type = DeviceType::findOrFail($id);

        return view('DeviceType.delete', compact('device_type'));
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
