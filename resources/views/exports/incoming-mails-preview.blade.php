<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Preview Surat Masuk</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 40px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 16pt;
        }

        .header p {
            margin: 2px 0;
        }

        .logo {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo img {
            width: 100px;
            height: auto;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        th, td {
            border: 1px solid black;
            padding: 6px 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .mengetahui {
            text-align: center;
            font-weight: bold;
            margin-top: 80px;
            margin-bottom: 10px;
        }

        .ttd {
            margin-top: 40px;
            display: flex;
            justify-content: space-around;
            text-align: center;
        }

        .ttd .col {
            width: 40%;
        }

        .ttd .col p {
            margin: 0;
        }

        .ttd .col .space {
            margin-top: 60px;
        }
    </style>
</head>
<body>

    <div class="logo">
        <img src="{{ asset('images/cop-tabc.png') }}" alt="Logo Gereja">
    </div>

    <div class="header">
        <h1>The Alliance Bible Church Timor Leste</h1>
        <p>Avenida Audian, Dili Timor Leste</p>
        <p>Email: tabctl1990@gmail.com</p>
    </div>

    <h3>Laporan Surat Masuk</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Surat</th>
                <th>Tanggal Diterima</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Lampiran</th>
                <th>Penerima</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $data->letter_number }}</td>
                <td>{{ \Carbon\Carbon::parse($data->received_date)->format('d-m-Y') }}</td>
                <td>{{ $data->sender }}</td>
                <td>{{ $data->subject }}</td>
                <td>{{ $data->attachment }}</td>
                <td>{{ $data->receiver }}</td>
            </tr>
        </tbody>
    </table>

    <div class="mengetahui">
        Mengetahui
    </div>

    <table style="width: 100%; text-align: center; margin-top: 50px; border: none;">
        <tr>
            <td style="width: 50%; text-align: center; border: none;">
                Ketua Majelis<br><br><br><br>
                <span style="display: inline-block; border-top: 1px solid #000; width: 100%;"></span>
            </td>
            <td style="width: 50%; text-align: center; border: none;">
                Sekretaris<br><br><br><br>
                <span style="display: inline-block; border-top: 1px solid #000; width: 100%;"></span>
            </td>
        </tr>
    </table>
    
    
    
    
    


</body>
</html>
