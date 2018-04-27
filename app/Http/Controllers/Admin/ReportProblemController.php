<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ReportProblem;
use Auth;
use Mail;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Models\Message;

class ReportProblemController extends Controller {

	protected $messages;

	public function __construct(Message $messages) {
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

		return view("admin.ReportProblem.index",[
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
				'first_name' => 'required',
				'last_name' => 'required',
				'position' => 'required',
				'practice_name' => 'required',
				'phone' => 'required',
				'email' => 'required|email',
	      'description' => 'required|max:255',
		]);

		$report_problem = new ReportProblem;
		$report_problem->user_id = Auth::user()->id;
		$report_problem->first_name = $data['first_name'];
		$report_problem->last_name = $data['last_name'];
		$report_problem->position = $data['position'];
		$report_problem->practice_name = $data['practice_name'];
		$report_problem->phone = $data['phone'];
		$report_problem->email = $data['email'];
		$report_problem->description = $data['description'];
		$report_problem->urgent = isset($data['urgent']) ? $data['urgent'] : 0;
		$report_problem->save();

		$request->session()->flash('alert-success', 'Problem was successful added!');

		$user = Auth::user();

		Mail::send('admin.emails.report_problem', ['report_problem' => $report_problem], function ($m) use ($report_problem, $user) {
        $m->from($user->email, 'Imedical');
				$m->priority(isset($report_problem->urgent) ? $report_problem->urgent : 0);
        $m->to('cian@imedical.ie', $user->first_name)->subject('Report A Problem');
    });

		return redirect('/report_problem');
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
