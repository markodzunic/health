<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Practice;
use App\Models\BillingAddress;
use App\Models\Page;
use App\Models\Blog;
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

		$blog = new Blog();
    $blog = $blog->get_blogs_notification();

    $pages = new Page();
    $pages = $pages->get_pages_notifications();
    $notifications = array_merge($blog, $pages);

		return view("admin.AddSubscription.index", [
			'practice' => $practice,
			'notifications' => $notifications,
			'messages' => $this->messages,
		]);
	}

	public function plan_business() {
			$this->messages = $this->messages->get_messages(Auth::user()->id);

			$blog = new Blog();
	    $blog = $blog->get_blogs_notification();

	    $pages = new Page();
	    $pages = $pages->get_pages_notifications();
	    $notifications = array_merge($blog, $pages);

			return view("admin.AddSubscription.PlanBusiness.index", ['messages' => $this->messages, 'notifications' => $notifications,]);
	}

	public function plan_professional() {
			$this->messages = $this->messages->get_messages(Auth::user()->id);

			$blog = new Blog();
	    $blog = $blog->get_blogs_notification();

	    $pages = new Page();
	    $pages = $pages->get_pages_notifications();
	    $notifications = array_merge($blog, $pages);

			return view("admin.AddSubscription.PlanProfessional.index", ['messages' => $this->messages, 'notifications' => $notifications,]);
	}

	public function plan_basic() {
			$this->messages = $this->messages->get_messages(Auth::user()->id);

			$blog = new Blog();
	    $blog = $blog->get_blogs_notification();

	    $pages = new Page();
	    $pages = $pages->get_pages_notifications();
	    $notifications = array_merge($blog, $pages);

			return view("admin.AddSubscription.PlanBasic.index", ['messages' => $this->messages, 'notifications' => $notifications,]);
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

			$billing = new BillingAddress;

			$billing->practices_id = $practice->id;
			$billing->address_1 = 'avatars/avatar.png';
			$billing->address_2 = 'Default'.rand(10,100000);
			$billing->city = 'City';
			$billing->state = 'State';
			$billing->country = 'Serbia';
			$billing->zip = '4434234';
			$billing->phone = 'dfsfsfs';
			$billing->email = 'State';
			$billing->company = 'State';			
			$billing->first_name = 'Serbia';
			$billing->last_name = '4434234';

			$billing->save();

			$this->messages = $this->messages->get_messages(Auth::user()->id);

			$u = User::find($user->id);
			$u->subscription = isset($data['subscription']) ? $data['subscription'] : '';
			$u->save();

			return redirect('/practice_account');
	}

	public function payment(Request $request) {
		dd($request->all());
		\Stripe\Stripe::setApiKey ( 'sk_test_yourSecretkey' );
			try {
				\Stripe\Charge::create ( array (
						"amount" => 300 * 100,
						"currency" => "usd",
						"source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
						"description" => "Test payment."
				) );
				Session::flash ( 'success-message', 'Payment done successfully !' );
				return Redirect::back ();
			} catch ( \Exception $e ) {
				Session::flash ( 'fail-message', "Error! Please Try again." );
				return Redirect::back ();
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
