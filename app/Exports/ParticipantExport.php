<?php

namespace App\Exports;

use App\models\scholarship\DocumentModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ParticipantExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $participant = DocumentModel::where('type', 1)->join('users', 'users.id', 'documents.user_id')->first();
    }
}
