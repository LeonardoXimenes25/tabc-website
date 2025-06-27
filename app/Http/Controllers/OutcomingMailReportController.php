<?php

namespace App\Http\Controllers;

use App\Models\OutcomingMail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OutcomingMailReportController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->query('month'); 
        $year = $request->query('year');

        $query = OutcomingMail::where('status', 'approved');

        if ($month) {
            $query->whereMonth('sent_date', $month);
        }
        if ($year) {
            $query->whereYear('sent_date', $year);
        }

        $mails = $query->orderBy('sent_date', 'desc')
                    ->paginate(20)
                    ->withQueryString();

        return view('reports.outcoming-mails', compact('mails', 'month', 'year'));
    }

    public function pdf(Request $request)
    {
        $month = $request->query('month');
        $year = $request->query('year');

        $query = OutcomingMail::where('status', 'approved');

        if ($month) {
            $query->whereMonth('sent_date', $month);
        }
        if ($year) {
            $query->whereYear('sent_date', $year);
        }

        $mails = $query->orderBy('sent_date', 'desc')
                    ->take(15)
                    ->get();

        $pdf = Pdf::loadView('reports.outcoming-mails-pdf', compact('mails', 'month', 'year'));

        return $pdf->stream("relatoriu-karta-sai-{$year}-{$month}.pdf");
    }

    public function printSingle(OutcomingMail $outcomingMail)
    {
        if ($outcomingMail->status !== 'approved') {
            abort(403, 'Surat belum aprova.');
        }

        $pdf = Pdf::loadView('reports.outcoming-show.outcoming-mail-single', [
            'outcomingMail' => $outcomingMail,
        ]);

        return $pdf->stream("surat-keluar-{$outcomingMail->id}.pdf");
    }


}
