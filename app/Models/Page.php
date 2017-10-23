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
	public function get_pages($data, $sortby, $orderby)
	{
			$where = '';

			if (isset($data['section']) || isset($data['page_id']) || isset($data['practice'])) {
				$where .= ' WHERE ';

				if (isset($data['section']) && $data['section']) {
					$where .= 'pages.section = "'.$data['section'].'" AND ';
				}

				if (isset($data['page_id']) && $data['page_id']) {
					$where .= 'pages.page_id = "'.$data['page_id'].'" AND ';
				}

				if (isset($data['practice']) && $data['practice']) {
					$where .= 'practice_pages.practices_id = "'.$data['practice'].'" AND ';
				}

				if (isset($data['user_id']) && $data['user_id']) {
					$where .= 'pages.user_id = "'.$data['user_id'].'" AND ';
				}

				if (isset($data['section']) && $data['section']) {
					$where .= 'pages.section = "'.$data['section'].'" AND ';
				}

				$where .= '1';
			}

			$sql = 'SELECT pages.*,def_pages.name as pg_name, CONCAT(users.first_name, " ", users.last_name) as user_name
					FROM pages
					JOIN def_pages ON pages.page_id = def_pages.id
					JOIN practice_pages ON pages.id = practice_pages.pages_id
					JOIN users ON pages.user_id = users.id'.$where.'
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
								def_pages.id as page_id,
								pages.id as id,
								pages.section as section,
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
								def_pages.id as page_id,
								pages.id as id,
								def_pages.name as pg_name,
								pages.section as section,
								CONCAT(users.first_name, " ", users.last_name) as user_name
					FROM pages
					JOIN def_pages ON pages.page_id = def_pages.id
					JOIN users ON pages.user_id = users.id
					WHERE pages.created_at > NOW() - INTERVAL 1 DAY
					ORDER BY pages.created_at DESC LIMIT '.$limit;

			return DB::select(DB::Raw($sql), [
			]);
	}

	public function search_pages($data, $limit = 10000)
	{
			$sql = 'SELECT pages.title as title,
								"page" as type,
								pages.description as description,
								pages.created_at as created_at,
								pages.section as category,
								def_pages.id as page_id,
								pages.id as id,
								pages.section as section,
								def_pages.name as pg_name,
								CONCAT(users.first_name, " ", users.last_name) as user_name
					FROM pages
					JOIN def_pages ON pages.page_id = def_pages.id
					JOIN users ON pages.user_id = users.id
					WHERE pages.title LIKE "%'.$data['keywords'].'%" OR pages.description LIKE "%'.$data['keywords'].'%"
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
