<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Practice;
use Illuminate\Http\Request;

class PracticeAccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$user = Auth::user();
		$limit = 0;
		$practice_users = [];
		
		$practice = Practice::where('user_id', '=', $user->id)->first();
		if ($practice) {
			$limit = 6 - User::where('authorised_user', '=', $practice->id)->count();
			$practice_users = User::with('role')->where('authorised_user', '=', $practice->id)->get();
		}

		if (!$request->ajax()) {
				return view("admin.PracticeAccount.Profile.index", [
		       'user' => $user,
					 'practice_users' => $practice_users,
					 'practice' => $practice,
					 'limit' => $limit,
		    ]);
		} else {
			return view("admin.PracticeAccount.Profile.practice-info", [
				 'user' => $user,
				 'practice' => $practice,
				 'practice_users' => $practice_users,
				 'limit' => $limit,
			]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{

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
			'name' => 'required',
			'address' => 'required',
			'email' => 'required',
	    ]);

		$prectice = new Practice;
		$prectice->user_id = Auth::user()->id;
		$prectice->name = $data['name'];
		$prectice->description = $data['description'];
		$prectice->address = $data['address'];
		$prectice->fax = $data['fax'];
		$prectice->email = $data['email'];
		$prectice->site = $data['site'];
		$prectice->save();
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
		$data = $request->all();

		$this->validate($request, [
			'name' => 'required',
			'address' => 'required',
			'email' => 'required',
	    ]);

		$prectice = Practice::find($id);
		$prectice->user_id = Auth::user()->id;
		$prectice->name = $data['name'];
		$prectice->description = $data['description'];
		$prectice->address = $data['address'];
		$prectice->fax = $data['fax'];
		$prectice->email = $data['email'];
		$prectice->site = $data['site'];
		$prectice->save();
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
