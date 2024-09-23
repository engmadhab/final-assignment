<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class InvoiceController extends Controller
{
    public function invoice($reservation_id)
    {
        $reservation = Rental::find($reservation_id);

        $pdf = PDF::loadView('invoice', compact('reservation'));
        $filename = 'Reservation-' . $reservation_id.'-invoice'.'.pdf';

        return $pdf->download($filename);
    }
}
