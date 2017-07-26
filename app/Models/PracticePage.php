<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PracticePage extends Model {

	public $table = 'practice_pages';

  protected $fillable = [
			'practices_id',
			'role_ids',
			'pages_id',
	];

}
