<?php

namespace App\Http\Controllers\PublicPart;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Tag;
use App\Models\Category;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$blogs = new Blog();
		$blogs = $blogs->get_blogs('title','asc');

		foreach ($blogs as $key => $value) {
			$cat = BlogCategory::where('blogs_id', '=', $value->id)->first();
			$usr = User::find($value->user_id);

			if ($cat) {
				$c = Category::find($cat->categories_id);
			}
				$blogs[$key]->category = isset($c->name) ? $c->name : '';
				$blogs[$key]->category_id = isset($cat->categories_id) ? $cat->categories_id : 0;
				$blogs[$key]->user_first = isset($usr->first_name) ? $usr->first_name : '';
				$blogs[$key]->user_last = isset($usr->last_name) ? $usr->last_name : '';
			// }
 		}

	 #custom pagination
	 $currentPage = LengthAwarePaginator::resolveCurrentPage();
	 $col = new Collection($blogs);
	 $perPage = 5;
	 $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
	 $blogs = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

		return view('public.Blog.index', [
			'blogs' => $blogs,
		]);
	}

	public function blogCategory(Request $request) {
		$data = $request->all();
		$blogs = [];

		$cat = BlogCategory::where('categories_id', '=', $data['category'])->get();

		if ($cat) {
				foreach ($cat as $key => $value) {
					$b = Blog::find($value->blogs_id);
					if ($b)
						$blogs[] = $b;
				}
		}

		return view('public.Blog.BlogCategory.index', [
			'blogs' => $blogs,
		]);
	}

	public function blogSingle(Request $request) {
		$data = $request->all();
		$tags = [];
		$categories = [];

		$blog = Blog::find($data['id']);
		$user = User::find($blog->id);
		$tagsB = BlogTag::where('blogs_id', '=', $blog->id)->get();

		if ($tagsB) {
				foreach ($tagsB as $key => $value) {
					$t = Tag::find($value->tags_id);
					if ($t)
						$tags[] = $t;
				}
		}

		$categoriesB = BlogCategory::where('blogs_id', '=', $blog->id)->get();

		if ($categoriesB) {
				foreach ($categoriesB as $key => $value) {
					$c = Category::find($value->categories_id);
					if ($c)
						$categories[] = $c;
				}
		}

		return view('public.Blog.BlogSingle.index', [
			'blog' => $blog,
			'user' => $user,
			'tags' => $tags,
			'categories' => $categories,
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
