<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminPartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function index() {
        return view('home');
    }
}
