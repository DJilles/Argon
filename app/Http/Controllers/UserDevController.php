<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDevRequest;
use App\Models\DeviceInventory;
use App\Models\UserDev;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class UserDevController extends Controller
{
    public function index()
    {
        $users_devs = UserDev::with(
            'device_inventory:inv_num'
        )->get();
        return view('UserDev.index', compact('users_devs'));

    }

    public function create()
    {
        $user_dev = new UserDev();
        $devices_inventories = DeviceInventory::all();
        return view('UserDev.create', compact('user_dev', 'devices_inventories'));
    }

    public function store(UserDevRequest $request)
    {
        UserDev::create($request->validated());
        return redirect()->route('users_devs.index')->with('success','UserDev creado.');
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
        return view('UserDev.edit',compact('user_dev','devices_inventories'));
    }

    public function update(UserDevRequest $request, string $id)
    {
        $user_dev = UserDev::findOrFail($id);
        $user_dev->update($request->validated());
        return redirect()->route('user_dev.index')->with('success','UserDev actualizado.');
    }

    public function destroy(string $id)
    {
        $user_dev = UserDev::findOrFail($id);
        $user_dev->delete();
        return redirect()->route('user_dev.index')->with('success','UserDev eliminado.');
    }
}
