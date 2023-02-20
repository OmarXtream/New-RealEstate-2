<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Toastr;
use Auth;
use Hash;

use Validator;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('admin.users.index', compact('users'));
    }


    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);
        $user->delete();

        Toastr::success('message', 'تم حذف المستخدم بنجاح.');
        return back();
    }


    public function createUser(Request $request){

        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6',
        ]);

        $username   = strtok($request['name'], " "); 

        $user = User::create([
            'name'      => $request['name'],
            'email'     => $request['email'],
            'password'  => Hash::make($request['password']),
            'username'  => $username,
            'role_id'   => 3 //normal user
        ]);

        if(!$user->save()){
            return redirect()->back()
            ->withErrors(['حدث خطأ ما , حاول مره أخرى']);
        }else{
            return redirect()->back()->with('message', 'تم إنشاء الحساب بنجاح');
        }
    }


    public function userCreate(){
        return view('admin.users.createUser');

    }
}
