<?php

namespace App\models\scholarship;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DocumentModel extends Model
{
    protected $fillable = [
        'type',
        'nik',
        'kk',
        'education',
        'jumlah_hafalan',
        'user_id',
        'ktp',
        'ijazah',
        'surdes',
        'suror',
        'bukti_hafalan',
        'skck',
        'sur_ket_hafalan',
        'syahadah',
        'cv',
        'foto',
        'school_name',
        'school_class'
    ];
    protected $table = 'documents';

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
