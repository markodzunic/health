<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Practice;
use App\Models\Blog;
use App\Models\Page;
use App\User;
use DB;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\MessageBag;
use Intervention\Image\ImageManagerStatic as Image;

class NotificationsController extends Controller {

	protected $sortby;
	protected $orderby;
	protected $messages;
	protected $messageBag;

	public function __construct(MessageBag $messageBag, Message $messages) {
				$this->middleware('admin');
				$this->messageBag = $messageBag;
				$this->messages = $messages;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$data = $request->all();

		$user = Auth::user();
    $practice = Practice::where('user_id', '=', $user->id)->first();

    $blog = new Blog();
    $blog = $blog->get_blogs_notification();

    $pages = new Page();
    $pages = $pages->get_pages_notifications();
    $notifications = array_merge($blog, $pages);

		# custom pagination
		$currentPage = LengthAwarePaginator::resolveCurrentPage();
		$col = new Collection($notifications);
		$perPage = 10;
		$currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
		$notifications = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

		$this->messages = $this->messages->get_messages(Auth::user()->id);

		return view('admin.Notifications.index', [
				'messages' => $this->messages,
				'pagination' => true,
        'notifications' => $notifications,
				'practice' => $practice,
				'columns' => Practice::$sortColumns,
		])->render();
	}
}
