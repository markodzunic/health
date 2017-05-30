<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model {

	public $table = 'role_user';

	public function find_roles($user_id) {
		$sql = 'SELECT
        	roles.name as name,
        	roles.dispaly_name as name_display

            FROM role_user
            JOIN roles ON roles.id=role_user.role_id
            WHERE role_user.user_id = :user_id
        ';
        return DB::select(DB::Raw($sql), [
            'user_id' => $user_id
        ]);
	}

}
