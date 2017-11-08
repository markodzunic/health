<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Blog;
use App\Models\Page;
use App\User;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Message;

class PracticeAccountController extends Controller {

	protected $messageBag;
	protected $messages;

	public function __construct(MessageBag $messageBag, Message $messages) {
				$this->middleware(['admin', 'newuser']);
				$this->messageBag = $messageBag;
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

		$limit = 0;
		$practice_users = [];
		$admin_users = [];

		$status = $user->checkStatus();
		$role = $user->checkRole();

		if ($role == 'practice_manager' || $role == 'admin') {
			$practice = Practice::where('user_id', '=', $user->id)->first();
		} else {
			$practice = Practice::find($user->authorised_user);
		}

		if ($practice) {
			$admin_users = User::where('authorised_user', '=', $practice->id)->where('is_admin', '=', 1)->get();
			$limit = 6 - User::where('authorised_user', '=', $practice->id)->where('is_admin', '!=', 1)->count();
			$practice_users = User::with('role')->where('authorised_user', '=', $practice->id)->where('is_admin', '!=', 1)->get();
		}

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
    $blog = $blog->get_blogs_notification_new();

    $pages = new Page();
    $pages = $pages->get_pages_notifications_new();
    $notifications = array_merge($blog, $pages);

		if (!$request->ajax()) {
				return view("admin.PracticeAccount.Profile.index", [
		       'user' => $user,
					 'admin_users' => $admin_users,
					 'status' => $status,
        	 'role' => $role,
					 'practice_users' => $practice_users,
					 'messages' => $this->messages,
					 'notifications' => $notifications,
					 'practice' => $practice,
					 'limit' => $limit,
		    ]);
		} else {
			return view("admin.PracticeAccount.Profile.practice-info", [
				 'user' => $user,
				 'practice' => $practice,
				 'admin_users' => $admin_users,
				 'status' => $status,
         'role' => $role,
				 'practice_users' => $practice_users,
				 'messages' => $this->messages,
				 'notifications' => $notifications,
				 'limit' => $limit,
			]);
		}
	}

	public function practiceStuff() {
		$user = Auth::user();
		$limit = 0;
		$practice_users = [];

		$role = $user->checkRole();

		$practice = Practice::where('user_id', '=', $user->id)->first();
		if ($practice) {
			$limit = 6 - User::where('authorised_user', '=', $practice->id)->count();
			$practice_users = User::with('role')->where('authorised_user', '=', $practice->id)->where('is_admin', '!=', 1)->get();
		}

		return view("admin.PracticeAccount.Profile.practice-staff", [
			 'user' => $user,
			 'role' => $role,
			 'practice' => $practice,
			 'practice_users' => $practice_users,
			 'limit' => $limit,
		]);
	}

	public function practiceAdmin() {
		$user = Auth::user();

		$admin_users = [];
		$role = $user->checkRole();

		$practice = Practice::where('user_id', '=', $user->id)->first();
		if ($practice) {
			$admin_users = User::where('authorised_user', '=', $practice->id)->where('is_admin', '=', 1)->get();
		}

		return view("admin.PracticeAccount.Profile.administrator", [
			 'practice' => $practice,
			 'role' => $role,
			 'admin_users' => $admin_users,
		]);
	}

	public function selectAdmin(Request $request) {
			$data = $request->all();

			$user = User::find($data['id']);
			$user->is_admin = $data['is_admin'];
			$user->role_id = $data['is_admin'] == 0 ? $user->prev_role_id : 6;
			$user->save();
	}

	public function updateAdmin(Request $request) {

		if (!$request->isMethod('post')) {
			$data = $request->all();

			$practice_id = isset($data['id']) ? $data['id'] : 0;
			$users = User::with('role')->where('authorised_user', '=', $practice_id)->get();

			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			return view("admin.PracticeAccount.Profile.updateAdmin",[
					'data' => $data,
					'users' => $users,
			])->withErrors($errors);
		} else {
			$data = $request->all();

			$user = User::find($data['user_id']);
			$user->is_admin = 1;
			$user->save();

			$request->session()->flash('alert-success', 'Admin Set Successfully.');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();

		$this->validate($request, [
			'name' => 'required',
			'address' => 'required',
			'email' => 'required',
	    ]);

		$prectice = new Practice;
		$prectice->user_id = Auth::user()->id;
		$prectice->name = $data['name'];
		$prectice->description = $data['description'];
		$prectice->address = $data['address'];
		$prectice->phone = $data['phone'];
		$prectice->fax = $data['fax'];
		$prectice->email = $data['email'];
		$prectice->site = $data['site'];
		$prectice->save();
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
		$data = $request->all();

		$this->validate($request, [
			'name' => 'required',
			'address' => 'required',
			'email' => 'required',
	    ]);

		$prectice = Practice::find($id);
		$prectice->user_id = Auth::user()->id;
		$prectice->name = $data['name'];
		$prectice->description = $data['description'];
		$prectice->address = $data['address'];
		$prectice->phone = $data['phone'];
		$prectice->fax = $data['fax'];
		$prectice->email = $data['email'];
		$prectice->site = $data['site'];
		$prectice->save();
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
