<?php

namespace App\Http\Controllers\Auth;

use DB;
use Password;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Message;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * This is the title of the email to reset passwords
     * 
     * @var string
     */
    protected $subject = 'Your Password Reset Link | The AutoMiner';

    /**
     * This is the time taken for the token to expire. It is store in
     * minutes
     * 
     * @var integer
     */
    protected $tokenDuration = 3600;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        //Finding the user in the database
        $user = User::where('email', $request->only('email'))->first();

        if (is_null($user)) {
            return redirect()->back()->withErrors('This email does not exist, please ask for an invitation.');
        }

        // If user has already been deactivated prompt them
        if ($user->status == 2) {
            return view('errors.error_page')->withErrors('Your account has been deactivated. Please request for a new invitation.');
        }

        //If the user has not confirmed his or her account yet 
        //Flash a message to them to remind them of the invitation
        if ($user->status == 0) {
            return redirect('/accept_invite/' . $user->id)->with('status', 'You\'ve not activated your account. Please confirm your account.');
        }
		
		//If has security question redirect to ask it
		$securityAnswer = $request->has('security_answer') ? $request->input('security_answer') : '';
		if($user->security_question && $user->security_answer){
			if(trim($user->security_answer) != trim($securityAnswer)){
				return redirect('/security_question?email='.($user->email));
			}
		}

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->from('support@theautominer.com', 'The AutoMiner');
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));

            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }
	
    /**
     * Display the security question.
     *
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function securityQuestion(Request $request)
    {
        //Finding the user in the database
        $user = User::where('email', $request->only('email'))->first();

        if (is_null($user)) {
            return redirect('/error')->withErrors('This email does not exist, please ask for an invitation.');
        }
		
		//If the user has not confirmed his or her account yet 
        //Flash a message to them to remind them of the invitation
        if ($user->status != 1) {
            return redirect('/accept_invite/' . $user->id)->with('status', 'You\'ve not activated your account. Please confirm your account.');
        }
		//If has security question redirect to ask it
		$securityAnswer = $request->has('security_answer') ? $request->input('security_answer') : '';
		if($user->security_question && $user->security_answer){
			if(trim($user->security_answer) != trim($securityAnswer)){
				if(isset($_POST['security_answer']))
					$result = view('auth.security_question')->with('user', $user)->withErrors($securityAnswer ? 'Incorrect answer.' : 'Please specify an answer.');
				else
					$result = view('auth.security_question')->with('user', $user);
				return $result;
			}
		}

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->from('support@theautominer.com', 'The AutoMiner');
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect('/password_reset/')->with('status', trans($response));

            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
	}

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function getReset(Request $request, $token = null)
    {
        $token = trim($token);

        //Making sure the token is not empty
        if (is_null($token)) {
            throw new NotFoundHttpException;
        } 

        //Getting the reset data from the password_resets table
        //so that we will auto-populate the email field
        $token = DB::table('password_resets')->where('token', $token)->first();

        //If the token does not exist, redirect the user to the password_reset page
        //to get a genuine reset token;
        if (is_null($token)) {
            return redirect('/password_reset')->withErrors('Your reset token does not exist or has been delete. Please generate a genuine one.');
        }

        //If the token has expired, redirect the user to generate a new
        //password reset token by entering his/her email
        if ($this->tokenExpired($token->created_at) === true) {
            //Deleting the expired token from the database
            DB::table('password_resets')->where('token', $token->token)->delete();

            return redirect('/password_reset')->withErrors('Your reset token has expired. Please generate a new one.');
        }

        //Returning the view
        return view('auth.reset')->with('token', $token);
    }

    /**
     * Determine if the token has expired.
     *
     * @param  array  $token
     * @return bool
     */
    protected function tokenExpired($created_at)
    {    
        $expirationTime = strtotime($created_at) + $this->tokenDuration;

        return $expirationTime < time();
    }
}
