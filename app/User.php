<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use Searchable;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
         //tablename,foreignkey{this table},foreign key(other table)
      return $this->belongsToMany('App\Role','user_role','user_id','role_id');
    }


    public function authorizeRoles($roles)
    {
      if (is_array($roles)) {
        return $this->hasAnyRole($roles);
      }
      return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if ($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
      return null !== $this->roles()->where('name', $role)->first();
    }

    
     public function searchableAs(){
        //check on database what are you going to search
        return 'users';
    }
    
}
