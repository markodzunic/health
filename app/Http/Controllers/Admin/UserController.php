<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\User;
use App\Models\Role;
use App\Models\Message;
use App\Models\Practice;
use Auth;
use App\Models\Blog;
use App\Models\Page;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\MessageBag;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller {

    protected $sortby;
    protected $orderby;
    protected $messages;
    protected $messageBag;

  	public function __construct(MessageBag $messageBag, Message $messages) {
          $this->middleware(['admin', 'practiceuser', 'practicemanager', 'newuser']);
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
    $data = $request->all();

    $this->sortby = isset($data['sort']) ? $data['sort'] : 'first_name';
    $this->orderby = isset($data['order']) ? $data['order'] : 'asc';

    $userModel = new User;
    $users = $userModel->get_users($this->sortby, $this->orderby);

    $user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

    $status = $user->checkStatus();
		$role = $user->checkRole();

    # custom pagination
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $col = new Collection($users);
    $perPage = 5;
    $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
    $users = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

    $this->messages = $this->messages->get_messages(Auth::user()->id);

    $blog = new Blog();
    $blog = $blog->get_blogs_notification();

    $pages = new Page();
    $pages = $pages->get_pages_notifications();
    $notifications = array_merge($blog, $pages);

    if ($request->ajax()) {
        return view('admin.UserAccount.users.table', [
            'sortby' => $this->sortby,
            'orderby' => $this->orderby,
            'notifications' => $notifications,
            'users' => $users,
            'messages' => $this->messages,
            'status' => $status,
            'role' => $role,
            'pagination' => true,
            'practice' => $practice,
            'columns' => User::$sortColumns,
        ])->render();
    } else {
        return view('admin.UserAccount.users.index', [
            'sortby' => $this->sortby,
            'orderby' => $this->orderby,
            'notifications' => $notifications,
            'status' => $status,
            'role' => $role,
            'users' => $users,
            'messages' => $this->messages,
            'pagination' => true,
            'practice' => $practice,
            'columns' => User::$sortColumns,
        ])->render();
    }
	}

  public function approveUser(Request $request) {
    $data = $request->all();

    $user = User::find($data['id']);
    $user->authorised_user = $data['is_admin'];
    $user->save();
    if ($data['is_admin'] == 1)
      $request->session()->flash('alert-success', 'User approved.');
    else
      $request->session()->flash('alert-success', 'User deapproved.');
  }

  public function deleteUser(Request $request) {
    if (!$request->isMethod('post')) {
      $data = $request->all();
      $errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

      if ($errors) {
        foreach ($errors as $key => $value) {
          $this->messageBag->add($key, $value);
        }
      }

      return view("admin.UserAccount.users.delete",[
          'data' => $data,
      ])->withErrors($errors);
    } else {
      $data = $request->all();

      $practice = Practice::where('user_id', '=', $data['id'])->get();
      if ($practice) {
          foreach ($practice as $key => $value) {
              $value->user_id = NULL;
              $value->save();
          }
      }
      $user = User::find($data['id']);

      $user->delete();
      $request->session()->flash('alert-success', 'User deleted.');
    }
  }

  public function updateUser(Request $request) {
    if (!$request->isMethod('post')) {
      $data = $request->all();
      $errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

      if ($errors) {
        foreach ($errors as $key => $value) {
          $this->messageBag->add($key, $value);
        }
      }

      if (isset($data['id']))
        $user = User::find($data['id']);
      else {
        $user = new User();
      }
      return view("admin.UserAccount.users.update",[
          'user' => $user,
          'practice_id' => isset($data['practice_id']) ? $data['practice_id'] : 0,
          'roles' => Role::all(),
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

      if (isset($data['id']))
        $user = User::find($data['id']);
      else {

        $this->validate($request, [
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();

        $user->authorised_user = $data['practice_id'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->active = 1;
        $request->session()->flash('alert-success-usr', 'User Updated.');
      }

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
			$user->date_of_birth = $data['date_of_birth'];
			$user->position_type = $data['position_type'];
			$user->phone = $data['phone'];
			$user->role_id = $data['role_id'];
      $user->occupation = $data['occupation'];
      $user->is_admin = 0;
			$user->gender = $data['gender'];
			$user->med_reg_number = $data['med_reg_number'];

			$user->save();

      $request->session()->flash('alert-success', 'User Updated.');

      if ($request->ajax() && isset($data['practice_id']) && $data['practice_id']) {

        $limit = 6 - User::where('authorised_user', '=', $data['practice_id'])->count();

        return view('admin.PracticeAccount.Profile.additional-users', [
            'limit' => $limit,
            'practice' => Practice::find($data['practice_id']),
        ])->render();
      }
    }
  }

  public function getUserInfo() {
      $user = Auth::user();

      return view('admin.layouts.sidebar-user',[
        'user' => $user
      ]);
  }

  public function logoutDialog() {
      $user = Auth::user();

      return view('admin.UserAccount.Profile.logout',[
        'user' => $user
      ]);
  }

  public function messageUser(Request $request) {
    if (!$request->isMethod('post')) {
      $data = $request->all();
      $errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

      if ($errors) {
        foreach ($errors as $key => $value) {
          $this->messageBag->add($key, $value);
        }
      }

      return view("admin.UserAccount.users.message",[
          'data' => $data,
      ])->withErrors($errors);
    } else {
      $data = $request->all();

      $this->validate($request, [
        'subject' => 'required|string',
        'description' => 'required|string',
      ]);

      $message = new Message;
      $message->subject = $data['subject'];
      $message->description = $data['description'];
      $message->user_id = $data['id'];
      $message->is_read = 0;
      $message->user_send = Auth::user()->id;
      $message->save();

      $request->session()->flash('alert-success', 'Message sent.');
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
