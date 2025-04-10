<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutcomingMail;
use Barryvdh\DomPDF\Facade\Pdf;

class OutcomingMailExportController extends Controller
{
    public function preview($id)
    {
        $record = OutcomingMail::findOrFail($id);

        $pdf = Pdf::loadView('exports.outcoming-mails-preview', [
            'data' => $record,
        ]);

        return $pdf->stream('preview-surat.pdf'); // Tampilkan sebagai preview di browser
    }
}
