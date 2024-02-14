<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Pemilih</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* background-color: #f0f0f0; */
            /* color: #333; */
            margin: 20px;
        }

        .text-center {
            text-align: center !important;
        }

        .info {
            margin-top: 20px;
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .pengusul {
            margin-top: 20px;
            padding: 15px;
            /* background-color: #fff; */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .pengusul li {
            list-style-type: none;
            margin-bottom: 10px;
        }

        .pengusul strong {
            color: #007bff;
        }

        .page-break {
            page-break-before: always;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid #000;
        }

        .table th,
        .table td {
            padding: 2px;
            text-align: left;
        }
    </style>
</head>

<body>

    <table class="table" style="width: 100%; font-size: 12px">
        <thead>
            <tr>
                <th class="text-center">NO</th>
                <th>NAMA</th>
                <th>KAB / KOTA</th>
                <th>KECAMATAN</th>
                <th>KEL / DESA</th>
                <th>TPS</th>
                <th class="text-center">PILIHAN</th>
                <th class="text-center">RELAWAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pilihan as $item)
            @php
            if ($item->pilihan == 'Y') {
            $warna = '#60b6fb';
            $text = "R";
            } elseif ($item->pilihan == 'E') {
            $warna = '#fcf300';
            $text = "E";
            }elseif ($item->pilihan == 'P') {
            $warna = '#72ce27';
            $text = "P";
            }

            @endphp
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->tpsPemilih->nama }}</td>
                <td>{{ $item->regency->name }}</td>
                <td>{{ $item->district->name }}</td>
                <td>{{ $item->village->name }}</td>
                <td class="text-center">{{ $item->tps->nomor_tps }}</td>
                <td class="text-center" style="background-color: {{ $warna }}">
                    {{ $text }}
                </td>
                <td class="text-center">
                    {{ $item->pengusul->nama }}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>



</body>

</html>