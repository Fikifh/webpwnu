<?php

namespace App\Exports;

use App\models\scholarship\DocumentModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ParticipantSchoolarshipExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $participants = DocumentModel::where('type', 2)->join('users', 'documents.user_id', 'users.id')->get();
        $data = [];
        foreach ($participants as $participant) {
            $data []  = [
                "user_id" => $participant->user_id,
                "name" => $participant->name,
                "email" => $participant->email,
                "nomor_hp" => $participant->phone,
                "nik" => $participant->nik,
                "jumlah_hafalan" => $participant->jumlah_hafalan,
                "nama_pendidikan" => $participant->school_name,
                "kelas_atau_tingkat" => $participant->school_class,
                "jenis_kelamin" => $participant->gender,
                "age" => $participant->age,
                "birth_mother" => $participant->birth_mother,
                "district" => $participant->district,
                "tempat_tanggal_lahir" => $participant->birth_place . ', ' . $participant->birth_day,
                "alamat_sesuai_ktp" => $participant->ktp_address,
                "alamat_sekarang" => $participant->address,
            ];
        }

        return $this->collection($data);
    }
}
