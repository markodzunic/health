<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class PracticeAccountController extends Controller {

	protected $messageBag;

	public function __construct(MessageBag $messageBag) {
				$this->middleware('admin');
				$this->messageBag = $messageBag;
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

		$practice = Practice::where('user_id', '=', $user->id)->first();

		if ($practice) {
			$admin_users = User::where('authorised_user', '=', $practice->id)->where('role_id', '!=', 1)->where('role_id', '=', 5)->get();
			$limit = 6 - User::where('authorised_user', '=', $practice->id)->where('role_id', '!=', 1)->where('role_id', '!=', 5)->count();
			$practice_users = User::with('role')->where('authorised_user', '=', $practice->id)->where('role_id', '!=', 5)->where('role_id', '!=', 1)->get();
		}

		if (!$request->ajax()) {
				return view("admin.PracticeAccount.Profile.index", [
		       'user' => $user,
					 'admin_users' => $admin_users,
					 'practice_users' => $practice_users,
					 'practice' => $practice,
					 'limit' => $limit,
		    ]);
		} else {
			return view("admin.PracticeAccount.Profile.practice-info", [
				 'user' => $user,
				 'practice' => $practice,
				 'admin_users' => $admin_users,
				 'practice_users' => $practice_users,
				 'limit' => $limit,
			]);
		}
	}

	public function practiceStuff() {
		$user = Auth::user();
		$limit = 0;
		$practice_users = [];

		$practice = Practice::where('user_id', '=', $user->id)->first();
		if ($practice) {
			$limit = 6 - User::where('authorised_user', '=', $practice->id)->count();
			$practice_users = User::with('role')->where('authorised_user', '=', $practice->id)->where('role_id', '!=', 1)->where('role_id', '!=', 5)->get();
		}

		return view("admin.PracticeAccount.Profile.practice-staff", [
			 'user' => $user,
			 'practice' => $practice,
			 'practice_users' => $practice_users,
			 'limit' => $limit,
		]);
	}

	public function practiceAdmin() {
		$user = Auth::user();

		$admin_users = [];

		$practice = Practice::where('user_id', '=', $user->id)->first();
		if ($practice) {
			$admin_users = User::where('authorised_user', '=', $practice->id)->where('role_id', '!=', 1)->where('role_id', '=', 5)->get();
		}

		return view("admin.PracticeAccount.Profile.administrator", [
			 'practice' => $practice,
			 'admin_users' => $admin_users,
		]);
	}

	public function updateAdmin(Request $request) {

		if (!$request->isMethod('post')) {
			$data = $request->all();

			$practice_id = isset($data['id']) ? $data['id'] : 0;
			$users = User::with('role')->where('role_id', '!=', 5)->where('role_id', '!=', 1)->where('authorised_user', '=', $practice_id)->get();

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
			$user->role_id = 5;
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
