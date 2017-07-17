<?php
namespace App\Http\Controllers\Admin;

use Carbon\Carabon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use App\User;
use Illuminate\Http\Request;
use Auth;

class BillingAndPaymentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

		$limit = 0;
		$practice_users = [];
		$admin_users = [];

		$practice = Practice::where('user_id', '=', $user->id)->first();

		if ($practice) {
			// $admin_users = User::where('authorised_user', '=', $practice->id)->where('role_id', '!=', 1)->where('role_id', '=', 5)->get();
			$limit = 7 - User::where('authorised_user', '=', $practice->id)->where('role_id', '!=', 1)->where('role_id', '!=', 5)->count();
			$subscription = User::where('authorised_user', '=', $practice->id)->where('role_id', '=', 1)->first();
			// $practice_users = User::with('role')->where('authorised_user', '=', $practice->id)->where('role_id', '!=', 5)->where('role_id', '!=', 1)->get();
		}

		if (!$request->ajax()) {
				return view("admin.PracticeAccount.BillingAndPayment.index", [
		       'user' => $user,
					 'subscription' => $subscription,
					//  'admin_users' => $admin_users,
					//  'practice_users' => $practice_users,
					 'practice' => $practice,
					 'limit' => $limit,
		    ]);
		} else {
			return view("admin.PracticeAccount.BillingAndPayment.content", [
				 'user' => $user,
				 'practice' => $practice,
				 'subscription' => $subscription,
				//  'admin_users' => $admin_users,
				//  'practice_users' => $practice_users,
				 'limit' => $limit,
			]);
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
