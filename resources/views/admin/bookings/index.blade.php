@extends('layouts.admin')

@section('title', 'Manajemen Booking - Admin')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h2 class="text-4xl font-headline font-black text-on-surface tracking-tight uppercase italic">Booking Management</h2>
        <p class="text-on-surface-variant font-label text-sm uppercase tracking-[0.2em] mt-1">Review and manage arena reservations</p>
    </div>
</div>

<div class="glass-card rounded-3xl overflow-hidden border border-white/5">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-surface-container-low/50 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">
                <tr>
                    <th class="px-6 py-4">Tgl Booking</th>
                    <th class="px-6 py-4">Pelanggan</th>
                    <th class="px-6 py-4">Lapangan</th>
                    <th class="px-6 py-4">Waktu</th>
                    <th class="px-6 py-4">Total</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($bookings as $booking)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="px-6 py-4 text-sm text-on-surface-variant">{{ $booking->date }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary text-xs font-bold">
                                {{ substr($booking->customer_name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-headline font-bold text-on-surface uppercase text-sm">{{ $booking->customer_name }}</p>
                                <p class="text-[10px] text-on-surface-variant">{{ $booking->customer_phone }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-on-surface-variant font-bold">{{ $booking->court->name }}</td>
                    <td class="px-6 py-4 text-sm text-on-surface-variant">{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                    <td class="px-6 py-4 text-sm font-bold text-primary">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase 
                            @if($booking->status == 'confirmed') bg-primary/10 text-primary 
                            @elseif($booking->status == 'cancelled') bg-error/10 text-error
                            @else bg-surface-container-high text-on-surface-variant @endif">
                            @if($booking->status == 'confirmed')<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>@endif
                            @if($booking->status == 'cancelled')<span class="w-1.5 h-1.5 rounded-full bg-error"></span>@endif
                            {{ $booking->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            @if($booking->status == 'pending')
                            <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="p-2 hover:text-primary transition-colors" title="Confirm Booking">
                                    <span class="material-symbols-outlined text-sm">check_circle</span>
                                </button>
                            </form>
                            @endif
                            
                            @if($booking->status != 'cancelled')
                            <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="p-2 hover:text-error transition-colors" title="Cancel Booking">
                                    <span class="material-symbols-outlined text-sm">cancel</span>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
