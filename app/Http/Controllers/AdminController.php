<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function indexOrder()
    {
        return view('admin_order');
    }
}
