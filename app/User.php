<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'title', 
        'first_name', 
        'last_name', 
        'date_of_birth',
        'position_type', 
        'gender', 
        'phone', 
        'occupation', 
        'med_reg_number',
        'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function update_user($data)
    {   
        $user = new User;
        
        $user->title = $data['title']; 
        $user->first_name = $data['first_name']; 
        $user->last_name = $data['last_name']; 
        $user->date_of_birth = $data['date_of_birth']; 
        $user->position_type = 'User'; 
        $user->gender = $data['gender']; 
        $user->med_reg_number = $data['med_reg_number'];
        $user->save();

        return $user;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function update_password($data)
    {   
        $user = new User;
        $user->password = bcrypt($data['password']);
        $user->save();

        return $user;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function get_roles_for_user($user)
    {
        $sql = 'SELECT
            roles.name as name,
            roles.display_name as display_name
            
            FROM role_user
            JOIN roles ON role_user.role_id = roles.id
            WHERE role_user.user_id='.$user->id;

        return DB::select(DB::Raw($sql), [
        ]);
    }
}
