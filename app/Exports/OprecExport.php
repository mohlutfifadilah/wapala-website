<?php

namespace App\Exports;

use App\Models\Oprec;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OprecExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        // Mengambil data pegawai dengan kolom 'nama_lengkap' dan 'jabatan'
        $data = Oprec::select('nama', 'jenis_kelamin', 'tempatTglLahir', 'nim', 'prodi', 'agama', 'nohp', 'alamat_rumah', 'alamat_domisili', 'nama_orangtua', 'nohp_orangtua', 'motivasi', 'pengalaman_organisasi', 'golongan_darah', 'riwayat_penyakit')->get();

        // Menambahkan kolom 'No' sebagai nomor urut
        $data = $data->map(function($item, $index) {
            return [
                'No' => $index + 1,  // Nomor urut
                'nama' => $item->nama,
                'jenis_kelamin' => $item->jenis_kelamin,
                'tempatTglLahir' => $item->tempatTglLahir,
                'nim' => $item->nim,
                'prodi' => $item->prodi,
                'agama' => $item->agama,
                'nohp' => $item->nohp,
                'alamat_rumah' => $item->alamat_rumah,
                'alamat_domisili' => $item->alamat_domisili,
                'nama_orangtua' => $item->nama_orangtua,
                'nohp_orangtua' => $item->nohp_orangtua,
                'motivasi' => $item->motivasi,
                'pengalaman_organisasi' => $item->pengalaman_organisasi,
                'golongan_darah' => $item->golongan_darah,
                'riwayat_penyakit' => $item->riwayat_penyakit,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        // Menambahkan heading untuk kolom 'No'
        return [
            'No',  // Kolom pertama untuk nomor urut
            'Nama Lengkap',
            'Jenis Kelamin',
            'Tempat Tanggal Lahir',
            'NIM',
            'Program Studi',
            'Agama',
            'No Handphone',
            'Alamat Rumah',
            'Alamat Domisili',
            'Nama Orang Tua',
            'No Handphone Orang Tua',
            'Motivasi',
            'Pengalaman Organisasi',
            'Golongan Darah',
            'Riwayat Penyakit',
        ];
    }
}
