<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Role;
use Auth;
use DB;
use App\Models\Practice;
use App\Models\PracticePage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\MessageBag;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class PagesController extends Controller {

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

		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

		$this->sortby = isset($data['sort']) ? $data['sort'] : 'title';
		$this->orderby = isset($data['order']) ? $data['order'] : 'asc';

		$blogModel = new Page;
		$pages = $blogModel->get_pages($this->sortby, $this->orderby);

		# custom pagination
		$currentPage = LengthAwarePaginator::resolveCurrentPage();
		$col = new Collection($pages);
		$perPage = 5;
		$currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
		$pages = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

		if ($request->ajax()) {
				return view('admin.Pages.Pages.table', [
						'sortby' => $this->sortby,
						'orderby' => $this->orderby,
						'pages' => $pages,
						'pagination' => true,
						'practice' => $practice,
						'columns' => Page::$sortColumns,
				])->render();
		} else {
				return view('admin.Pages.Pages.index', [
						'sortby' => $this->sortby,
						'orderby' => $this->orderby,
						'pages' => $pages,
						'pagination' => true,
						'practice' => $practice,
						'columns' => Page::$sortColumns,
				])->render();
		}
	}

	public function deletePage(Request $request) {
			if (!$request->isMethod('post')) {
				$data = $request->all();

				$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

				if ($errors) {
					foreach ($errors as $key => $value) {
						$this->messageBag->add($key, $value);
					}
				}

				return view("admin.Pages.Pages.delete",[
						'data' => $data,
				])->withErrors($errors);
			} else {
				$data = $request->all();

				$blog = Page::find($data['id']);
				$blog->delete();

				$request->session()->flash('alert-success', 'Page deleted.');
			}
	}

	public function updatePage(Request $request) {
		if (!$request->isMethod('post')) {
			$data = $request->all();
			$practices_used_ids = [];
			$roles_ids = [];

			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			if (isset($data['id']))
				$page = Page::find($data['id']);
			else
				$page = null;

			$practices = Practice::all();
			$roles = Role::all();

			if (isset($data['id']))
				$practices_used = PracticePage::where('pages_id', '=', $data['id'])->get();
			else {
				$practices_used = null;
			}

			if ($practices_used) {
				foreach ($practices_used as $key => $value) {
					$practices_used_ids[] = $value->practices_id;
					$roles_ids = explode(',', $value->role_ids);
				}
			}

			return view("admin.Pages.Pages.update",[
					'page' => $page,
					'practices' => $practices,
					'roles' => $roles,
					'roles_ids' => $roles_ids,
					'practices_used_ids' => $practices_used_ids,
			])->withErrors($errors);
		} else {
			$data = $request->all();
			$practice_used_ids = [];

			$this->validate($request, [
				'title' => 'required',
				'description' => 'required',
				'page' => 'required',
				'section' => 'required'
			]);

			$blog = Page::find($data['id']);

			if (!$blog)
				$blog = new Page();

			$blog->title = $data['title'];
			$blog->page = $data['page'];
			$blog->section = $data['section'];
			$blog->description = $data['description'];

			$blog->save();

			$practicePagesUsed = PracticePage::where('pages_id', '=', $blog->id)->get();

			if ($practicePagesUsed) {
					foreach ($practicePagesUsed as $p => $val) {
						$practice_used_ids[] = $val->practices_id;
					}
			}

			if (isset($data['practice'])) {
					foreach ($data['practice'] as $key => $value) {
						// if (!in_array($value, $practice_used_ids)) {
							$practicePages = PracticePage::where('pages_id', '=', $blog->id)->where('practices_id', '=', $value)->first();

							if (!$practicePages)
								$practicePages = new PracticePage();

							$practicePages->pages_id = $blog->id;
							$practicePages->role_ids = implode(',', $data['role']);
							$practicePages->practices_id = $value;
							$practicePages->save();
					// }
				}
			}

			if ($practice_used_ids) {
					$p = isset($data['practice']) ? $data['practice'] : [];
					foreach ($practice_used_ids as $c => $ct) {
						if (!in_array($ct, $p)) {
							$cat_del = PracticePage::where('pages_id', '=', $blog->id)->where('practices_id', '=', $ct)->first();
							$cat_del->delete();
						}
					}
			}

			$request->session()->flash('alert-success', 'Page Updated.');
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
