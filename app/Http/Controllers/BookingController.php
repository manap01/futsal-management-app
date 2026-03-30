<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $courts = Court::all();
        $selectedCourt = null;
        if ($request->has('court')) {
            $selectedCourt = Court::find($request->court);
        }
        $prefill = [
            'date' => $request->date,
            'time' => $request->time,
        ];
        return view('booking', compact('courts', 'selectedCourt', 'prefill'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'court_id' => 'required|exists:courts,id',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'duration' => 'required|integer|min:1',
            'payment_proof' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $court = Court::find($request->court_id);
        $startTime = $request->start_time;
        $endTime = date('H:i', strtotime($startTime . " + {$request->duration} hours"));
        
        $exists = Booking::where('court_id', $request->court_id)
            ->where('date', $request->date)
            ->where(function($query) use ($startTime, $endTime) {
                $query->where(function($q) use ($startTime, $endTime) {
                    $q->where('start_time', '<', $endTime)
                      ->where('end_time', '>', $startTime);
                });
            })->exists();

        if ($exists) {
            return back()->withErrors(['msg' => 'Jadwal sudah terisi. Silakan pilih waktu lain.']);
        }

        $paymentPath = null;
        if ($request->hasFile('payment_proof')) {
            $paymentPath = $request->file('payment_proof')->store('payments', 'public');
        }

        Booking::create([
            'user_id' => Auth::id(),
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'court_id' => $request->court_id,
            'date' => $request->date,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'total_price' => $court->price_per_hour * $request->duration,
            'payment_proof' => $paymentPath,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Booking berhasil dibuat! Menunggu konfirmasi admin.');
    }
}
