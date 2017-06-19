<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("admin.UserAccount.Feedback.index");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$data = $request->all();

		$this->validate($request, [
	        'description' => 'required|max:255',
	    ]);

		$feedback = new Feedback;
		$feedback->user_id = Auth::user()->id;
		$feedback->description = $data['description'];
		$feedback->save();

		$request->session()->flash('alert-success', 'Feedback was successful added!');

		return redirect('/feedback');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();

		$this->validate($request, [
	        'description' => 'required|max:255',
	    ]);

		$feedback = new Feedback;
		$feedback->user_id = Auth::user()->id;
		$feedback->description = $data['description'];
		$feedback->save();
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
