<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ReportProblem;
use Auth;
use Illuminate\Http\Request;

class ReportProblemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("Admin.ReportProblem.index");
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
			'first_name' => 'required',
			'last_name' => 'required',
			'position' => 'required',
			'practice_name' => 'required',
			'phone' => 'required',
			'email' => 'required|email',
	        'description' => 'required|max:255',
	    ]);

		$report_problem = new ReportProblem;
		$report_problem->user_id = Auth::user()->id;
		$report_problem->first_name = $data['first_name'];
		$report_problem->last_name = $data['last_name'];
		$report_problem->position = $data['position'];
		$report_problem->practice_name = $data['practice_name'];
		$report_problem->phone = $data['phone'];
		$report_problem->email = $data['email'];
		$report_problem->description = $data['description'];
		$report_problem->urgent = $data['urgent'];
		$report_problem->save();

		$request->session()->flash('alert-success', 'Problem was successful added!');

		return redirect('/report_problem');
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
