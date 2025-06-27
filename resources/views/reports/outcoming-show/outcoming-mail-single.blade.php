{{-- prints/outcoming-mail-single.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keputusan</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            line-height: 1.6;
            text-align: justify;
            margin: 50px;
        }
        .header, .footer {
            text-align: center;
        }
        .signature {
            margin-top: 60px;
            display: flex;
            justify-content: center;
            gap: 150px;
        }
        table {
            margin-left: 0;
            margin-bottom: 1em;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2 style="margin-bottom: 0;">The Alliance Bible Church Timor Leste</h2>
        <p style="margin-top: 5px;">Dili, Timor Leste</p>
    </div>

    <br><br>

    <p>No: {{ $outcomingMail->letter_number }}</p>
    <p>Perihal: {{ $outcomingMail->subject }}</p>

    <p style="margin-top: 20px; font-size: 12pt; line-height: 1.5;">
        Majelis The Alliance Bible Church Timor Leste menyatakan bahwa:
    </p>

    <table>
        <tr><td>Nama</td><td>: {{ $outcomingMail->receiver }}</td></tr>
        <tr><td>Tempat Tanggal Lahir</td><td>: Oelasin, 08.08.2003</td></tr>
        <tr><td>Pekerjaan</td><td>: Mahasiswa STTIK Kupang</td></tr>
        <tr><td>NIM</td><td>: 2231299</td></tr>
        <tr><td>No. Passport</td><td>: X5178138</td></tr>
        <tr><td>Warga Negara</td><td>: Indonesia</td></tr>
    </table>

    <p>
        Akan melaksanakan Praktek Pengalaman Lapangan (PPL) di The Alliance Bible Church Timor Leste selama 6 bulan.
        Mulai bulan Juli 2025 sampai Januari 2026. Majelis TABC-TL menjamin & menanggung biaya hidup Mahasiswa Praktek selama di Timor Leste.
        Demikian surat ini dibuat untuk pengurusan visa yang bersangkutan.
    </p>

    <p style="text-align: justify;">Terima kasih</p>

    <p style="text-align: center;">Dili, 22 Juni 2025</p>

    <div class="signature">
        <div>
            <p>Ketua Majelis</p>
            <br><br>
            <p>(Givson D. Rumlaklak)</p>
        </div>

        <div>
            <p>Sekretaris</p>
            <br><br>
            <p>(Yovanka M. H. Loppies)</p>
        </div>
    </div>

</body>
</html>
