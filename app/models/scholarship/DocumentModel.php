<?php

namespace App\models\scholarship;

use Illuminate\Database\Eloquent\Model;

class DocumentModel extends Model
{
    protected $fillable = [
        'nik',
        'education',
        'jumlah_hafalan',
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
    ];
    protected $table = 'documents';
}
