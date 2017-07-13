<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    protected $redirectToLog = '/login';

    protected $messageBag;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MessageBag $messageBag)
    {
        $this->middleware('guest')->except('logout');
        $this->messageBag = $messageBag;
    }

    public function getLogin(Request $request) {
      $data = $request->all();

      $errors = isset($data['errors']) ? json_decode($data['errors'],1) : $this->messageBag;

      if ($errors) {
        foreach ($errors as $key => $value) {
          $this->messageBag->add($key, $value);
        }
      }

      return view('public.Login.login', ['errors' => $errors])->withErrors($errors);
    }
}
