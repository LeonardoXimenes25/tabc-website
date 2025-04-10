<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\IncomingMail;

class IncomingMailExportController extends Controller
{
    public function preview($id)
    {
        $record = IncomingMail::findOrFail($id);

        $pdf = Pdf::loadView('exports.incoming-mails-preview', [
            'data' => $record,
        ]);

        return $pdf->stream('preview-surat.pdf'); // Tampilkan sebagai preview di browser
    }
}
