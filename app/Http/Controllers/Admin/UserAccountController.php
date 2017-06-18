<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller {

	protected $messageBag;

	public function __construct(MessageBag $messageBag) {
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

		$role = Role::find($user->role_id);

		if ($request->ajax()) {
				return view("admin.UserAccount.Profile.personal-info", [
            'user' => $user,
            'role' => $role
        ])->render();
		} else {
			return view("admin.UserAccount.Profile.index", [
					'user' => $user,
					'role' => $role
			]);
		}
	}

	public function updatePassword(Request $request) {
			$data = $request->all();

			$user = User::find(Auth::user()->id);
			$role = Role::find($user->role_id);

			$old_pass = Hash::check($data['old_password'], Auth::user()->password);

			if (!$old_pass) {
					$this->messageBag->add('old_password', 'Old password is not correct.');

					return view('admin.UserAccount.Profile.index', [
						'errors' => $this->messageBag,
						'user' => $user,
						'role' => $role
					]);
			}

			$this->validate($request, [
				'password' => 'required|string|min:6|confirmed',
		  ]);

			$user->password = bcrypt($data['password']);
			$user->save();

			$request->session()->flash('alert-success', 'Password successfuly changed!');

			return view('admin.UserAccount.Profile.index', [
				'errors' => $this->messageBag,
				'user' => $user,
				'role' => $role
			]);
	}

	public function updateUser(Request $request)
	{
		if (!$request->isMethod('post')) {
			$data = $request->all();
			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			$roles = Role::all();

			return view("admin.UserAccount.Profile.edit-info-popup",[
					'roles' => $roles,
					'user' => Auth::user(),
			])->withErrors($errors);
		} else {
			$data = $request->all();

			$this->validate($request, [
				'title' => 'required',
				'first_name' => 'required|string',
				'last_name' => 'required|string',
				'avatar' => 'string',
				'date_of_birth' => 'required',
				'position_type' => 'required',
				'gender' => 'required',
				'role_id' => 'required',
				'phone' => 'required',
				'med_reg_number' => 'required',
		  ]);
			$user = User::find($data['id']);

			$user->title = $data['title'];
			$user->first_name = $data['first_name'];
			$user->last_name = $data['last_name'];
			$user->avatar = $data['avatar'];
			$user->date_of_birth = $data['date_of_birth'];
			$user->position_type = $data['position_type'];
			$user->phone = $data['phone'];
			$user->role_id = $data['role_id'];
			$user->gender = $data['gender'];
			$user->med_reg_number = $data['med_reg_number'];

			$user->save();
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
