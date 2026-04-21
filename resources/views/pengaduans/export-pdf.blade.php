<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Pengaduan</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 11px;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 4px;
        }

        .subtitle {
            text-align: center;
            font-size: 10px;
            color: #666;
            margin-bottom: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 6px 8px;
            text-align: center;
            vertical-align: top;
        }

        td.text-left {
            text-align: left;
        }

        th {
            background-color: #C0A785;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #FAF5EE;
        }

        .status-menunggu { color: #B7791F; font-weight: bold; }
        .status-diproses  { color: #2B6CB0; font-weight: bold; }
        .status-selesai   { color: #276749; font-weight: bold; }

        .footer {
            margin-top: 20px;
            font-size: 10px;
            color: #888;
            text-align: right;
        }
    </style>
</head>

<body>
    <h2>Laporan Pengaduan Mesin</h2>
    <p class="subtitle">
        Periode: {{ request('tanggal_awal') }} s/d {{ request('tanggal_akhir') }}
    </p>

    <table>
        <thead>
            <tr>
                <th style="width:7%">No Pengaduan</th>
                <th style="width:11%">Nama Pelapor</th>
                <th style="width:9%">Mesin</th>
                <th style="width:8%">Tanggal Laporan</th>
                <th style="width:18%">Keterangan Masalah</th>
                <th style="width:18%">Catatan Petugas</th>
                <th style="width:7%">Status</th>
                <th style="width:9%">Tanggal Perbaikan</th>
                <th style="width:7%">Durasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $i => $data)
                @php
                    $statusClass = match($data->status) {
                        'menunggu' => 'status-menunggu',
                        'diproses' => 'status-diproses',
                        'selesai'  => 'status-selesai',
                        default    => '',
                    };
                    $durasi = $data->tanggal_perbaikan
                        ? \Carbon\Carbon::parse($data->tanggal_laporan)->diffInDays($data->tanggal_perbaikan) . ' hari'
                        : '-';
                @endphp
                <tr>
                    <td>NP{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $data->nama_pelapor }}</td>
                    <td>{{ $data->nama_mesin }}</td>
                    <td>{{ $data->tanggal_laporan }}</td>
                    <td class="text-left">{{ $data->keterangan ?? '-' }}</td>
                    <td class="text-left">{{ $data->hasil_perbaikan ?? '-' }}</td>
                    <td class="{{ $statusClass }}">{{ ucfirst($data->status) }}</td>
                    <td>{{ $data->tanggal_perbaikan ?? '-' }}</td>
                    <td>{{ $durasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="footer">Dicetak pada: {{ now()->format('d-m-Y') }}</p>
</body>

</html>