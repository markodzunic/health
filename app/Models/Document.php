<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Document extends Model {

	public $table = 'documents';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'name',
			'path',
	];

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return Practice
	 */
	public function get_documents($sortby, $orderby)
	{
			$sql = 'SELECT documents.*
					FROM documents
					ORDER BY '.$sortby.' '.$orderby;

			return DB::select(DB::Raw($sql), [
			]);
	}

	public static $sortColumns = [
			'name' => 'Title',
			'path' => 'Path',
	];

}
