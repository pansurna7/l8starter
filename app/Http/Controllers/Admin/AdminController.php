<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if(session()->has('LonggedUser')){
            $userAdmin=Admin::where('id',session('LonggedUser'))->first();
            $data=[
                'LonggedUserInfo'=>$userAdmin,
            ];
        }
        return view('BackendAdmin.dashboard',$data);

    }
}
