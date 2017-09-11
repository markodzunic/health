<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;
use Auth;
use File;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Page;
use App\Models\Blog;
use Illuminate\Support\MessageBag;
use Intervention\Image\ImageManagerStatic as Image;

class GalleryController extends Controller {

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

		$galleries = new Gallery();
	    $galleries = $galleries->get_images('created_at', 'desc');

	    $this->messages = $this->messages->get_messages(Auth::user()->id);

	    $blog = new Blog();
		$blog = $blog->get_blogs_notification();

		$pages = new Page();
		$pages = $pages->get_pages_notifications();
		$notifications = array_merge($blog, $pages);

		if (!$request->ajax()) {
			return view("admin.Media.Images.index",[
				'images' => $galleries,
				'messages' => $this->messages,
				'notifications' => $notifications,
				'status' => $status,
        		'role' => $role,
				'practice' => $practice
			]);
		} else {
			return view("admin.Media.Images.content",[
				'images' => $galleries,
				'messages' => $this->messages,
				'notifications' => $notifications,
				'status' => $status,
        		'role' => $role,
				'practice' => $practice
			]);
		}
	}

	public function uploadImage(Request $request) {
		$data = $request->all();

		if ($request->isMethod('post')) {
			$path = $path_thumb = '';

			$this->validate($request, [
				'image' => 'required|mimes:jpeg,bmp,png,gif',
		  	]);

			$img = new Gallery;
			$img->name = $data['name'];

			if ($request->file('image')) {
				Image::make($request->file('image'))->resize(1200, null, function($constraint) {
					$constraint->aspectRatio();
				})->save(public_path('img/uploads').'/'.$img->id.'_'.$request->file('image')->getClientOriginalName());

				Image::make($request->file('image'))->resize(150, null, function($constraint) {
					$constraint->aspectRatio();
				})->save(public_path('img/uploads/thumbs').'/'.$img->id.'_'.$request->file('image')->getClientOriginalName());

	         	$path = 'uploads/'.$img->id.'_'.$request->file('image')->getClientOriginalName();
	         	$path_thumb = 'uploads/thumbs/'.$img->id.'_'.$request->file('image')->getClientOriginalName();
		    } 

		    $img->path = $path;
		    $img->thumb = $path_thumb;
		    $img->save();

		    $img_info = [
		    	'url' => asset('/img/'.$path),
		    	'thumb' => asset('/img/'.$path_thumb),
		    	'name' => $img->name,
		    	'type' => 'image',
		    	'id' => $img->id,
		    	'tag' => ''
		    ];

		    $content = File::get(public_path('img/load-files'));
		    $content = json_decode($content, 1);
			$content[] = $img_info;

		    File::put(public_path('img/load-files'), json_encode($content));

		 } else {

			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			return view("admin.Media.Images.upload",[
					'data' => $data,
			])->withErrors($errors);
		 }
	}

	public function deleteImage(Request $request) {
		if (!$request->isMethod('post')) {
			$data = $request->all();

			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			return view("admin.Media.Images.delete",[
					'data' => $data,
			])->withErrors($errors);
		} else {
			$data = $request->all();

			$gallery = Gallery::find($data['id']);

			unlink(public_path('img').'/'.$gallery->path);
			unlink(public_path('img').'/'.$gallery->thumb);

			$content = File::get(public_path('img/load-files'));
		    $content = json_decode($content, 1);

		    if ($content) {
		    	foreach ($content as $key => $value) {
		    		if ($value['id'] == $gallery->id) {
		    			unset($content[$key]);
		    		}
		    	}
		    }
		    File::put(public_path('img/load-files'), json_encode($content));
		    
			$gallery->delete();

			$request->session()->flash('alert-success', 'Image deleted.');
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
