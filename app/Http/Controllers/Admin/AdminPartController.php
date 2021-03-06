<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Practice;
use Auth;
use App\Models\Message;
use App\Models\Page;
use App\Models\Blog;

class AdminPartController extends Controller
{
    protected $messages;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct(Message $messages) {
   				$this->middleware('admin');
   				$this->messages = $messages;
   	}

    public function index() {
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

      return view('home', [
        'practice' => $practice,
        'status' => $status,
        'role' => $role,
        'messages' => $this->messages,
        'notifications' => $notifications,
      ]);
    }
}
