<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Blog;
use App\Models\DefPage;
use App\Models\Role;
use Auth;
use DB;
use App\Models\Message;
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
	protected $messages;
	protected $messageBag;

	public function __construct(MessageBag $messageBag, Message $messages) {
				$this->middleware(['admin', 'practiceuser', 'newuser']);
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
		$practices = [];
		$roles = [];
		$role_names = [];
		$practice_names = [];
		$rn = $pn = '';

		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

		$status = $user->checkStatus();
		$role = $user->checkRole();

		$this->sortby = isset($data['sort']) ? $data['sort'] : 'title';
		$this->orderby = isset($data['order']) ? $data['order'] : 'asc';
		if ($role !== 'admin') {
			$data['user_id'] = Auth::User()->id;
			$data['practice'] = $practice->id;
			$data['section'] = 'recommended_practice';
		}

		$blogModel = new Page;
		$pagesD = $blogModel->get_pages($data, $this->sortby, $this->orderby);
		$rn = [];
		if ($pagesD) {
			foreach ($pagesD as $key => $value) {
				$pp = PracticePage::where('pages_id', '=', $value->id)->get();
				if ($pp) {
						foreach ($pp as $p => $pv) {
							$rn = [];
							$role_names[$value->id]['practices_names'] = Practice::find($pv->practices_id)->name;
							$role_names[$value->id]['roles'] = '';

							// if ($pv->role_ids) {
							// 		foreach (explode(',', $pv->role_ids) as $rol) {
							// 				$rn[] = Role::find($rol)->display_name;
							// 		}
							// 		$role_names[$value->id]['roles'] = $rn = implode(',', $rn);
							// }
						}
				}
			}
		}
// dd($role_names);
		# custom pagination
		$currentPage = LengthAwarePaginator::resolveCurrentPage();
		$col = new Collection($pagesD);
		$perPage = 10;
		$currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
		$pagesD = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
    $blog = $blog->get_blogs_notification_new();

    $pages = new Page();
    $pages = $pages->get_pages_notifications_new();
    $notifications = array_merge($blog, $pages);

		$def_pages = DefPage::all();
		$practices = Practice::all();

		if ($role == 'practice_manager') {
			// $practices_used_ids = [];
			$practices = Practice::where('user_id', '=', $user->id)->get();
			// $practices_used_ids[] = $pr->id;
		}

		if ($request->ajax()) {
				return view('admin.Pages.Pages.table', [
						'sortby' => $this->sortby,
						'practices' => $practices,
						'def_pages' => $def_pages,
						'role_names' => $role_names,
						'orderby' => $this->orderby,
						'pages' => $pagesD,
						'notifications' => $notifications,
						'messages' => $this->messages,
						'status' => $status,
        		'role' => $role,
						'pagination' => true,
						'practice' => $practice,
						'columns' => Page::$sortColumns,
				])->render();
		} else {
				return view('admin.Pages.Pages.index', [
						'sortby' => $this->sortby,
						'role_names' => $role_names,
						'practices' => $practices,
						'def_pages' => $def_pages,
						'status' => $status,
        		'role' => $role,
						'orderby' => $this->orderby,
						'notifications' => $notifications,
						'messages' => $this->messages,
						'pages' => $pagesD,
						'pagination' => true,
						'practice' => $practice,
						'columns' => Page::$sortColumns,
				])->render();
		}
	}

	public function upload_images(Request $request) {
		// var_dump($_FILES);dd($request->all());
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

	public function searchPages(Request $request) {
			$data = $request->all();

			$pages = new Page();
			$results = $pages->search_pages($data);

			$user = Auth::user();
			$status = $user->checkStatus();
			$role = $user->checkRole();

			$this->messages = $this->messages->get_messages(Auth::user()->id);

			$blog = new Blog();
	    $blog = $blog->get_blogs_notification();

	    $pages = new Page();
	    $pages = $pages->get_pages_notifications();
	    $notifications = array_merge($blog, $pages);

			return view("admin.search.index",[
					'results' => $results,
					'notifications' => $notifications,
					'status' => $status,
        	'role' => $role,
					'messages' => $this->messages,
			]);
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
			$pages = DefPage::all();

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

			$user = Auth::user();
			$status = $user->checkStatus();
			$role = $user->checkRole();

			if ($role == 'practice_manager') {
				// $practices_used_ids = [];
				$practices = Practice::where('user_id', '=', $user->id)->get();
				// $practices_used_ids[] = $pr->id;
			}

			return view("admin.Pages.Pages.update",[
					'page' => $page,
					'role' => $role,
					'pages' => $pages,
					'practices' => $practices,
					'roles' => $roles,
					'roles_ids' => $roles_ids,
					'practices_used_ids' => $practices_used_ids,
			])->withErrors($errors);
		} else {
			$data = $request->all();
			$practice_used_ids = [];
			$r_ids = [];

			$this->validate($request, [
				'title' => 'required',
				// 'description' => 'required',
				'page' => 'required',
				'section' => 'required'
			]);

			if (isset($data['page']) && $data['page'] !== 'all') {
				$blog = Page::find($data['id']);

				if (!$blog)
					$blog = new Page();

				$blog->user_id = Auth::user()->id;
				$blog->title = $data['title'];
				$blog->page_id = $data['page'];
				$blog->section = $data['section'];
				$blog->description = isset($data['description']) ? $data['description']: '';

				if (in_array('all-practice', $data['practice'])) {
					 $blog->permission = 'all';
				} else {
						$blog->permission = '';
				}

				$blog->save();

				$practicePagesUsed = PracticePage::where('pages_id', '=', $blog->id)->get();

				if ($practicePagesUsed) {
						foreach ($practicePagesUsed as $p => $val) {
							$practice_used_ids[] = $val->practices_id;
						}
				}

				if (isset($data['practice'])) {
					if (in_array('all-practice', $data['practice'])) {

							$pr = Practice::all();

							if ($pr) {
									foreach ($pr as $p => $pval) {
										$practicePages = PracticePage::where('pages_id', '=', $blog->id)->where('practices_id', '=', $pval->id)->first();

										if (!$practicePages)
											$practicePages = new PracticePage();

										$practicePages->pages_id = $blog->id;

										if (isset($data['role']) && in_array('all-role', $data['role'])) {

												$rl = Role::all();
												if ($rl) {
													foreach ($rl as $r => $rv) {
														$r_ids[] = $rv->id;
													}
												}
										} else {
											 $r_ids = $data['role'];
										}

										$practicePages->role_ids = $r_ids ? implode(',', array_unique($r_ids)) : '';
										$practicePages->practices_id = $pval->id;
										$practicePages->save();
									}
							}
						} else {
							foreach ($data['practice'] as $key => $value) {
								// if (!in_array($value, $practice_used_ids)) {
									$practicePages = PracticePage::where('pages_id', '=', $blog->id)->where('practices_id', '=', $value)->first();

									if (!$practicePages)
										$practicePages = new PracticePage();

									$practicePages->pages_id = $blog->id;

									if (isset($data['role']) && in_array('all-role', $data['role'])) {

											$rl = Role::all();
											if ($rl) {
												foreach ($rl as $r => $rv) {
													$r_ids[] = $rv->id;
												}
											}
									} else {
										 $r_ids = $data['role'];
									}

									$practicePages->role_ids = $r_ids ? implode(',', array_unique($r_ids)) : '';
									$practicePages->practices_id = $value;
									$practicePages->save();
								}
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
			} else {
					$pg = DefPage::all();
					if ($pg) {
							foreach ($pg as $kp => $pgval) {
								$blog = Page::find($pgval->id);

								if (!$blog)
									$blog = new Page();

								$blog->user_id = Auth::user()->id;
								$blog->title = $data['title'];
								$blog->page_id = $pgval->id;
								$blog->section = $data['section'];
								$blog->description = isset($data['description']) ? $data['description']: '';

								$blog->save();

								$practicePagesUsed = PracticePage::where('pages_id', '=', $blog->id)->get();

								if ($practicePagesUsed) {
										foreach ($practicePagesUsed as $p => $val) {
											$practice_used_ids[] = $val->practices_id;
										}
								}

								if (isset($data['practice'])) {
									if (in_array('all-practice', $data['practice'])) {

											$pr = Practice::all();

											if ($pr) {
													foreach ($pr as $p => $pval) {
														$practicePages = PracticePage::where('pages_id', '=', $blog->id)->where('practices_id', '=', $pval->id)->first();

														if (!$practicePages)
															$practicePages = new PracticePage();

														$practicePages->pages_id = $blog->id;

														if (isset($data['role']) && in_array('all-role', $data['role'])) {

																$rl = Role::all();
																if ($rl) {
																	foreach ($rl as $r => $rv) {
																		$r_ids[] = $rv->id;
																	}
																}
														} else {
															 $r_ids = $data['role'];
														}

														$practicePages->role_ids = $r_ids ? implode(',', array_unique($r_ids)) : '';
														$practicePages->practices_id = $pval->id;
														$practicePages->save();
														// $r_ids = [];
													}
											}
										} else {
											foreach ($data['practice'] as $key => $value) {
												// if (!in_array($value, $practice_used_ids)) {
													$practicePages = PracticePage::where('pages_id', '=', $blog->id)->where('practices_id', '=', $value)->first();

													if (!$practicePages)
														$practicePages = new PracticePage();

													$practicePages->pages_id = $blog->id;

													if (isset($data['role']) && in_array('all-role', $data['role'])) {

															$rl = Role::all();
															if ($rl) {
																foreach ($rl as $r => $rv) {
																	$r_ids[] = $rv->id;
																}
															}
													} else {
														 $r_ids = $data['role'];
													}

													$practicePages->role_ids = $r_ids ? implode(',', array_unique($r_ids)) : '';
													$practicePages->practices_id = $value;
													$practicePages->save();
													// $r_ids = [];
												}
											}
								}

								if ($practice_used_ids) {
										$p = isset($data['practice']) ? $data['practice'] : [];
										foreach ($practice_used_ids as $c => $ct) {
											if (!in_array($ct, $p)) {
												$cat_del = PracticePage::where('pages_id', '=', $blog->id)->where('practices_id', '=', $ct)->first();
												if ($cat_del)
													$cat_del->delete();
											}
										}
								}
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
