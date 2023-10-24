<?php

namespace App\Http\Controllers\Dashboard\Session;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionGroupRequest;
use App\Models\Sessiongroup;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SessionGroupController extends Controller
{
    //
    public function index(){
        $sessionGroups = Sessiongroup::all();
        return view('admin.sessions.index', compact('sessionGroups'));
    }

    public function create(){
        $teachers = Teacher::all();
        return view('admin.sessions.create', compact('teachers'));
    }

    public function store(SessionGroupRequest $request){
        $sessionGroup = $request->validated();
        $sessionGroup = Sessiongroup::create($sessionGroup);
        return redirect()->route('admin.sessions.index');
    }

    public function destroy($id){
        $sessionGroup = Sessiongroup::find($id);
        $sessionGroup->delete();
        return redirect()->route('admin.sessions.index');
    }
    public function edit($id){
        $sessionGroup = Sessiongroup::find($id);
        $teachers = Teacher::all();
        return view('admin.sessions.edit', compact('sessionGroup', 'teachers'));
    }

    public function update(Request $request){
        $sessionGroup = $request->all();
        $sessionGroupO = Sessiongroup::find($sessionGroup['id']);
        $sessionGroupO->update($sessionGroup);
        return redirect()->route('admin.sessions.index');
    }
}
