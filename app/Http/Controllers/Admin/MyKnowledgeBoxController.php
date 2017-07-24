<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use App\Models\DefPage;
use Auth;
use Illuminate\Http\Request;

class MyKnowledgeBoxController extends Controller {

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

		return view("admin.MyKnowledgeBox.index", [
			'practice' => $practice,
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
