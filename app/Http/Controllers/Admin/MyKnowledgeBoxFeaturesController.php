<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use App\Models\Page;
use Auth;
use Illuminate\Http\Request;

class MyKnowledgeBoxFeaturesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

		$data = $request->all();

		$recommended_practice = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'recommended_practice')->get();
		$diff_practice = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'diff_practice')->get();
		$checklist = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'checklist')->get();
		$templates = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'templates')->get();
		$faq = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'faq')->get();
		$ressources = Page::where('page_id', '=', $data['page_id'])->where('section', '=', 'ressources')->get();

		return view("admin.MyKnowledgeBox.Features.index", [
			'practice' => $practice,
			'recommended_practice' => $recommended_practice,
			'diff_practice' => $diff_practice,
			'checklist' => $checklist,
			'templates' => $templates,
			'faq' => $faq,
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
