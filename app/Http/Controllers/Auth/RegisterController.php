<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'title' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'occupation' => 'required|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create($data)
    {
        $user = new User;

        $user->role_id = 2;
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->title = $data['title'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->date_of_birth = $data['date_of_birth'];
        $user->position_type = 'User';
        $user->avatar = 'avatar.png';
        $user->gender = $data['gender'];
        $user->phone = $data['phone'];
        $user->occupation = $data['occupation'];
        $user->med_reg_number = 0;
        $user->authorised_user = 0;
        $user->approved = 0;
        $user->active = 1;
        $user->save();

        return $user;
    }
}
