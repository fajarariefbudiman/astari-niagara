<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    protected $tanggal_awal, $tanggal_akhir;

    public function __construct($tanggal_awal, $tanggal_akhir)
    {
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function collection()
    {
        return Pengaduan::whereBetween('tanggal_laporan', [$this->tanggal_awal, $this->tanggal_akhir])
            ->select('id', 'nama_pelapor', 'nama_mesin', 'status', 'tanggal_laporan')
            ->get()
            ->map(function ($data, $index) {
                return [
                    'No' => $index + 1,
                    'Kode' => 'NP' . str_pad($data->id, 4, '0', STR_PAD_LEFT),
                    'Nama Pelapor' => $data->nama_pelapor,
                    'Mesin' => $data->nama_mesin,
                    'Status' => ucfirst($data->status),
                    'Tanggal' => $data->tanggal_laporan,
                ];
            });
    }

    public function headings(): array
    {
        return ['No', 'Kode', 'Nama Pelapor', 'Mesin', 'Status', 'Tanggal'];
    }
}
