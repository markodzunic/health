<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use App\Models\Practice;
use App\Models\Blog;
use App\Models\Page;
use App\Models\BlogCategory;
use App\Models\Tag;
use App\Models\BlogTag;
use App\Models\Category;
use Auth;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\MessageBag;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller {

	protected $sortby;
	protected $orderby;
	protected $messages;
	protected $messageBag;

	public function __construct(MessageBag $messageBag, Message $messages) {
				$this->middleware(['admin', 'newuser', 'practicemanager', 'practiceuser']);
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
		$data = $request->all();
		$blog_data = $cat_names = [];

		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

		$status = $user->checkStatus();
		$role = $user->checkRole();

		$this->sortby = isset($data['sort']) ? $data['sort'] : 'title';
		$this->orderby = isset($data['order']) ? $data['order'] : 'asc';

		$blogModel = new Blog;
		$blogs = $blogModel->get_blogs($this->sortby, $this->orderby);

		if ($blogs) {
				foreach ($blogs as $key => $value) {
					$pp = BlogCategory::where('blogs_id', '=', $value->id)->get();
					if ($pp) {
							foreach ($pp as $p => $pv) {
									$cat_names[] = Category::find($pv->categories_id)->name;
								}
							}
						$blog_data[$value->id]['categories'] = implode(',', $cat_names);
				}
		}

		# custom pagination
		$currentPage = LengthAwarePaginator::resolveCurrentPage();
		$col = new Collection($blogs);
		$perPage = 5;
		$currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
		$blogs = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
		$blog = $blog->get_blogs_notification_new();

		$pages = new Page();
		$pages = $pages->get_pages_notifications_new();
		$notifications = array_merge($blog, $pages);

		if ($request->ajax()) {
				return view('admin.Blog.Posts.table', [
						'sortby' => $this->sortby,
						'orderby' => $this->orderby,
						'blogs' => $blogs,
						'status' => $status,
        		'role' => $role,
						'messages' => $this->messages,
						'notifications' => $notifications,
						'blog_data' => $blog_data,
						'pagination' => true,
						'practice' => $practice,
						'columns' => Blog::$sortColumns,
				])->render();
		} else {
				return view('admin.Blog.Posts.index', [
						'sortby' => $this->sortby,
						'orderby' => $this->orderby,
						'messages' => $this->messages,
						'status' => $status,
        		'role' => $role,
						'blog_data' => $blog_data,
						'notifications' => $notifications,
						'blogs' => $blogs,
						'pagination' => true,
						'practice' => $practice,
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
			$categories_used_ids = [];
			$tags_used_ids = [];
			$tag_names = [];

			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			$blog = Blog::find($data['id']);

			$categories_used = BlogCategory::where('blogs_id', '=', $data['id'])->get();
			$categories = Category::all();

			if ($categories_used) {
				foreach ($categories_used as $key => $value) {
					$categories_used_ids[] = $value->categories_id;
				}
			}

			$tags_used = BlogTag::where('blogs_id', '=', $data['id'])->get();
			$tags = Tag::all();

			if ($tags_used) {
				foreach ($tags_used as $key => $value) {
					$tags_used_ids[] = $value->tags_id;
				}
			}

			if ($tags_used_ids) {
				foreach ($tags_used_ids as $key => $value) {
					$tag_names[] = Tag::find($value)->name;
				}
			}

			return view("admin.Blog.Posts.update",[
					'blog' => $blog,
					'categories' => $categories,
					'tags_ids' => implode(',', $tag_names),
					'categories_used_ids' => $categories_used_ids,
					'tags' => $tags,
					'tags_used' => $tags_used,
					'categories_used' => $categories_used,
			])->withErrors($errors);
		} else {
			$data = $request->all();
			$t_id = [];
			$categories_used_ids = [];
			$tags_used_ids = [];

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
			$blog->meta_description = $data['meta_description'];
			$blog->user_id = Auth::user()->id;
			$blog->image = $path;
			$blog->description = $data['description'];

			$blog->save();

 			if (isset($data['category'])) {
				$categories_used = BlogCategory::where('blogs_id', '=', $data['id'])->get();

				if ($categories_used) {
					foreach ($categories_used as $key => $value) {
						$categories_used_ids[] = $value->categories_id;
					}
				}

				foreach ($data['category'] as $cat) {
					if (!in_array($cat, $categories_used_ids)) {
						$category = new BlogCategory();
						$category->blogs_id = $blog->id;
						$category->categories_id = $cat;
						$category->save();
					}
				}

				if ($categories_used_ids) {
						foreach ($categories_used_ids as $c => $ct) {
							if (!in_array($ct, $data['category'])) {
									$cat_del = BlogCategory::where('blogs_id', '=', $data['id'])->where('categories_id', '=', $ct)->first();
									$cat_del->delete();
							}
						}
				}
			}

			if (isset($data['tags'])) {
				$tags_used = BlogTag::where('blogs_id', '=', $data['id'])->get();

				if ($tags_used) {
					foreach ($tags_used as $key => $value) {
						$tags_used_ids[] = $value->id;
					}
				}

				$tags = explode(',', $data['tags']);

				foreach ($tags as $tga) {
					$tgg = Tag::where('name', '=', $tga)->first();

					if ($tgg)
						$t_id[] = $tgg->id;
					// if ($tags) {
							// foreach ($tags as $t => $tg) {

								if (!$tgg) {
									$tag_new = new Tag();
									$tag_new->name = $tga;
									$tag_new->system_name = strtolower(str_replace(' ', '_', $tga));
									$tag_new->save();
									$tgg = $tag_new;
								}
							// }
					// }

					if (!in_array($tgg->id, $tags_used_ids)) {
						$tag = new BlogTag();
						$tag->blogs_id = $blog->id;
						$tag->tags_id = $tgg->id;
						$tag->save();
					}
				}

				if ($tags_used_ids) {
						foreach ($tags_used_ids as $t => $tc) {
							if (!in_array($tc, $t_id)) {
									$tag_del = BlogTag::where('blogs_id', '=', $data['id'])->where('tags_id', '=', $tc)->first();
									$tag_del->delete();
							}
						}
				}
			}

			$request->session()->flash('alert-success', 'Blog Updated.');
		}
	}

	public function updateCategory(Request $request) {
		if (!$request->isMethod('post')) {
			$data = $request->all();
			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			// $blog = Blog::find($data['id']);

			return view("admin.Blog.Posts.category",[
					'id' => $data['id']
			])->withErrors($errors);
		} else {
			$data = $request->all();

			$this->validate($request, [
				'name' => 'required',
				// 'description' => 'required'
			]);

			$category = new Category();

			$category->name = $data['name'];
			$category->system_name = strtolower(str_replace(' ', '_', $data['name']));

			$category->save();

			$request->session()->flash('alert-success', 'Category Updated.');
		}
	}

	public function updateCatBlog(Request $request) {
			$data = $request->all();
			$categories_used_ids = [];
			$tags_used_ids = [];
			$tag_names = [];

			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			if (isset($data['id'])) {
				$blog = Blog::find($data['id']);

				$categories_used = BlogCategory::where('blogs_id', '=', $data['id'])->get();
				$categories = Category::all();

				if ($categories_used) {
					foreach ($categories_used as $key => $value) {
						$categories_used_ids[] = $value->categories_id;
					}
				}

				$tags_used = BlogTag::where('blogs_id', '=', $data['id'])->get();
				$tags = Tag::all();

				if ($tags_used) {
					foreach ($tags_used as $key => $value) {
						$tags_used_ids[] = $value->tags_id;
					}
				}

				if ($tags_used_ids) {
					foreach ($tags_used_ids as $key => $value) {
						$tag_names[] = Tag::find($value)->name;
					}
				}
			}

			return view("admin.Blog.Posts.cat-update",[
					'blog' => $blog,
					'categories' => $categories,
					'tags_ids' => implode(',', $tag_names),
					'categories_used_ids' => $categories_used_ids,
					'tags' => $tags,
					'tags_used' => $tags_used,
					'categories_used' => $categories_used,
			])->withErrors($errors);
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
