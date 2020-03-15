<?php

namespace App\role;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $fillable = ['role_name'];
}
