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
                    <th class="px-6 py-4 text-center">Bukti</th>
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
                    <td class="px-6 py-4 text-sm font-bold text-primary text-nowrap">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center">
                        @if($booking->payment_proof)
                        <button onclick="showProof('{{ asset('storage/' . $booking->payment_proof) }}')" 
                                class="p-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-all">
                            <span class="material-symbols-outlined text-sm">image</span>
                        </button>
                        @else
                        <span class="text-[10px] text-on-surface-variant italic">No Proof</span>
                        @endif
                    </td>
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

<!-- Modal for Payment Proof -->
<div id="proofModal" class="fixed inset-0 z-[100] hidden">
    <div class="absolute inset-0 bg-black/90 backdrop-blur-sm" onclick="closeModal()"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-lg p-4">
        <div class="bg-surface-container rounded-3xl overflow-hidden border border-white/10 shadow-2xl">
            <div class="p-4 border-b border-white/5 flex justify-between items-center bg-surface-container-high">
                <h3 class="font-headline font-black uppercase italic tracking-widest text-primary text-xs">Payment Proof</h3>
                <button onclick="closeModal()" class="text-on-surface-variant hover:text-error transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-4">
                <img id="proofImg" src="" alt="Payment Proof" class="w-full h-auto rounded-xl">
            </div>
        </div>
    </div>
</div>

<script>
    function showProof(src) {
        document.getElementById('proofImg').src = src;
        document.getElementById('proofModal').classList.remove('hidden');
    }
    function closeModal() {
        document.getElementById('proofModal').classList.add('hidden');
    }
</script>
@endsection
