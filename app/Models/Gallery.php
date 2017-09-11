<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Gallery extends Model {

	public $table = 'images';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'name',
			'path',
			'thumb',
	];

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return Practice
	 */
	public function get_images($sortby, $orderby)
	{
			$sql = 'SELECT images.*
					FROM images
					ORDER BY '.$sortby.' '.$orderby;

			return DB::select(DB::Raw($sql), [
			]);
	}

	// public static $sortColumns = [
	// 		'title' => 'Title',
	// 		'user_name' => 'Author',
	// 		'created_at' => 'Date',
	// ];

}
