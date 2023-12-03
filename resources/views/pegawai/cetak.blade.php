<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cetak Laporan</title>
    <style>
        /* table.static{
            position: relative;
            border: 1px solid #543535
        } */
        body {
            font-family: aria;
            background-color: #cccccc
        }

        .rangkasurat {
            width: 780px;
            margin: 0 auto;
            background-color: #ffffff;
            height: 900px;
            padding: 30px
        }

        table {
            border-bottom: 3px solid #000000;
            padding: 5px
        }

        .tengah {
            text-align: center;
            line-height: 8px
        }
    </style>
</head>

<body>
    <div class="form-group rangkasurat">
        <table width="100%">
            <tr>
                <td><img src="/loginAsset/img/bri-logo.png" width="110px" alt="Logo Kop"></td>
                <td class="tengah">
                    <h2>PT. BANK RAKYAT INDONESIA (PERSERO)</h2>
                    <h2>BRI KANTOR CABANG TONDANO</h2>
                    <h3>Jl. Pinaesaan SK No. 17/31, Tondano Utara</h3>
                    <h3>Telepon : Fax : </h3>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <p align="center">Laporan ATM/CRM BRI BO Tondano</p>
        <br>
        <p>Laporan Pegawai</p>
        <table width="100%" rules="all" border="1px">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>PN</th>
                <th>Uker</th>
                <th>TID</th>
                <th>Jabatan</th>
                <th>Tanggal</th>
                {{-- <th>Kelngkapan</th>
                <th>Keamanan</th> --}}
            </tr>
            @foreach ($cetakPegawai as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_pegawai }}</td>
                    <td>{{ $item->pn }}</td>
                    <td>{{ $item->uker->uker }}</td>
                    <td>{{ $item->tid->tid }}</td>
                    <td>{{ $item->jabatan->jabatan }}</td>
                    <td>{{ $item->created_at }}</td>
                    {{-- <td>{{$item->kelengkapan_id}}</td>
                <td>{{$item->keamanan_id}}</td> --}}
                </tr>
            @endforeach
        </table>
        <br>
        <br>
        <p>Laporan Kelengkapan</p>
        <table width="100%" rules="all" border="1px">
            <tr>
                <th>No.</th>
                <th>Sticker</th>
                <th>Ruangan</th>
                <th>Pylon</th>
                <th>AC</th>
                <th>Cat</th>
                <th>Kerangkeng & Cover</th>
                <th>Cover</th>
                <th>Genset</th>
                <th>UPS</th>
                <th>Dilaporkan</th>
                {{-- <th>Kelngkapan</th>
                <th>Keamanan</th> --}}
            </tr>
            @foreach ($cetakKelengkapan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->sticker }}</td>
                    <td>{{ $item->ruangan }}</td>
                    <td>{{ $item->pylon }}</td>
                    <td>{{ $item->ac }}</td>
                    <td>{{ $item->cat }}</td>
                    <td>{{ $item->kerangkengCover }}</td>
                    <td>{{ $item->cover }}</td>
                    <td>{{ $item->genset }}</td>
                    <td>{{ $item->ups }}</td>
                    <td>{{ $item->created_at }}</td>
                    {{-- <td>{{$item->kelengkapan_id}}</td>
                <td>{{$item->keamanan_id}}</td> --}}
                </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
