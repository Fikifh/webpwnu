<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterFile extends Model
{
    protected $table = 'master_files';
    protected $fillable = ['name', 'description', 'file', 'extension', 'is_show',];
}
