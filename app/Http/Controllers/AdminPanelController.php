<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{

    //Admin register
    public function adminRegister()
    {
        return view('backend.register');
    }

     //Admin register
     public function adminLogin()
     {
         return view('backend.login');
     }

    //Admin Panel Show
    public function adminPanel()
    {
       return view('backend.admin-panel');
    }
}
