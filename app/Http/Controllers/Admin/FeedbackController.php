<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Practice;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\Message;

class FeedbackController extends Controller {

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
	public function index()
	{
		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

		$status = $user->checkStatus();
		$role = $user->checkRole();

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
    $blog = $blog->get_blogs_notification_new();

    $pages = new Page();
    $pages = $pages->get_pages_notifications_new();
    $notifications = array_merge($blog, $pages);

		return view("admin.UserAccount.Feedback.index", [
			'practice' => $practice,
			'status' => $status,
      'role' => $role,
			'notifications' => $notifications,
			'messages' => $this->messages,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$data = $request->all();

		$this->validate($request, [
	        'description' => 'required|max:255',
	    ]);

		$feedback = new Feedback;
		$feedback->user_id = Auth::user()->id;
		$feedback->description = $data['description'];
		$feedback->save();

		$request->session()->flash('alert-success', 'Feedback was successful added!');

		return redirect('/feedback');
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
	        'description' => 'required|max:255',
	    ]);

		$feedback = new Feedback;
		$feedback->user_id = Auth::user()->id;
		$feedback->description = $data['description'];
		$feedback->save();
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
