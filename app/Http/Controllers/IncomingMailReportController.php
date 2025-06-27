<?php

namespace App\Http\Controllers;

use App\Models\IncomingMail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class IncomingMailReportController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->query('month'); // bisa null
        $year = $request->query('year');   // bisa null

        $query = IncomingMail::where('status', 'approved');

        if ($month) {
            $query->whereMonth('received_date', $month);
        }
        if ($year) {
            $query->whereYear('received_date', $year);
        }

        $mails = $query->orderBy('received_date', 'desc')
                    ->paginate(20)
                    ->withQueryString();

        return view('reports.incoming-mails', compact('mails', 'month', 'year'));
    }

    public function pdf(Request $request)
    {
        $month = $request->query('month'); // bisa null
        $year = $request->query('year');   // bisa null

        $query = IncomingMail::where('status', 'approved');

        if ($month) {
            $query->whereMonth('received_date', $month);
        }
        if ($year) {
            $query->whereYear('received_date', $year);
        }

        $mails = $query->orderBy('received_date', 'desc')
                    ->take(15)
                    ->get();

        $pdf = Pdf::loadView('reports.incoming-mails-pdf', compact('mails', 'month', 'year'));

        return $pdf->stream("karta-karta-tama-{$year}-{$month}.pdf");
    }
}
