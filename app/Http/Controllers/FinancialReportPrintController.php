<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinancialReport;

class FinancialReportPrintController extends Controller
{
       public function print(FinancialReport $report)
    {
        if ($report->status !== 'approved') {
            abort(403, 'Laporan belum disetujui.');
        }

        return view('reports.print', compact('report'));
    }
}
