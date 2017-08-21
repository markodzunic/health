<?php
namespace App\Http\Controllers\Admin;

use Carbon\Carabon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use App\Models\Page;
use App\Models\Blog;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Models\Message;

class BillingAndPaymentController extends Controller {

	protected $messages;

	public function __construct(Message $messages) {
				$this->middleware('admin');
				$this->messages = $messages;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

		$limit = 0;
		$practice_users = [];
		$admin_users = [];

		// $practice = Practice::where('user_id', '=', $user->id)->first();

		if ($practice) {
			// $admin_users = User::where('authorised_user', '=', $practice->id)->where('role_id', '!=', 1)->where('role_id', '=', 5)->get();
			$limit = 7 - User::where('authorised_user', '=', $practice->id)->where('role_id', '!=', 1)->where('role_id', '!=', 5)->count();
			$subscription = User::where('authorised_user', '=', $practice->id)->orWhere('role_id', '=', 1)->orWhere('role_id', '=', 4)->first();
			// $practice_users = User::with('role')->where('authorised_user', '=', $practice->id)->where('role_id', '!=', 5)->where('role_id', '!=', 1)->get();
		}

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
    $blog = $blog->get_blogs_notification();

    $pages = new Page();
    $pages = $pages->get_pages_notifications();
    $notifications = array_merge($blog, $pages);

		if (!$request->ajax()) {
				return view("admin.PracticeAccount.BillingAndPayment.index", [
		       'user' => $user,
					 'subscription' => $subscription,
					 'messages' => $this->messages,
					 'notifications' => $notifications,
					//  'admin_users' => $admin_users,
					//  'practice_users' => $practice_users,
					 'practice' => $practice,
					 'limit' => $limit,
		    ]);
		} else {
			return view("admin.PracticeAccount.BillingAndPayment.content", [
				 'user' => $user,
				 'practice' => $practice,
				 'messages' => $this->messages,
				 'subscription' => $subscription,
				 'notifications' => $notifications,
				//  'admin_users' => $admin_users,
				//  'practice_users' => $practice_users,
				 'limit' => $limit,
			]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
