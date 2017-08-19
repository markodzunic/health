<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use App\Models\DefPage;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Message;

class MyKnowledgeBoxController extends Controller {

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
	public function index()
	{
		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();
		$pages = DefPage::all();

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		return view("admin.MyKnowledgeBox.index", [
			'practice' => $practice,
			'messages' => $this->messages,
			'pages' => $pages,
		]);
	}

	// public function my_knowledge_box_features(Request $request)
	// {
	// 	$data = $request->all();
	//
	// 	$user = Auth::user();
  //   $practice = Practice::where('user_id', '=', $user->id)->first();
	//
	// 	$sections = Page::where('page_id', '=', $data['page_id'])->get();
	//
	// 	return view("admin.MyKnowledgeBox.index", [
	// 		'practice' => $practice,
	// 		'sections' => $sections,
	// 	]);
	// }

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
