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
	];

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return Practice
	 */
	public function get_pages($sortby, $orderby)
	{
			$sql = 'SELECT pages.*
					FROM pages
					ORDER BY '.$sortby.' '.$orderby;

			return DB::select(DB::Raw($sql), [
			]);
	}

	public static $sortColumns = [
			'title' => 'Title',
			'description' => 'Description',
			'page' => 'Page',
      'section' => 'Section',
	];

}
