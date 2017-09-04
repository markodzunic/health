<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Practice;
use App\User;
use DB;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\MessageBag;
use Intervention\Image\ImageManagerStatic as Image;

class PracticeController extends Controller {

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

		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

		$status = $user->checkStatus();
		$role = $user->checkRole();

		$this->sortby = isset($data['sort']) ? $data['sort'] : 'name';
		$this->orderby = isset($data['order']) ? $data['order'] : 'asc';

		$practiceModel = new Practice;
		$practices = $practiceModel->get_practices($this->sortby, $this->orderby);

		# custom pagination
		$currentPage = LengthAwarePaginator::resolveCurrentPage();
		$col = new Collection($practices);
		$perPage = 5;
		$currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
		$practices = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
    $blog = $blog->get_blogs_notification();

    $pages = new Page();
    $pages = $pages->get_pages_notifications();
    $notifications = array_merge($blog, $pages);

		if ($request->ajax()) {
				return view('admin.PracticeAccount.practices.table', [
						'sortby' => $this->sortby,
						'orderby' => $this->orderby,
						'practices' => $practices,
						'status' => $status,
        		'role' => $role,
						'notifications' => $notifications,
						'messages' => $this->messages,
						'pagination' => true,
						'practice' => $practice,
						'columns' => Practice::$sortColumns,
				])->render();
		} else {
				return view('admin.PracticeAccount.practices.index', [
						'sortby' => $this->sortby,
						'orderby' => $this->orderby,
						'status' => $status,
        		'role' => $role,
						'practices' => $practices,
						'messages' => $this->messages,
						'pagination' => true,
						'notifications' => $notifications,
						'practice' => $practice,
						'columns' => Practice::$sortColumns,
				])->render();
		}
	}

  public function buyPractice(Request $request) {

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

	public function deletePractice(Request $request) {
    if (!$request->isMethod('post')) {
      $data = $request->all();
			$practice_account = isset($data['practice_account']) ? $data['practice_account'] : '';
      $errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

      if ($errors) {
        foreach ($errors as $key => $value) {
          $this->messageBag->add($key, $value);
        }
      }

      return view("admin.PracticeAccount.practices.delete",[
          'data' => $data,
					'practice_account' => $practice_account,
      ])->withErrors($errors);
    } else {
      $data = $request->all();
			$practice_account = isset($data['practice_account']) ? $data['practice_account'] : '';
      $practice = Practice::find($data['id']);

			$practiceUsers = User::where('authorised_user', '=', $practice->id)->get();

			if ($practiceUsers) {
					foreach ($practiceUsers as $key => $value) {
						$value->delete();
					}
			}

      $practice->delete();
      $request->session()->flash('alert-success', 'Practice and its users deleted.');
    }
  }

	public function updatePractice(Request $request) {
    if (!$request->isMethod('post')) {
      $data = $request->all();
      $errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

      if ($errors) {
        foreach ($errors as $key => $value) {
          $this->messageBag->add($key, $value);
        }
      }

      $practice = Practice::find($data['id']);

      return view("admin.PracticeAccount.practices.update",[
          'practice' => $practice
      ])->withErrors($errors);
    } else {
      $data = $request->all();

			$this->validate($request, [
				'name' => 'required',
				'address' => 'required',
				'email' => 'required|email',
				'avatar' => 'mimes:jpeg,bmp,png,gif',
		  ]);

			$practice = Practice::find($data['id']);

			if ($request->file('avatar')) {
			   Image::make($request->file('avatar'))->resize(200, null, function($constraint) {
					 $constraint->aspectRatio();
				 })->save(public_path('img/avatars').'/'.$practice->id.'_'.$request->file('avatar')->getClientOriginalName());
         $path = 'avatars/'.$practice->id.'_'.$request->file('avatar')->getClientOriginalName();
      } else {
        $path = 'avatars/avatar.png';
      }

			$practice->name = $data['name'];
			$practice->avatar = $path;
			$practice->description = $data['description'];
			$practice->address = $data['address'];
			$practice->phone = $data['phone'];
			$practice->fax = $data['fax'];
			$practice->email = $data['email'];
			$practice->site = $data['site'];

			$practice->save();

      $request->session()->flash('alert-success', 'Practice Updated.');
    }
  }

}
