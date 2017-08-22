<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Message extends Model {

	public $table = 'messages';

	public function get_messages($id)
	{
			$sql = 'SELECT messages.*,
					users.first_name as first_name,
					users.last_name as last_name,
					users.avatar as avatar

					FROM messages
					JOIN users ON messages.user_send = users.id
					WHERE messages.user_id ='.$id
					.' ORDER BY messages.created_at';

			return DB::select(DB::Raw($sql), [
			]);
	}
}
