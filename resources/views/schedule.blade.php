@extends('layouts.app')

@section('title', 'Jadwal Arena | LARAFELL')

@section('styles')
<style>
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .glass-panel {
        background: rgba(37, 37, 45, 0.6);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
</style>
@endsection

@section('content')
@php
    $selectedDate = request('date', date('Y-m-d'));
    $startDate = \Carbon\Carbon::parse($selectedDate);
    
    // Generate 7 days starting from today for the selector
    $dates = [];
    for ($i = 0; $i < 7; $i++) {
        $dates[] = \Carbon\Carbon::today()->addDays($i);
    }

    $courts = \App\Models\Court::all();
    $timeSlots = [
        '08:00', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '22:00'
    ];
@endphp

<main class="pt-32 pb-20 px-4 md:px-8 max-w-7xl mx-auto">
    <!-- Header Section -->
    <header class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <span class="text-primary font-headline font-bold tracking-[0.2em] uppercase text-sm mb-2 block">Match
                Day Dashboard</span>
            <h1 class="text-5xl md:text-7xl font-headline font-black tracking-tighter uppercase leading-none">
                WEEKLY <span class="text-primary italic">SCHEDULE</span>
            </h1>
        </div>
        <div class="flex flex-wrap gap-4 items-center glass-panel p-4 rounded-xl border border-outline-variant/15">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full bg-primary shadow-[0_0_10px_#a4ffb9]"></div>
                <span class="text-xs font-headline font-bold uppercase tracking-wider">Available</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full bg-tertiary shadow-[0_0_10px_#ff6c90]"></div>
                <span class="text-xs font-headline font-bold uppercase tracking-wider">Booked</span>
            </div>
        </div>
    </header>
    <!-- Date Selector -->
    <div class="mb-8 flex items-center justify-start overflow-x-auto hide-scrollbar gap-4 py-2">
        @foreach($dates as $date)
        @php $isToday = $date->format('Y-m-d') === $selectedDate; @endphp
        <a href="?date={{ $date->format('Y-m-d') }}"
            class="flex flex-col items-center min-w-[80px] p-4 rounded-xl {{ $isToday ? 'bg-surface-container-highest border-l-4 border-primary text-primary' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-variant' }} transition-all">
            <span class="text-xs font-headline font-bold uppercase tracking-widest {{ $isToday ? 'opacity-100' : 'opacity-60' }}">{{ $date->format('D') }}</span>
            <span class="text-2xl font-headline font-black italic">{{ $date->format('d') }}</span>
        </a>
        @endforeach
    </div>
    <!-- Schedule Grid -->
    <div
        class="relative overflow-x-auto hide-scrollbar rounded-2xl bg-surface-container-low p-1 ring-1 ring-outline-variant/10">
        <div class="min-w-[1200px]">
            <!-- Time Markers Header -->
            <div class="flex ml-[200px] border-b border-outline-variant/10">
                @foreach($timeSlots as $slot)
                <div
                    class="flex-1 py-4 text-center text-xs font-headline font-bold uppercase tracking-widest text-on-surface-variant">
                    {{ $slot }}</div>
                @endforeach
                <div class="flex-1 py-4 text-center text-xs font-headline font-bold uppercase tracking-widest text-on-surface-variant">
                    00:00</div>
            </div>
            <!-- Court Rows -->
            @foreach($courts as $index => $court)
            <div class="flex group {{ $index > 0 ? 'border-t border-outline-variant/5' : '' }}">
                <div
                    class="w-[200px] p-6 flex items-center bg-surface-container-high border-r border-outline-variant/10 sticky left-0 z-10">
                    <div>
                        <h3 class="font-headline font-black text-xl italic uppercase leading-none">{{ $court->name }}</h3>
                        <span class="text-[10px] font-bold text-primary tracking-widest uppercase">{{ $court->type }}</span>
                    </div>
                </div>
                <div class="flex-1 flex p-2 gap-2">
                    @foreach($timeSlots as $slotIndex => $startTime)
                        @php
                            $endTime = ($slotIndex + 1 < count($timeSlots)) ? $timeSlots[$slotIndex + 1] : '00:00';
                            $booking = \App\Models\Booking::where('court_id', $court->id)
                                ->where('date', $selectedDate)
                                ->where('status', 'confirmed')
                                ->where(function($query) use ($startTime) {
                                    $query->where('start_time', '<=', $startTime)
                                          ->where('end_time', '>', $startTime);
                                })
                                ->first();
                        @endphp

                        @if($booking)
                        <div class="flex-1 h-24 bg-tertiary-container/20 rounded-lg border border-tertiary/30 flex flex-col items-center justify-center p-2 text-center overflow-hidden">
                            <span class="text-[10px] font-bold uppercase tracking-tighter text-tertiary mb-1">{{ $startTime }} - {{ $endTime }}</span>
                            <span class="text-xs font-headline font-black text-on-surface uppercase truncate w-full">{{ $booking->customer_name }}</span>
                            <div class="flex items-center gap-1 mt-1">
                                <span class="material-symbols-outlined text-[10px]">lock</span>
                                <span class="text-[8px] font-bold opacity-60 uppercase">Booked</span>
                            </div>
                        </div>
                        @else
                        <div class="flex-1 h-24 glass-panel rounded-lg border border-primary/20 flex flex-col items-center justify-center group/slot cursor-pointer hover:bg-primary/10 transition-all">
                            <span class="text-[10px] font-bold uppercase tracking-tighter text-primary/40">{{ $startTime }} - {{ $endTime }}</span>
                            <a href="{{ route('booking.index') }}?court={{ $court->id }}&date={{ $selectedDate }}&time={{ $startTime }}"
                                class="mt-2 opacity-0 group-hover/slot:opacity-100 bg-primary text-on-primary text-[10px] font-black px-3 py-1 rounded-full transition-all uppercase">Book</a>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Call to Action Bento Section -->
    <section class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 relative overflow-hidden rounded-3xl group">
            <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent z-10">
            </div>
            <img alt="Futsal court under floodlights"
                class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700"
                src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=2000&auto=format&fit=crop" />
            <div class="absolute bottom-6 left-6 z-20">
                <h3 class="text-3xl font-headline font-black uppercase italic leading-none mb-2">Ready to dominate?
                </h3>
                <p class="text-on-surface-variant font-body text-sm max-w-md">Join the most premium arena in the
                    city. Professional grade courts and locker rooms available now.</p>
            </div>
        </div>
        <a href="{{ route('booking.index') }}"
            class="bg-primary p-8 rounded-3xl flex flex-col justify-between group cursor-pointer hover:shadow-[0_0_30px_rgba(164,255,185,0.3)] transition-all">
            <span class="material-symbols-outlined text-on-primary text-5xl mb-4">confirmation_number</span>
            <div>
                <h4 class="text-on-primary font-headline font-black text-2xl uppercase italic leading-tight mb-2">
                    QUICK BOOKING</h4>
                <p class="text-on-primary/70 text-sm font-bold uppercase tracking-widest">Instant confirmation via
                    WhatsApp or App.</p>
            </div>
            <div
                class="mt-4 flex items-center gap-2 text-on-primary font-black uppercase text-sm group-hover:gap-4 transition-all">
                START NOW <span class="material-symbols-outlined">arrow_forward</span>
            </div>
        </a>
    </section>
</main>
@endsection
