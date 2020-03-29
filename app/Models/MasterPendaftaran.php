<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPendaftaran extends Model
{
    protected $table = 'master_pendaftaran';
    protected $fillable = ['name', 'is_open', 'end_date'];
}
