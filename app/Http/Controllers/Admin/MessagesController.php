<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;
use Auth;
use App\Models\Message;
use App\Models\Page;
use App\Models\Blog;
use Illuminate\Support\MessageBag;

class MessagesController extends Controller {

	protected $messages;
	protected $messageBag;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MessageBag $messageBag, Message $messages)
    {
			$this->middleware('admin');
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
		$user = Auth::User();
		$practice = Practice::where('user_id', '=', $user->id)->first();

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
    $blog = $blog->get_blogs_notification();

    $pages = new Page();
    $pages = $pages->get_pages_notifications();
    $notifications = array_merge($blog, $pages);

		if (!$request->ajax()) {
			return view("admin.Messages.index",[
				'messages' => $this->messages,
				'notifications' => $notifications,
				'practice' => $practice
			]);
		} else {
			return view("admin.Messages.content",[
				'messages' => $this->messages,
				'notifications' => $notifications,
				'practice' => $practice
			]);
		}
	}

	public function deleteMessage(Request $request) {
			if (!$request->isMethod('post')) {
				$data = $request->all();

				$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

				if ($errors) {
					foreach ($errors as $key => $value) {
						$this->messageBag->add($key, $value);
					}
				}

				return view("admin.Messages.delete",[
						'data' => $data,
				])->withErrors($errors);
			} else {
				$data = $request->all();

				$blog = Message::find($data['id']);
				$blog->delete();

				$request->session()->flash('alert-success', 'Message deleted.');
			}
	}

	public function readMessage(Request $request) {
			$data = $request->all();

			$message = Message::find($data['id']);
			if ($message && !$message->is_read) {
				$message->is_read = 1;
				$message->save();
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
