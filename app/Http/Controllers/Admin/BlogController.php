<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use App\Models\Blog;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\MessageBag;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller {

	protected $sortby;
	protected $orderby;

	protected $messageBag;

	public function __construct(MessageBag $messageBag) {
				$this->middleware('admin');
				$this->messageBag = $messageBag;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$data = $request->all();

		$this->sortby = isset($data['sort']) ? $data['sort'] : 'title';
		$this->orderby = isset($data['order']) ? $data['order'] : 'asc';

		$blogModel = new Blog;
		$blogs = $blogModel->get_blogs($this->sortby, $this->orderby);

		# custom pagination
		$currentPage = LengthAwarePaginator::resolveCurrentPage();
		$col = new Collection($blogs);
		$perPage = 5;
		$currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
		$blogs = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

		if ($request->ajax()) {
				return view('admin.Blog.Posts.table', [
						'sortby' => $this->sortby,
						'orderby' => $this->orderby,
						'blogs' => $blogs,
						'pagination' => true,
						'columns' => Blog::$sortColumns,
				])->render();
		} else {
				return view('admin.Blog.Posts.index', [
						'sortby' => $this->sortby,
						'orderby' => $this->orderby,
						'blogs' => $blogs,
						'pagination' => true,
						'columns' => Blog::$sortColumns,
				])->render();
		}
	}

	public function deleteBlog(Request $request) {
			if (!$request->isMethod('post')) {
				$data = $request->all();

				$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

				if ($errors) {
					foreach ($errors as $key => $value) {
						$this->messageBag->add($key, $value);
					}
				}

				return view("admin.Blog.Posts.delete",[
						'data' => $data,
				])->withErrors($errors);
			} else {
				$data = $request->all();

				$blog = Blog::find($data['id']);
				$blog->delete();

				$request->session()->flash('alert-success', 'Post deleted.');
			}
	}

	public function updateBlog(Request $request) {
		if (!$request->isMethod('post')) {
			$data = $request->all();
			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			$blog = Blog::find($data['id']);

			return view("admin.Blog.Posts.update",[
					'blog' => $blog
			])->withErrors($errors);
		} else {
			$data = $request->all();

			$this->validate($request, [
				'title' => 'required',
				'description' => 'required'
			]);

			if ($data['id'])
				$blog = Blog::find($data['id']);
			else {
				$blog = new Blog();
			}

			if ($request->file('image')) {
				 Image::make($request->file('image'))->resize(500, 400)->save(public_path('img/blogs').'/'.$blog->id.'_'.$request->file('image')->getClientOriginalName());
				 $path = 'blogs/'.$blog->id.'_'.$request->file('image')->getClientOriginalName();
			} else {
				$path = '';
			}

			$blog->title = $data['title'];
			$blog->image = $path;
			$blog->description = $data['description'];

			$blog->save();

			$request->session()->flash('alert-success', 'Blog Updated.');
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
