<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Blog extends Model {

	public $table = 'blogs';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'title',
			'description',
			'image',
	];

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return Practice
	 */
	public function get_blogs($sortby, $orderby)
	{
			$sql = 'SELECT blogs.*, CONCAT(users.first_name, " ", users.last_name) as user_name
					FROM blogs
					JOIN users ON blogs.user_id = users.id
					ORDER BY '.$sortby.' '.$orderby;

			return DB::select(DB::Raw($sql), [
			]);
	}

	public function get_blogs_notification($limit = 10000)
	{
			$sql = 'SELECT blogs.title as title,
								(SELECT GROUP_CONCAT(categories.name) FROM blog_categories JOIN categories ON categories.id = blog_categories.categories_id WHERE blog_categories.blogs_id = blogs.id) as category,
			 					blogs.created_at as created_at,
								"blog" as type,
								CONCAT(users.first_name, " ", users.last_name) as user_name
					FROM blogs
					JOIN users ON blogs.user_id = users.id
					
					ORDER BY blogs.created_at DESC LIMIT '.$limit;

			return DB::select(DB::Raw($sql), [
			]);
	}

	public function get_blogs_notification_new($limit = 10000)
	{
			$sql = 'SELECT blogs.title as title,
								(SELECT GROUP_CONCAT(categories.name) FROM blog_categories JOIN categories ON categories.id = blog_categories.categories_id WHERE blog_categories.blogs_id = blogs.id) as category,
			 					blogs.created_at as created_at,
								"blog" as type,
								CONCAT(users.first_name, " ", users.last_name) as user_name
					FROM blogs
					JOIN users ON blogs.user_id = users.id
					WHERE blogs.created_at > NOW() - INTERVAL 1 DAY
					ORDER BY blogs.created_at DESC LIMIT '.$limit;

			return DB::select(DB::Raw($sql), [
			]);
	}

	public static $sortColumns = [
			'title' => 'Title',
			'user_name' => 'Author',
			'created_at' => 'Date',
	];

}
