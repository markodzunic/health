<?php

namespace App\Modules\AdminPart\Controllers\Auth;

use Validator;
use Mail;
use Auth;
use Session;

use App\Models\User;
use App\Models\Role;
use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use ThrottlesLogins;

    /**
     * This is used to redirect to the home link when validation pass
     * @var string
     */
    protected $redirectTo = '/AdminPart';
    /**
     * This is the login path for the application
     * @var string
     */
    protected $loginPath = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest', ['only' => 'getLogin']);
    }

    /**
     * This is the function that takes care of a get request to the root route.
     * 
     * @return view Homepage when user is logged in | Login Form
     */
    public function getLogin() {

        // If the user has already klgge in go to the homepage
        if (Auth::check()) {
            return redirect($this->redirectTo);
        }

        // Returning the login page if user is not already logged in
        return view('AdminPart::Login.index');
    }

    /**
     * This is the sendInvite method which is used to create 
     * a new user.
     * 
     * @return view           Response | Redirect
     */
    public function sendInvite(Request $request) {

        // First let's validate only the email address
        if ($request->has('username') && filter_var($request->username, FILTER_VALIDATE_EMAIL)) {

            // Try to see if we have a deactivated user with that email
            $assumedUser = User::where('email', $request->username)->where('status', 0)->first();

            // If we have then reactivate the user
            if (!is_null($assumedUser)) {
                // Reactivating by setting status to 1
                $assumedUser->status = 1;
                $assumedUser->save();

                // Let's send a mail to the user telling him/her that his/her account was reactivated
                Mail::send('emails.reactivation', ['user' => $assumedUser], function ($message) use ($assumedUser) {
                    $message->from((Auth::user()->email ? Auth::user()->email : 'invitation@theautominer.com'), 'The Autominer'.(Auth::user()->name ? ' - '.Auth::user()->name : ''));
                    $message->to($assumedUser->email, $assumedUser->name);
                    $message->subject('Your Account Was Reactivated Successfully.');
                });

                // Return to the users page with session
                return redirect('/users')->with('status', 'This account ('. $assumedUser->email .') was reactivated successfully.');
            }

            // check if email is taken and return user msg
            $userExists = User::where('email', $request->username)->first();
            if($userExists){
                return redirect('/users')->withErrors('The email "'. $userExists->email .'" is already taken/registered!');
            }
        }

        // Building custom error messages for the role and group fields
        $errorMessages = [
            'email.required'    => 'The email field is required.',
        ];

        // Validating the request parameters
        $this->validate($request, [
            'username'    => 'required|email|max:255|unique:users',
        ], $errorMessages);

        // Saving user's details if validations has passed
        $user = $this->create($request->all());
        $sender_email = Auth::user()->email;
        $sender_name = Auth::user()->name;

        // Sending the invitaion to the user
        if(filter_var(trim($user->email), FILTER_VALIDATE_EMAIL)) {
            Mail::send('emails.invitation', ['user' => $user], function ($message) use ($user, $sender_email, $sender_name) {
                $message->from(($sender_email ? $sender_email : 'invitation@theautominer.com'), 'The Autominer' . ($sender_name ? ' - ' . $sender_name : ''));
                $message->to($user->email);
                $message->subject('An Invitation To Create An Account');
            });
        } else {
            return redirect('/users')->withErrors('Invalid email "'. $user->email .'" !');
        }

        // Returning to the accounts page with session
        return redirect('/users')->with('status', 'New invitation was sent successfully.');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $data_array = [
            'email' => $data['email'],
            'status' => 0,
            'group_id' => $data['group_id'],
            'role_id' => $data['role_id'],
            'security_question' => '',
            'security_answer' => '',
            'sender_name' => '',
            'name_prefix' => ''
        ];
        $inserted = User::create($data_array);
        return User::find($inserted->id);
    }

    /**
     * This is the acceptInvite method which is responsible for allowing
     * users to accept the invitation by providing their full name and
     * a password to authenticate them.
     *
     * @param  integer $id This is the id of the user
     * @return view        Home | Login | Accept Invite
     */
    public function acceptInvite(Request $request, $id) {
        // Finding the user by the unique id
        $user = User::where('id', $id)->first();

        //If no user is found return back with an error status
        if (is_null($user)) {
            return redirect('/error')
                    ->withErrors('Your account is invalid or has been deleted. Please request for a new invitation.');
        }

        // If user has already been activated prompt them
        if ($user->status == 1) {
            return redirect('/auth/login')->with('status', 'You\'ve already activated your account. Please log in.');
        }

        // If user has already been deactivated prompt them
        if ($user->status == 2) {
            return view('errors.error_page')->withErrors('Your account has been deactivated. Please request for a new invitation.');
        }

        // If the reset request is a post request ...
        if ($request->isMethod('post')) {
            // Get all request into an array - request
            $request = $request->all();

            // Validating the request
            $validator = Validator::make($request, [
                'name'              => 'required|max:255',
                'name_prefix'       => 'required|max:255|unique:users,sender_name',
                'password'          => 'required|confirmed|min:6',
                'security_question' => 'required|max:255',
                'security_answer'   => 'required|max:255'
            ]);

            // If validations fail go back to the form with the errors
            if ($validator->fails()) {
                return redirect('/accept_invite/'. $user->id)
                        ->with('user', $user)
                        ->withInput(['name' => $request['name']])
                        ->withErrors($validator);
            }

            // We are assigning the request values to the user fields
            $user->name              = ucwords($request['name']);
            $user->sender_name       = $request['name_prefix'];
            $user->password          = bcrypt($request['password']);
            $user->security_question = $request['security_question'];
            $user->security_answer   = $request['security_answer'];

            // Now activating the user
            $user->status = 1;

            // Saving and returning to the login page
            $user->save();

            // Extracting the login credentials from the request object
            $credentials = [
                'email'    => $request['email'],
                'password' => $request['password']
            ];

            // Trying to login the user automatically, but if it fails
            // Redirect the user to login manually
            if (Auth::attempt($credentials)) {
                return redirect($this->redirectPath());
            }

            return redirect($this->loginPath());
        }

        return view('auth.accept_invite', ['user' => $user]);
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
            'email'    => 'required|email|max:255|unique:users',
            'role_id'  => 'required',
            'group_id' => 'required',
        ]);
    }
}
