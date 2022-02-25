<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate('');
        return view('admin.user.index',compact('users'));
    }
    public function edit($id){
        $users = User::find($id);
        return view('admin.user.edit',compact('users'));
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->update();
        return redirect()->route('user.index');
    }
}
