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
				$this->middleware(['admin', 'newuser']);
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

		$status = $user->checkStatus();
		$role = $user->checkRole();

		$blog = new Blog();
    $blog = $blog->get_blogs_notification_new();

    $pages = new Page();
    $pages = $pages->get_pages_notifications_new();
    $notifications = array_merge($blog, $pages);

    $blogN = new Blog();
    $blogN = $blogN->get_blogs_notification();

    $pagesN = new Page();
    $pagesN = $pagesN->get_pages_notifications();
    $notificationsN = array_merge($blogN, $pagesN);

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
				'status' => $status,
        'role' => $role,
        'notifications' => $notifications,
				'notificationsN' => $notificationsN,
				'practice' => $practice,
				'columns' => Practice::$sortColumns,
		])->render();
	}
}
