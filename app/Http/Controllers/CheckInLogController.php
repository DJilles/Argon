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
        CheckInLog::create($request->validated());
        return redirect()->route('check_in_logs.index')->with('success','CheckInLog creado.');
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
        return redirect()->route('check_in_log.index')->with('success','CheckInLog eliminado.')
    }

}
