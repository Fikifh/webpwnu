<?php

namespace App;

use App\role\RoleModel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'roles_id'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * used for definite the relation use model to role model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles($id){
        return RoleModel::find($id);
    }

    /**
     * used for update roles
     * @param $role
     */
    public function putRole($role){
        if(is_string($role)){
            $role = RoleModel::where('role_name', $role)->first();
        }
        return $this->roles()->attach($role);
    }

    /**
     * used for delete roles
     * @param $role
     * @return int
     */
    public function forgetRole($role){
        if(is_string($role)){
            $role = RoleModel::where('role_name', $role)->first();
        }
        return $this->roles()->detach($role);
    }

    /**
     * used for check the user roles
     * @param $roleName
     * @return bool
     */
    public function hasRole($roleName, $roleId){
//        foreach ($this->roles($roleId) as $role) {
        $roleUser = RoleModel::find($roleId);
        $roleNameDb = $roleUser->role_name;
        if ($roleNameDb == $roleName) {
            return true;
        }
//        }
        return false;
    }
}
