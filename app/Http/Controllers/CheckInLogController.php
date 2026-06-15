<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckInLogRequest;
use App\Models\CheckInLog;
use App\Models\UserDev;
use Illuminate\Http\Request;

class CheckInLogController extends Controller
{
    public function index()
    {
        $check_in_logs= CheckInLog::with('user_dev')->get();
        return view('CheckInLog.index', compact('check_in_logs'));
    }

    public function create()
    {
        $check_in_log = new CheckInLog();
        $users_devs = UserDev::all();
        return view('CheckInLog.create', compact('check_in_log','users_devs'));
    }

    public function store(CheckInLogRequest $request)
    {
        $data = $request->validated();
        $loans = UserDev::findOrFail($data['user_dev_id']);
        $data['device_inventory_id'] = $loans->device_inventory_id;

        CheckInLog::create($data);
        return redirect()->route('check_in_logs.index')->with('success','Equipo devuelto con éxito. El dispositivo ya está disponible nuevamente.');
    }

    public function show(string $id)
    {
        $check_in_log = CheckInLog::with('user_dev')->findOrFail($id);
        return view('CheckInLog.show',compact('check_in_log'));
    }

    public function edit(string $id)
    {
        $check_in_log = CheckInLog::findOrFail($id);
        $users_devs = UserDev::all();
        return view('CheckInLog.edit',compact('check_in_log','users_devs'));
    }

    public function update(CheckInLogRequest $request, string $id)
    {
        $check_in_log =CheckInLog::findOrFail($id);
        $check_in_log->update($request->validated());
        return redirect()->route('check_in_log.index')->with('success','CheckInLog actualizado.');
    }

    public function destroy(string $id)
    {
        $check_in_log = CheckInLog::findOrFail($id);
        $check_in_log->delete();
        return redirect()->route('check_in_log.index')->with('success','CheckInLog eliminado.');
    }

}
