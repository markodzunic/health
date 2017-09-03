<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;
use Auth;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Message;

class SiteMapController extends Controller {

	protected $messages;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Message $messages)
    {
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
    $blog = $blog->get_blogs_notification();

    $pages = new Page();
    $pages = $pages->get_pages_notifications();
    $notifications = array_merge($blog, $pages);

		return view("admin.SiteMap.index",[
			'messages' => $this->messages,
			'notifications' => $notifications,
			'status' => $status,
      'role' => $role,
			'practice' => $practice
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
