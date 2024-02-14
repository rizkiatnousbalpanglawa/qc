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

    <h2 class="text-center">
        REKAPITULASI PEMILIH BERDASARKAN <br>
        PENGUSUL
    </h2>

    <div class="text-center">
        <h2> {{ Str::upper($pengusul->first()->nama) }}</h2>
        <p><strong>PAKET = {{ $pilihanPaket }}</strong></p>
        <p><strong>ESR = {{ $pilihanEsr + $pilihanPaket }} ({{ $pilihanEsr }})</strong></p>
        <p><strong>YRK = {{ $pilihanYrk + $pilihanPaket }} ({{ $pilihanYrk }})</strong></p>
    </div>

    <table style="width: 100%">
        <br><br><br><br><br><br><br>
        <tr style="margin: 0 5px">
            <td class="text-center" style="border-top: solid;width:150px">TIM DATA</td>
            <td style="width: 100px"></td>
            <td class="text-center" style="border-top: solid; width:150px">TIM INDUK</td>
        </tr>
        <br><br><br><br><br><br><br>
        <tr style="margin: 0 5px solid">
            <td class="text-center" style="border-top: solid;">TIM LOGISTIK</td>
            <td style=""></td>
            <td class="text-center" style="border-top: solid;">PENGUSUL / TIM LAPANGAN</td>
        </tr>
    </table>

    <!-- Menambahkan pembatas halaman -->
    <div class="page-break"></div>

    <h2 class="text-center">
        {{-- {{ $tps->regency->name }} <br>
        {{ $tps->district->name }} <br>
        {{ $tps->village->name }} <br>
        TPS {{ $tps->nomor_tps }} --}}
    </h2>

    <h2 class="text-center">
        REKAPITULASI PEMILIH BERDASARKAN <br>
        PENGUSUL
    </h2>

    <div class="text-center">
        <h2> {{ Str::upper($pengusul->first()->nama) }}</h2>
        <p><strong>PAKET = {{ $pilihanPaket }}</strong></p>
        <p><strong>ESR = {{ $pilihanEsr + $pilihanPaket }} ({{ $pilihanEsr }})</strong></p>
        <p><strong>YRK = {{ $pilihanYrk + $pilihanPaket }} ({{ $pilihanYrk }})</strong></p>
    </div>

    <table style="width: 100%">
        <br><br><br><br><br>
        <tr style="margin: 0 5px;">
            <td></td>
            <td class="text-center" style="border-top: solid;width:250px">TIM INDUK</td>
            <td></td>
        </tr>
        <br><br><br><br><br><br><br>
        <tr style="margin: 0 5px solid;">
            <td></td>
            <td class="text-center" style="border-top: solid;width:250px">PENGUSUL / TIM LAPANGAN</td>
            <td></td>
        </tr>
    </table>

</body>

</html>