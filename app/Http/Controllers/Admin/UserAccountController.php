<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Validator;
use App\Models\Role;
use App\Models\Message;
use App\Models\Practice;
use App\Models\Blog;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class UserAccountController extends Controller {

	protected $messageBag;
	protected $messages;

	public function __construct(MessageBag $messageBag, Message $messages) {
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

		$role = Role::find($user->role_id);

		$practice = Practice::where('user_id', '=', $user->id)->first();

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
    $blog = $blog->get_blogs_notification();

    $pages = new Page();
    $pages = $pages->get_pages_notifications();
    $notifications = array_merge($blog, $pages);

		if ($request->ajax()) {
				return view("admin.UserAccount.Profile.personal-info", [
            'user' => $user,
						'messages' => $this->messages,
            'role' => $role,
						'notifications' => $notifications,
						'practice' => $practice,
        ])->render();
		} else {
			return view("admin.UserAccount.Profile.index", [
					'user' => $user,
					'messages' => $this->messages,
					'role' => $role,
					'notifications' => $notifications,
					'practice' => $practice,
			]);
		}
	}

	public function updatePassword(Request $request) {
			if (!$request->isMethod('post')) {
				$data = $request->all();
				$errors = isset($data['error']) ? $data['error'] : $this->messageBag;

				if ($errors) {
					foreach ($errors as $key => $value) {
						$this->messageBag->add($key, $value);
					}
				}

				return view("admin.UserAccount.Profile.password",[
						'user' => Auth::user(),
				])->withErrors($errors);
			} else {
					$data = $request->all();

					$user = User::find(Auth::user()->id);

					$old_pass = Hash::check($data['old_password'], Auth::user()->password);

					if ($old_pass == false) {
						$this->messageBag->add('old_password', 'Old password is not correct.');
						return $this->messageBag;
					}

					$ValMessages = array(
			        'password.required'     => 'The field Password is required',
							'old_password.required'     => 'The field Password is required',
			    );

					$rules = [
						'password' => 'required|string|min:6|confirmed',
						'old_password' => 'required'
				  ];

					$val = Validator::make($data, $rules, $ValMessages);

					$user->password = bcrypt($data['password']);

					if ($val->passes())
						$user->save();
					else {
						return $val->errors();
					}

					$request->session()->flash('alert-success', 'Password successfuly changed!');
				}
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
				'avatar' => 'mimes:jpeg,bmp,png,gif',
				'date_of_birth' => 'required',
				'position_type' => 'required',
				'gender' => 'required',
				'role_id' => 'required',
				'phone' => 'required',
				'occupation' => 'required',
		  ]);

			$user = User::find($data['id']);
			if ($request->file('avatar')) {
					Image::make($request->file('avatar'))->resize(200, null, function($constraint){
						$constraint->aspectRatio();
					})->save(public_path('img/avatars').'/'.$user->id.'_'.$request->file('avatar')->getClientOriginalName());
					$path = 'avatars/'.$user->id.'_'.$request->file('avatar')->getClientOriginalName();
			} else {
					$path = 'avatars/avatar.png';
			}

			$user->title = $data['title'];
			$user->first_name = $data['first_name'];
			$user->last_name = $data['last_name'];
			$user->avatar = $path;
			$user->is_admin = 0;
			$user->date_of_birth = $data['date_of_birth'];
			$user->position_type = $data['position_type'];
			$user->phone = $data['phone'];
			$user->role_id = $data['role_id'];
			$user->gender = $data['gender'];
			$user->med_reg_number = $data['med_reg_number'];

			$user->save();
			$request->session()->flash('alert-success', 'User updated!');
		}
	}

	public function deleteUser(Request $request)
	{
		if (!$request->isMethod('post')) {
			$data = $request->all();
			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			return view("admin.UserAccount.Profile.delete-user",[
					'user' => Auth::user(),
			])->withErrors($errors);
		} else {
			$data = $request->all();
			$user = User::find($data['id']);
			// $user->active = 0;
			$user->save();
			$request->session()->flash('alert-success', 'User deactivated.');
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

	}

}
