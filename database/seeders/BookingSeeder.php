<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Court;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing bookings
        Booking::truncate();

        $courts = Court::all();
        if ($courts->isEmpty()) return;

        $names = [
            'Budi Santoso', 'Andi Wijaya', 'Siti Aminah', 'Rizky Pratama', 'Dewi Lestari', 
            'Eko Saputra', 'Fahmi Idris', 'Gita Gutawa', 'Hadi Sucipto', 'Indah Permata',
            'Joko Susilo', 'Kiki Amalia', 'Lutfi Hakim', 'Maya Sari', 'Nando Putra',
            'Oky Setiana', 'Putra Siregar', 'Qory Sandioriva', 'Rina Nose', 'Sule Prikitiw',
            'Ahmad Dhani', 'Baim Wong', 'Chelsea Islan', 'Deddy Corbuzier', 'Ernest Prakasa'
        ];
        
        // Generate 200 bookings spread across the last 30 days and NEXT 7 days
        for ($i = 0; $i < 200; $i++) {
            $court = $courts->random();
            // Spread across last 30 days and next 7 days
            $date = Carbon::now()->addDays(rand(-30, 7));
            $startHour = rand(8, 22);
            $duration = rand(1, 2);
            
            // Random status distribution: 80% confirmed (to make it look busy), 15% pending, 5% cancelled
            $randStatus = rand(1, 20);
            if ($randStatus <= 16) {
                $status = 'confirmed';
            } elseif ($randStatus <= 19) {
                $status = 'pending';
            } else {
                $status = 'cancelled';
            }
            
            Booking::create([
                'user_id' => 1,
                'customer_name' => $names[array_rand($names)],
                'customer_phone' => '08' . rand(11, 19) . rand(10000000, 99999999),
                'court_id' => $court->id,
                'date' => $date->format('Y-m-d'),
                'start_time' => sprintf('%02d:00', $startHour),
                'end_time' => sprintf('%02d:00', $startHour + $duration),
                'total_price' => $court->price_per_hour * $duration,
                'status' => $status,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
