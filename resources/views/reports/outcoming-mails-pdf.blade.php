<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Relatoriu Karta Sai</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #eee; text-align: center; font-weight: bold; }
    </style>
</head>
<body>
    @php
        $bulan = [
            1 => 'Janeiru',
            2 => 'Fevereiru',
            3 => 'Marsu',
            4 => 'Abril',
            5 => 'Maiu',
            6 => 'Junhu',
            7 => 'Jullu',
            8 => 'Agustu',
            9 => 'Setembru',
            10 => 'Outubru',
            11 => 'Novembru',
            12 => 'Desembru',
        ];
    @endphp

    <h2 style="text-align: center;">Relatoriu Mensal Karta Sai</h2>
    <p><strong>Fulan:</strong> {{ $bulan[(int) $month] ?? 'N/A' }} {{ $year ?? '' }}</p>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Karta</th>
                <th>Data Simu</th>
                <th>Mandador</th>
                <th>Simudor</th>
                <th>Asuntu</th>
                <th>Status</th>
                <th>Razaun Rejeita</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mails as $index => $mail)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td>{{ $mail->letter_number }}</td>
                    <td>{{ \Carbon\Carbon::parse($mail->sent_date)->format('d-m-Y') }}</td>
                    <td>{{ $mail->recipient }}</td>
                    <td>{{ $mail->responsible_person }}</td>
                    <td>{{ $mail->subject }}</td>
                    <td style="text-transform: capitalize;">{{ $mail->status }}</td>
                    <td>{{ $mail->rejection_note ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center;">La iha dadus</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
