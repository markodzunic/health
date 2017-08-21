<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Models\Message;

class AddSubscriptionController extends Controller {

	protected $messages;

	public function __construct(Message $messages) {
				$this->middleware('admin');
				$this->messages = $messages;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		return view("admin.AddSubscription.index", [
			'practice' => $practice,
			'messages' => $this->messages,
		]);
	}

	public function plan_business() {
			return view("admin.AddSubscription.PlanBusiness.index");
	}

	public function plan_professional() {
			return view("admin.AddSubscription.PlanProfessional.index");
	}

	public function plan_basic() {
			return view("admin.AddSubscription.PlanBasic.index");
	}

	public function assignPractice(Request $request) {
			$data = $request->all();
			$user = Auth::user();

			$practice = new Practice;

			$practice->user_id = $user->id;
			$practice->avatar = 'avatars/avatar.png';
			$practice->name = 'Default'.rand(10,100000);
			$practice->description = 'Enter description';
			$practice->address = 'Add address';
			$practice->phone = '442343532';
			$practice->fax = 'Your fax';
			$practice->email = 'Admin@admin.com';
			$practice->site = 'Your site link';

			$practice->save();

			$this->messages = $this->messages->get_messages(Auth::user()->id);

			$u = User::find($user->id);
			$u->subscription = isset($data['subscription']) ? $data['subscription'] : '';
			$u->save();

			return redirect('/practice_account');
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
