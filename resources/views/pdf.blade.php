<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <style>
        @page {
            margin-top: 200px;
        }

        .header {
            position: fixed;
            top: -150px;
        }

        table {
            width: 100%;
        }

        .table thead th {
            text-transform: uppercase;
            text-align: left;
        }

        .table tfoot {
            text-transform: uppercase;
            text-align: right;
        }

        .table tr {
            border-top: 2px solid black;
        }

        .table tr td {
            padding: 8px 0;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .bg-secondary {
            background-color: #f2f2f2;
        }

        footer {
            position: fixed;
            bottom: -25px;
            border-top: 2px solid;
            width: 100%;
            text-align: right;
        }

        .pagenum::before {
            content: counter(page);
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.4/tailwind.min.css">
</head>

<body>
    {{-- kop surat --}}
    <table class="header">
        <td class="text-center border-b-2">
            <h1 class="text-2xl font-bold">PALANG MERAH INDONESIA</h1>
            <h1 class="text-2xl font-bold">UNIT TRANSFUSI DARAH KOTAJAYAPURA</h1>
            <p>Jl. Kesehatan No.l RSUD Jayapura, TIP (0967)536316</p>
        </td>
    </table>

    <main>
        <div class="mb-8 text-center">
            <h1 class="text-xl font-bold">Laporan {{ $title }}</h1>
            <p>Laporan ini dibuat pada {{ now() }}.</p>
        </div>

        <table class="table mb-8">
            <thead>
                @foreach ($cols as $col => $value)
                    <th>{{ $col }}</th>
                @endforeach
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr>
                        @foreach ($cols as $col => $value)
                            <td>{{ data_get($record, $value) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <footer>
        <table>
            <td>
                <img src="upload/images/logo-darahku.png" alt="logo" width="24">
                <span class="font-bold">Darahku</span>
            </td>
            <td width="10%">
                <p>Halaman <span class="pagenum"></span></p>
            </td>
        </table>
    </footer>
</body>

</html>
