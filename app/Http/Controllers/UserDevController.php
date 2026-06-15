<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDevRequest;
use App\Models\DeviceInventory;
use App\Models\UserDev;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class UserDevController extends Controller
{
    public function index()
    {
        $users_devs = UserDev::with('device_inventory:id,inv_num')->get();
        return view('UserDev.index', compact('users_devs'));

    }

    public function create()
    {
        $user_dev = new UserDev();

        // Muestra los Ids de todos los dispositivos prestados alguna vez
        $loans = DB::table('users_devs')->pluck('device_inventory_id')->toArray();

        //Dispositivos ya regresados
        $returned = DB::table('check_in_logs')->pluck('device_inventory_id')->toArray();

        $used = array_diff($loans,$returned);


        $devices_inventories = DeviceInventory::query()->whereNotIn('id',$used)->get();

        $roles = [
            't'=> 'Profesor',
            's'=> 'Estudiante',
            'w'=> 'Trabajador del centro'
        ];

        $gender = [
            'f'=> 'Femenino',
            'm'=> 'Masculino'
        ];

        $semester = [
            1 => 'I Semestre',
            2 => 'II Semestre',
        ];

        return view('UserDev.create', compact('user_dev', 'devices_inventories', 'roles','gender','semester'));
    }

    public function store(UserDevRequest $request)
    {
        $data = array_merge($request->validated(),[
            'check_out_date' =>now()
        ]);

        UserDev::create($data);
        return redirect()->route('users_devs.index')->with('success','Registro creado con éxito.');
    }

    public function show(string $id)
    {
        $user_dev = UserDev::with('device_inventory')->findOrFail($id);
        return view('UserDev.show', compact('user_dev'));
    }

    public function edit(string $id)
    {
        $user_dev = UserDev::findOrFail($id);
        $devices_inventories = DeviceInventory::all();

        $roles = [
            't'=> 'Profesor',
            's'=> 'Estudiante',
            'w'=> 'Trabajador del centro'
        ];

        $gender = [
            'f'=> 'Femenino',
            'm'=> 'Masculino'
        ];

        $semester = [
            1 => 'I Semestre',
            2 => 'II Semestre',
        ];

        return view('UserDev.edit',compact('user_dev','devices_inventories','roles','gender','semester'));
    }

    public function update(UserDevRequest $request, string $id)
    {
        $user_dev = UserDev::findOrFail($id);
        $user_dev->update($request->validated());
        return redirect()->route('users_devs.index')->with('success','UserDev actualizado.');
    }

    public function destroy(string $id)
    {
        $user_dev = UserDev::findOrFail($id);
        $user_dev->delete();
        return redirect()->route('users_devs.index')->with('success','UserDev eliminado.');
    }
}
