<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;
use Auth;
use App\Models\Message;
use App\Models\Blog;
use App\Models\Page;

class DashboardController extends Controller {

	protected $messages;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
		 public function __construct(Message $messages) {
 					$this->middleware('admin');
 					$this->messages = $messages;
 		}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::User();
		$practice = Practice::where('user_id', '=', $user->id)->first();

		$status = $user->checkStatus();
		$role = $user->checkRole();

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
    $blogs = $blog->get_blogs_notification(5);

    $pages = new Page();
    $pages = $pages->get_pages_notifications(5);

		$blogN = new Blog();
    $blogsN = $blogN->get_blogs_notification_new();

    $pagesN = new Page();
    $pagesN = $pagesN->get_pages_notifications_new();
    $notifications = array_merge($blogsN, $pagesN);

		return view("admin.home.index",[
				'practice' => $practice,
				'status' => $status,
        'role' => $role,
				'messages' => $this->messages,
				'pages' => $pages,
				'blogs' => $blogs,
				'notifications' => $notifications,
		]);
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
