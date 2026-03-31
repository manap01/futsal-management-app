<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function exportBookingsCsv()
    {
        $bookings = Booking::with('court')->latest()->get();

        $response = new StreamedResponse(function () use ($bookings) {
            $handle = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($handle, [
                'ID',
                'Customer Name',
                'Phone',
                'Court',
                'Date',
                'Start Time',
                'End Time',
                'Total Price',
                'Status',
                'Created At'
            ]);

            foreach ($bookings as $booking) {
                // Format phone number to keep leading zero in Excel
                $phone = $booking->customer_phone;
                if ($phone && (str_starts_with($phone, '0') || str_starts_with($phone, '+'))) {
                    $phone = '="' . $phone . '"';
                }

                fputcsv($handle, [
                    $booking->id,
                    $booking->customer_name,
                    $phone,
                    $booking->court ? $booking->court->name : 'N/A',
                    date('d/m/Y', strtotime($booking->date)),
                    $booking->start_time,
                    $booking->end_time,
                    (float)$booking->total_price,
                    strtoupper($booking->status),
                    $booking->created_at->format('d/m/Y H:i'),
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="bookings_export_' . date('Y-m-d_H-i-s') . '.csv"');

        return $response;
    }
}
