<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'date_of_birth' 
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
     * This is to indicated that many users can be given a list of roles
     */
    public function roles()
    {
        return $this->belongsToMany('App\Modules\AdminPart\Models\Role', 'role_user')->withPivot('list_agents_id');
    }
}
