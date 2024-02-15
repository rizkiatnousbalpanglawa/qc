<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REKAPAN DATA QUICK COUNT BERDASARKAN TPS</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
    <h3 class="text-center">
        REKAPAN DATA QUICK COUNT BERDASARKAN TPS
    </h3>
    <table style="width: 100%; font-size: 14px">
        <thead>
            <tr>
                <td style="width: 50%"><strong> {{ $kecamatan->regency->name }}</strong> </td>
            </tr>
            <tr>
                <td>KECAMATAN <strong>{{ $kecamatan->name }}</strong></td>

            </tr>
        </thead>
    </table>
    <table class="table" style="width: 100%; font-size: 12px">
        <thead>
            <tr>
                <th class="text-center">Kecamatan</th>
                <th class="text-center">Kelurahan</th>
                <th class="text-center">TPS</th>
                <th class="text-center">DPR RI</th>
                <th class="text-center">DPRD PROV</th>
                <th class="text-center">LAMPIRAN RI</th>
                <th class="text-center">LAMPIRAN PROV</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tps as $item)

            <tr>
                <td class="text-center align-middle">{{ $item->district->name }}</td>
                <td class="text-center align-middle">{{ $item->village->name }}</td>
                <td class="text-center align-middle">{{ $item->nomor_tps }}</td>
                <td class="text-center align-middle">
                    @forelse ($item->lampiran->where('status',1) as $items)
                    <div style="color: green">y</div>
                    @empty
                    <div style="color: red">--</div>
                    @endforelse

                </td>
                <td class="text-center align-middle">
                    @forelse ($item->lampiran->where('status',2) as $items)
                    <div style="color: green">y</div>
                    @empty
                    <div style="color: red">--</div>
                    @endforelse

                </td>
                <td class="text-center align-middle">
                    @forelse ($item->lampiran->where('status',1) as $items)
                    @if ($item->lampiran->lampiran_c1)
                    <div style="color: green">C1 Ada</div>
                    @elseif ($item->lampiran->lampiran_plano)
                    <div style="color: green">PLANO Ada</div>
                    @else
                    <div style="color: green">LOKASI Ada</div>
                    @endif
                    @empty
                    <div style="color: red">--</div>
                    @endforelse
                </td>
                <td class="text-center align-middle">
                    @forelse ($item->lampiran->where('status',2) as $items)
                    @if ($item->lampiran->lampiran_c1)
                    <div style="color: green">C1 Ada</div>
                    @elseif ($item->lampiran->lampiran_plano)
                    <div style="color: green">PLANO Ada</div>
                    @else
                    <div style="color: green">LOKASI Ada</div>
                    @endif
                    @empty
                    <div style="color: red">--</div>
                    @endforelse
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>



</body>

</html>