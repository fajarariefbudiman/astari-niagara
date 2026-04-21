<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    protected $tanggal_awal;

    protected $tanggal_akhir;

    public function __construct($tanggal_awal, $tanggal_akhir)
    {
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function collection()
    {
        return Pengaduan::whereBetween('tanggal_laporan', [$this->tanggal_awal, $this->tanggal_akhir])
            ->select('id', 'nama_pelapor', 'nama_mesin', 'status', 'tanggal_laporan', 'tanggal_perbaikan', 'keterangan', 'hasil_perbaikan')
            ->get()
            ->map(function ($data, $index) {
                $durasi = $data->tanggal_perbaikan
                    ? Carbon::parse($data->tanggal_laporan)->diffInDays(Carbon::parse($data->tanggal_perbaikan)).' hari'
                    : '-';

                return [
                    'No Pengaduan' => 'NP'.str_pad($data->id, 4, '0', STR_PAD_LEFT),
                    'Nama Pelapor' => $data->nama_pelapor,
                    'Mesin' => $data->nama_mesin,
                    'Keterangan' => $data->keterangan ?? '-',
                    'Catatan Petugas' => $data->hasil_perbaikan ?? '-',
                    'Status' => ucfirst($data->status),
                    'Tanggal Laporan' => $data->tanggal_laporan,
                    'Tanggal Perbaikan' => $data->tanggal_perbaikan ?? '-',
                    'Durasi' => $durasi,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'No Pengaduan',
            'Nama Pelapor',
            'Mesin',
            'Keterangan Masalah',
            'Catatan Petugas',
            'Status',
            'Tanggal Laporan',
            'Tanggal Perbaikan',
            'Durasi (hari)',
        ];
    }
}
