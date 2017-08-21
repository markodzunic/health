<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Page extends Model {

	public $table = 'pages';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'title',
			'description',
			'page',
      'section',
			'user_id'
	];

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return Practice
	 */
	public function get_pages($sortby, $orderby)
	{
			$sql = 'SELECT pages.*,def_pages.name as pg_name, CONCAT(users.first_name, " ", users.last_name) as user_name
					FROM pages
					JOIN def_pages ON pages.page_id = def_pages.id
					JOIN users ON pages.user_id = users.id
					ORDER BY '.$sortby.' '.$orderby;

			return DB::select(DB::Raw($sql), [
			]);
	}

	public function get_pages_notifications($limit = 10000)
	{
			$sql = 'SELECT pages.title as title,
								"page" as type,
								pages.created_at as created_at,
								pages.section as category,
								def_pages.name as pg_name,
								CONCAT(users.first_name, " ", users.last_name) as user_name
					FROM pages
					JOIN def_pages ON pages.page_id = def_pages.id
					JOIN users ON pages.user_id = users.id
					ORDER BY pages.created_at DESC LIMIT '.$limit;

			return DB::select(DB::Raw($sql), [
			]);
	}

	public function get_pages_notifications_new($limit = 10000)
	{
			$sql = 'SELECT pages.title as title,
								"page" as type,
								pages.created_at as created_at,
								pages.section as category,
								def_pages.name as pg_name,
								CONCAT(users.first_name, " ", users.last_name) as user_name
					FROM pages
					JOIN def_pages ON pages.page_id = def_pages.id
					JOIN users ON pages.user_id = users.id
					WHERE pages.created_at > NOW() - INTERVAL 1 DAY
					ORDER BY pages.created_at DESC LIMIT '.$limit;

			return DB::select(DB::Raw($sql), [
			]);
	}

	public static $sortColumns = [
			'title' => 'Title',
			'user_name' => 'Author',
			'page' => 'Page',
      'section' => 'Section',
	];

}
