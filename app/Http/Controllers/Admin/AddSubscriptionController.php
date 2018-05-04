<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\User;
use App\Models\Practice;
use App\Models\PracticePage;
use App\Models\Subscription;
use App\Models\BillingAddress;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Message;

class AddSubscriptionController extends Controller {

	protected $messages;

	public function __construct(Message $messages) {
				$this->middleware(['admin', 'newuser']);
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

		$status = $user->checkStatus();
		$role = $user->checkRole();

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		$blog = new Blog();
    $blog = $blog->get_blogs_notification_new();

    $pages = new Page();
    $pages = $pages->get_pages_notifications_new();
    $notifications = array_merge($blog, $pages);

		return view("admin.AddSubscription.index", [
			'practice' => $practice,
			'status' => $status,
			'role' => $role,
			'notifications' => $notifications,
			'messages' => $this->messages,
		]);
	}

	public function plan_business() {
			$this->messages = $this->messages->get_messages(Auth::user()->id);

			$blog = new Blog();
	    $blog = $blog->get_blogs_notification_new();

			$user = Auth::user();
			$status = $user->checkStatus();
			$role = $user->checkRole();

	    $pages = new Page();
	    $pages = $pages->get_pages_notifications_new();
	    $notifications = array_merge($blog, $pages);

			return view("admin.AddSubscription.PlanBusiness.index", ['messages' => $this->messages, 'notifications' => $notifications, 'status' => $status,
			'role' => $role,]);
	}

	public function plan_professional() {
			$this->messages = $this->messages->get_messages(Auth::user()->id);

			$user = Auth::user();
			$status = $user->checkStatus();
			$role = $user->checkRole();

			$blog = new Blog();
	    $blog = $blog->get_blogs_notification_new();

	    $pages = new Page();
	    $pages = $pages->get_pages_notifications_new();
	    $notifications = array_merge($blog, $pages);

			return view("admin.AddSubscription.PlanProfessional.index", ['messages' => $this->messages, 'notifications' => $notifications, 'status' => $status,
			'role' => $role,]);
	}

	public function plan_basic() {
			$this->messages = $this->messages->get_messages(Auth::user()->id);

			$user = Auth::user();
			$status = $user->checkStatus();
			$role = $user->checkRole();

			$blog = new Blog();
	    $blog = $blog->get_blogs_notification_new();

	    $pages = new Page();
	    $pages = $pages->get_pages_notifications_new();
	    $notifications = array_merge($blog, $pages);

			return view("admin.AddSubscription.PlanBasic.index", ['messages' => $this->messages, 'notifications' => $notifications, 'status' => $status,
			'role' => $role,]);
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

			$pages = Page::where('permission', '=', 'all')->get();

			if ($pages) {
				foreach ($pages as $pg) {
					$pp = PracticePage::where('pages_id', '=', $pg->id)->first();

					$practicePages = new PracticePage();
					$practicePages->practices_id = $practice->id;
					$practicePages->pages_id = $pg->id;
					$practicePages->role_ids = $pp ? $pp->role_ids : '';
					$practicePages->save();
				}
			}

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

			$subscript = new Subscription();
			$subscript->user_id = $user->id;
			$subscript->name = 'test';
			$subscript->stripe_id = 'test';
			$subscript->stripe_plan = 'test';
			$subscript->quantity = 5;
			$subscript->billing_address_id = 1;
			$subscript->ends_at = \Carbon\Carbon::now()->addDays(10);
			$subscript->save();

			$u = User::find($user->id);
			$u->subscription = isset($data['subscription']) ? $data['subscription'] : '';
			$u->role_id = 6;
			$u->save();

			return redirect('/practice_account');
	}

	public function payment(Request $request) {
		$data = $request->all();

		\Stripe\Stripe::setApiKey ( 'sk_test_JYM3PD8m43wyDYS1tOsMwB7C' );
			try {
				\Stripe\Charge::create ( array (
						"amount" => 90000,
						"currency" => 'usd',
						// "receipt_email" => 'dushan887@gmail.com',
						"source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
						"description" => "Test payment."
				) );

				Session::flash ( 'success-message', 'Payment done successfully !' );

				\Mail::send('auth.template', [], function ($message)
		        {

		            $message->from('no-reply@imedical.ie', "iMedical");
		            $message->subject("New Practice Registration");
		            $message->to("cian.crosbie@phgp.ie");

		        });
				// $transaction = new Transaction();
        //
				// $transaction->user_id = Auth::user()->id;
				// $transaction->practices_id = $data['practices_id'];
				// $transaction->subscriptions_id = $data['subscription_id'];
				// $transaction->amount = $data['amount'];
        //
				// $transaction->save();
				return redirect('/assignPractice?subscription='.'basic');
			} catch ( \Exception $e ) {
				Session::flash ( 'fail-message', "Error! Please Try again." );
				// return redirect('/practice_account');
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
