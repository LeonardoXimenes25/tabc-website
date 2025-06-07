<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Print Financial Report - {{ $report->month }} {{ $report->year }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2cm;
            color: #333;
        }
        h1, h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 0.75rem;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .summary {
            margin-top: 2rem;
            font-size: 1.1rem;
        }
        .footer {
            margin-top: 3rem;
            text-align: center;
            font-size: 0.9rem;
            color: #666;
        }
        @media print {
            body {
                margin: 1cm;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h1>Financial Report</h1>
    <h2>{{ $report->month }} {{ $report->year }}</h2>

    <table>
        <tr>
            <th>Total Income</th>
            <td>${{ number_format($report->total_income, 2) }}</td>
        </tr>
        <tr>
            <th>Total Expense</th>
            <td>${{ number_format($report->total_expense, 2) }}</td>
        </tr>
        <tr>
            <th>Final Balance</th>
            <td>${{ number_format($report->final_balance, 2) }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($report->status) }}</td>
        </tr>
        <tr>
            <th>Approved By</th>
            <td>{{ $report->approver ? $report->approver->name : '-' }}</td>
        </tr>
        <tr>
            <th>Approved At</th>
            <td>{{ $report->approved_at ? $report->approved_at->format('d M Y H:i') : '-' }}</td>
        </tr>
    </table>

    <div class="footer no-print">
        <button onclick="window.print()">Print This Report</button>
    </div>
</body>
</html>
