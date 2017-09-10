<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;
use Auth;
use App\Models\Document;
use App\Models\Message;
use App\Models\Page;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\MessageBag;

class DocumentsController extends Controller {

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

		$status = $user->checkStatus();
		$role = $user->checkRole();

		$documents = new Document();

		$this->sortby = isset($data['sort']) ? $data['sort'] : 'name';
		$this->orderby = isset($data['order']) ? $data['order'] : 'asc';

	    $documents = $documents->get_documents($this->sortby, $this->orderby);

	    # custom pagination
		$currentPage = LengthAwarePaginator::resolveCurrentPage();
		$col = new Collection($documents);
		$perPage = 2;
		$currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
		$documents = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);


	    $this->messages = $this->messages->get_messages(Auth::user()->id);

	    $blog = new Blog();
		$blog = $blog->get_blogs_notification();

		$pages = new Page();
		$pages = $pages->get_pages_notifications();
		$notifications = array_merge($blog, $pages);

		if (!$request->ajax()) {
			return view("admin.Media.Documents.index",[
				'messages' => $this->messages,
				'documents' => $documents,
				'columns' => Document::$sortColumns,
				'sortby' => $this->sortby,
				'orderby' => $this->orderby,
				'status' => $status,
				'notifications' => $notifications,
        		'role' => $role,
        		'pagination' => true,
				'practice' => $practice
			]);
		} else {
			return view("admin.Media.Documents.content",[
				'documents' => $documents,
				'messages' => $this->messages,
				'columns' => Document::$sortColumns,
				'sortby' => $this->sortby,
				'orderby' => $this->orderby,
				'notifications' => $notifications,
				'status' => $status,
        		'role' => $role,
        		'pagination' => true,
				'practice' => $practice
			]);
		}
	}

	public function uploadDocument(Request $request) {
		$data = $request->all();

		if ($request->isMethod('post')) {
			$path = '';

			$this->validate($request, [
				'document' => 'required|mimes:txt,doc,docx,pdf',
		  	]);

			$img = new Document;
			$img->name = $data['name'];

			if ($request->file('document')) {
	         	$path = '/'.$img->id.'_'.$request->file('document')->getClientOriginalName().'.'.$request->file('document')->getClientOriginalExtension();
	         	$request->file('document')->move(public_path('doc').'/', $path);
		    } 

		    $img->path = $path;
		    $img->save();
		    $request->session()->flash('alert-success', 'Document uploaded.');
		 } else {

			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			return view("admin.Media.Documents.upload",[
					'data' => $data,
			])->withErrors($errors);
		 }
	}

	public function deleteDocument(Request $request) {
		if (!$request->isMethod('post')) {
			$data = $request->all();

			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			return view("admin.Media.Documents.delete",[
					'data' => $data,
			])->withErrors($errors);
		} else {
			$data = $request->all();

			$gallery = Document::find($data['id']);

			unlink(public_path('doc').'/'.$gallery->path);

			$gallery->delete();

			$request->session()->flash('alert-success', 'Document deleted.');
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
