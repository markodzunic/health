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
			$sql = 'SELECT blogs.*
					FROM blogs
					ORDER BY '.$sortby.' '.$orderby;

			return DB::select(DB::Raw($sql), [
			]);
	}

	public static $sortColumns = [
			'title' => 'Title',
			'description' => 'Description',
			'created_at' => 'Date',
	];

}
