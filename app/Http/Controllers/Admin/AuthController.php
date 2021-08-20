<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AuthController extends Controller
{
    public function index()
    {
        return view('BackendAdmin.layouts.auth.login');
    }
    public function check(Request $request)
    {
        $data=$request->all();
        $user=Admin::where('email','=',$request->email)->first();
        if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            $request->session()->put('LonggedUser',$user->id);
            return redirect()->route('staff.dashboard');
        }else{
            return back()->with('error','Check Username or Password');
        }

    }
    public function logout(){
        if(session()->has('LonggedUser')){
            session()->pull('LonggedUser');
            return redirect(route('staff.login'));
        }
    }
}
