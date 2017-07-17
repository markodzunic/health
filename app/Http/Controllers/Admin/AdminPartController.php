<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Practice;
use Auth;

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
      $user = Auth::user();
      $practice = Practice::where('user_id', '=', $user->id)->first();

        return view('home', [
          'practice' => $practice,
        ]);
    }
}
