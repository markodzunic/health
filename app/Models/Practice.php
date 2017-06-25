<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Practice extends Model {

	public $table = 'practices';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'user_id',
			'name',
			'description',
			'address',
			'fax',
			'email',
			'site'
	];

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return Practice
	 */
	public function get_practices($sortby, $orderby)
	{
			$sql = 'SELECT practices.*,
					users.first_name as first_name,
					users.last_name as last_name

					FROM practices
					JOIN users ON practices.user_id = users.id ORDER BY '.$sortby.' '.$orderby;

			return DB::select(DB::Raw($sql), [
			]);
	}

	public static $sortColumns = [
			'name' => 'Name',
			'description' => 'Details',
			'address' => 'Address',
			'fax' => 'Fax',
			'email' => 'Email',
			'site' => 'Site'
	];

}
