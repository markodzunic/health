<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class PracticeUser
{
  /**
   * The Guard implementation.
   *
   * @var Guard
   */
  protected $auth;

  /**
   * Create a new middleware instance.
   *
   * @param  Guard  $auth
   * @return void
   */
  public function __construct(Guard $auth)
  {
      $this->auth = $auth;
  }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if ($this->auth->guest() || $this->auth->user()->approved == 0 || $this->auth->user()->role_id == 3 ||  $this->auth->user()->role_id == 4 || $this->auth->user()->role_id == 5 || $this->auth->user()->role_id == 7 || $this->auth->user()->role_id == 8) {
          return response('Unauthorized.', 401);
      } else if ($this->auth->check() && $this->auth->user()->active == 0) {
          $this->auth->user()->sessions()->delete();
          return view('errors.error_page')->withErrors('Your account has been deactivated. Please contact your manager.');
      }

      return $next($request);
    }
}
