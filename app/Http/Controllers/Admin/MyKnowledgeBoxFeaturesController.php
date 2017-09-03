<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use App\Models\Page;
use App\Models\Blog;
use App\Models\DefPage;
use Auth;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class MyKnowledgeBoxFeaturesController extends Controller {

	protected $messageBag;
	protected $messages;

	public function __construct(MessageBag $messageBag, Message $messages) {
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
		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

		$status = $user->checkStatus();
		$role = $user->checkRole();
		
		$data = $request->all();
		$p = DefPage::find($data['page_id']);

		$recommended_practice = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'recommended_practice')->get();
		$diff_practice = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'diff_practice')->get();
		$checklist = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'checklist')->get();
		$templates = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'templates')->get();
		$faq = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'faq')->get();
		$ressources = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'ressources')->get();

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
    $blog = $blog->get_blogs_notification();

    $pages = new Page();
    $pages = $pages->get_pages_notifications();
    $notifications = array_merge($blog, $pages);

		return view("admin.MyKnowledgeBox.Features.index", [
			'practice' => $practice,
			'recommended_practice' => $recommended_practice,
			'diff_practice' => $diff_practice,
			'checklist' => $checklist,
			'notifications' => $notifications,
			'messages' => $this->messages,
			'status' => $status,
      'role' => $role,
			'templates' => $templates,
			'faq' => $faq,
			'data' => $data,
			'page' => $p,
			'ressources' => $ressources
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
