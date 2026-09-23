<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function indexLogin()
    {
        return view('admin_login');
    }

    public function indexOrder()
    {
        return view('admin_order');
    }
}
