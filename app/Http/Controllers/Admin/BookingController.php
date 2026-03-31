<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'all');
        $query = Booking::with('court')->latest();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $bookings = $query->get();
        return view('admin.bookings.index', compact('bookings', 'status'));
    }

    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'confirmed';
        $booking->save();

        return redirect()->back()->with('success', 'Booking berhasil dikonfirmasi!');
    }

    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'cancelled';
        $booking->save();

        return redirect()->back()->with('success', 'Booking berhasil dibatalkan!');
    }
}
