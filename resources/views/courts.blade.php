@extends('layouts.app')

@section('title', 'Menu Lapangan | LARAFELL ARENA PRO')

@section('styles')
<style>
    .glass-card {
        background: rgba(37, 37, 45, 0.6);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(164, 255, 185, 0.1);
    }

    .net-pattern {
        background-image: radial-gradient(circle at 2px 2px, rgba(164, 255, 185, 0.03) 1px, transparent 0);
        background-size: 24px 24px;
    }

    .neon-glow:hover {
        box-shadow: 0 0 20px rgba(0, 253, 135, 0.3);
    }
</style>
@endsection

@section('content')
<!-- Hero Header -->
<section class="relative h-[614px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover opacity-40"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDPC8BUL1d-YA7-ouUKrKEwENkXvSHj6nuvsOTgtKZGQsPOsgMaw7Nrt0clEgU3SV4Dauhpytb3XCDtz-ZKp373jbheZSxGxXnLFb9G-jgh9xeYTkwds9WdmMxehqffUNsw7o95098XBANxIcni1v3VbMgYqt4aNTLC2qdHmgH7I2R8YAFcRQeX6GZ6OzBrkrBNluSF9CZiQM8LoTSfnHSP41OGEb_YzrJdMICug7Gbce7gEew5y1DIDg68a5hksBWKHxRdWHXUcHHQ" />
        <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
    </div>
    <div class="relative z-10 text-center px-6">
        <h1 class="font-headline text-6xl md:text-8xl font-black italic tracking-tighter text-on-surface uppercase leading-none">
            EXPLORE THE <span class="text-primary">ARENAS</span>
        </h1>
        <p class="mt-6 text-lg md:text-xl text-on-surface-variant max-w-2xl mx-auto font-medium">
            Nikmati permukaan lapangan kelas profesional yang dirancang untuk performa elit di LARAGON.
        </p>
    </div>
</section>

<!-- Court List Section -->
<section class="max-w-7xl mx-auto px-8 py-24 relative">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        @foreach($courts as $court)
        <div class="glass-card net-pattern rounded-xl overflow-hidden group">
            <div class="relative h-64 overflow-hidden">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                    src="{{ $court->image }}" />
                <div class="absolute top-4 left-4 bg-primary text-on-primary px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-on-primary animate-pulse"></span>
                    Available
                </div>
            </div>
            <div class="p-8">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="font-headline text-2xl font-black text-on-surface leading-tight">{{ $court->name }}<br /><span
                            class="text-sm font-medium text-primary tracking-widest opacity-80">({{ $court->type }})</span></h3>
                </div>
                <ul class="space-y-3 mb-8">
                    @foreach(explode(',', $court->description) as $feature)
                    <li class="flex items-center gap-3 text-on-surface-variant text-sm">
                        <span class="material-symbols-outlined text-primary text-lg">star</span>
                        {{ trim($feature) }}
                    </li>
                    @endforeach
                </ul>
                <div class="flex items-end justify-between border-t border-outline-variant/20 pt-6">
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold mb-1">Pricing</p>
                        <p class="text-xl font-black text-secondary font-headline italic">Rp {{ number_format($court->price_per_hour, 0, ',', '.') }}<span
                                class="text-xs italic font-normal text-on-surface/50">/JAM</span></p>
                    </div>
                    <a href="{{ route('booking.index', ['court' => $court->id]) }}"
                        class="bg-primary text-on-primary font-headline font-black px-6 py-3 rounded-xl uppercase tracking-tighter text-sm neon-glow transition-all active:scale-95">
                        BOOK NOW
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
