<?php

namespace App\Exports;

use App\models\scholarship\DocumentModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParticipantSchoolarshipExport implements FromCollection, WithHeadings
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
                "nama" => $participant->name,
                "email" => $participant->email,
                "nomor_hp" => $participant->phone,
                "nik" => $participant->nik,
                "jumlah_hafalan" => $participant->jumlah_hafalan,
                "nama_pendidikan" => $participant->school_name,
                "kelas_atau_tingkat" => $participant->school_class,
                "jenis_kelamin" => $participant->gender,
                "umur" => $participant->age,
                "ibu_kandung" => $participant->birth_mother,
                "kota_atau_kabupaten" => $participant->district,
                "tempat_tanggal_lahir" => $participant->birth_place . ', ' . $participant->birth_day,
                "alamat_sesuai_ktp" => $participant->ktp_address,
                "alamat_sekarang" => $participant->address,
            ];
        }
        return collect($data);
    }

    public function headings(): array
    {
        return [
            "ID",
            "Nama",
            "Email",
            "Nomor Hp",
            "NIK",
            "Jumlah Hafalan",
            "Pendidikan Sedang Ditempuh",
            "Tingkat atau Kelas",
            "Jenis Kelamin",
            "Umur",
            "Ibu Kandung",
            "Kota / Kabupaten",
            "Tempat Tanggal Lahir",
            "Alamat Sesuai ktp",
            "Alamat Sekarang",
        ];
    }
}
