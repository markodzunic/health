<?php
namespace App\Http\Controllers\Admin;

use Carbon\Carabon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use App\Models\Page;
use App\Models\Blog;
use App\Models\BillingAddress;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\MessageBag;
use App\Models\Message;

class BillingAndPaymentController extends Controller {

	protected $messages;
	protected $messageBag;

	public function __construct(MessageBag $messageBag, Message $messages) {
				$this->middleware('admin');
				$this->messages = $messages;
				$this->messageBag = $messageBag;
	}

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

		$billing_address = BillingAddress::where('practices_id', '=', $practice->id)->first();
		// $practice = Practice::where('user_id', '=', $user->id)->first();

		if ($practice) {
			// $admin_users = User::where('authorised_user', '=', $practice->id)->where('role_id', '!=', 1)->where('role_id', '=', 5)->get();
			$limit = 7 - User::where('authorised_user', '=', $practice->id)->where('role_id', '!=', 1)->where('role_id', '!=', 5)->count();
			$subscription = User::where('authorised_user', '=', $practice->id)->orWhere('role_id', '=', 1)->orWhere('role_id', '=', 4)->first();
			// $practice_users = User::with('role')->where('authorised_user', '=', $practice->id)->where('role_id', '!=', 5)->where('role_id', '!=', 1)->get();
		}

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
    $blog = $blog->get_blogs_notification();

    $pages = new Page();
    $pages = $pages->get_pages_notifications();
    $notifications = array_merge($blog, $pages);

		if (!$request->ajax()) {
				return view("admin.PracticeAccount.BillingAndPayment.index", [
		       'user' => $user,
					 'subscription' => $subscription,
					 'messages' => $this->messages,
					 'notifications' => $notifications,
					 'billing_address' => $billing_address,
					//  'admin_users' => $admin_users,
					//  'practice_users' => $practice_users,
					 'practice' => $practice,
					 'limit' => $limit,
		    ]);
		} else {
			return view("admin.PracticeAccount.BillingAndPayment.content", [
				 'user' => $user,
				 'practice' => $practice,
				 'billing_address' => $billing_address,
				 'messages' => $this->messages,
				 'subscription' => $subscription,
				 'notifications' => $notifications,
				//  'admin_users' => $admin_users,
				//  'practice_users' => $practice_users,
				 'limit' => $limit,
			]);
		}
	}

	public function updateBilling(Request $request) {
		if (!$request->isMethod('post')) {
			$data = $request->all();
			$errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

			if ($errors) {
				foreach ($errors as $key => $value) {
					$this->messageBag->add($key, $value);
				}
			}

			$practice = BillingAddress::find($data['id']);

			return view("admin.PracticeAccount.BillingAndPayment.billing-info",[
					'practice' => $practice
			])->withErrors($errors);
		} else {
			$data = $request->all();

			$this->validate($request, [
				'first_name' => 'required',
				'last_name' => 'required',
				'address_1' => 'required',
				'address_2' => 'required',
				'email' => 'required|email',
				'city' => 'required',
				'state' => 'required',
				'country' => 'required',
				'zip' => 'required',
				'phone' => 'required',
				'company' => 'required',
			]);

			$billing = BillingAddress::find($data['id']);

			$billing->address_1 = $data['address_1'];
			$billing->address_2 = $data['address_2'];
			$billing->city = $data['city'];
			$billing->state = $data['state'];
			$billing->country = $data['country'];
			$billing->zip = $data['zip'];
			$billing->phone = $data['phone'];
			$billing->email = $data['email'];
			$billing->company = $data['company'];
			$billing->first_name = $data['first_name'];
			$billing->last_name = $data['last_name'];

			$billing->save();

			$request->session()->flash('alert-success', 'Billing Info Updated.');

			return view("admin.PracticeAccount.BillingAndPayment.billing-address",[
					'billing_address' => $billing
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
