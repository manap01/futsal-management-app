@extends('layouts.app')

@section('title', 'LARAFELL ARENA PRO | Book Your Game')

@section('content')
<!-- Hero Section -->
<section class="relative h-[921px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover opacity-40 grayscale-[0.5]"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCj0cjxqi0YByLvsijxWPY77yAKkB8WUNbDw1heEafwtliFpofRw-ysVWsR4TyUCdGqbZHV9BdWm4OVubnIaI16ebxMf4r_ukyv9Y8qH_Wj0PqqfMmI8CNe7hcnQdPEyCmWkmqCbNo6FfUU0d1YHjnPGhNPMFQiGCClP4ayVURz-I3AqmQWrDZisTJ96GUlLI8VlQLMEfa1z_8A9NtZXKDiYD_fwVl4VLYRo9c80sApRgqqfJysCI7wq1gafdFUAb0A2UHQJhVrqkly" />
        <div class="absolute inset-0 bg-gradient-to-b from-background via-transparent to-background"></div>
    </div>
    <div class="relative z-10 text-center px-6 max-w-5xl mx-auto">
        <span class="font-headline font-bold text-primary tracking-[0.4em] uppercase mb-4 block">Premium Experience</span>
        <h1 class="font-headline text-6xl md:text-8xl font-black italic tracking-tighter text-on-surface mb-6 leading-tight uppercase">
            BOOK YOUR GAME, <br />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-primary-container">OWN THE FIELD</span>
        </h1>
        <p class="text-xl text-on-surface-variant max-w-2xl mx-auto mb-10 font-medium">
            Experience elite-level futsal on our professional-grade synthetic surfaces with real-time digital scheduling in LARAGON.
        </p>
        <div class="flex flex-col md:flex-row gap-4 justify-center">
            <a href="{{ route('booking.index') }}"
                class="bg-primary text-on-primary px-10 py-5 rounded-full font-headline font-extrabold text-lg uppercase tracking-wider hover:bg-primary-fixed transition-all transform hover:scale-105 neon-glow text-center">
                START BOOKING
            </a>
            <a href="{{ url('/lapangan') }}"
                class="bg-surface-variant/40 border-2 border-primary/20 backdrop-blur-md text-on-surface px-10 py-5 rounded-full font-headline font-extrabold text-lg uppercase tracking-wider hover:bg-surface-variant transition-all text-center">
                VIEW COURTS
            </a>
        </div>
    </div>
    <!-- Floating Ball Element (Decorative) -->
    <div class="absolute bottom-10 right-10 opacity-20 hidden lg:block">
        <span class="material-symbols-outlined text-[20rem] text-primary">sports_soccer</span>
    </div>
</section>

<!-- Status Board -->
<section class="px-8 -mt-24 relative z-20 max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach(\App\Models\Court::take(3)->get() as $court)
        <div class="bg-surface-container-high/90 backdrop-blur-xl rounded-xl p-8 arena-card-overlay border border-outline-variant/10 shadow-2xl">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h3 class="font-headline text-2xl font-bold uppercase tracking-tight">{{ $court->name }}</h3>
                    <p class="text-sm text-on-surface-variant font-label uppercase tracking-widest mt-1">{{ $court->type }}</p>
                </div>
                <div class="flex items-center gap-2 bg-primary/10 text-primary px-3 py-1 rounded-full">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-pulse absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                    </span>
                    <span class="text-[10px] font-bold uppercase tracking-widest">Available</span>
                </div>
            </div>
            <div class="space-y-4 mb-8">
                <div class="flex justify-between items-center text-sm">
                    <span class="text-on-surface-variant">Rate/Hour</span>
                    <span class="text-secondary font-bold font-headline text-lg">Rp {{ number_format($court->price_per_hour, 0, ',', '.') }}</span>
                </div>
            </div>
            <a href="{{ route('booking.index', ['court' => $court->id]) }}"
                class="block text-center w-full py-4 bg-primary/10 border border-primary/30 text-primary font-headline font-bold uppercase tracking-widest rounded-lg hover:bg-primary hover:text-on-primary transition-all">
                BOOK THIS COURT
            </a>
        </div>
        @endforeach
    </div>
</section>

<!-- Live Activity -->
<section class="py-24 px-8 max-w-7xl mx-auto">
    <div class="flex items-end justify-between mb-12">
        <div class="max-w-md">
            <h2 class="font-headline text-4xl font-black uppercase tracking-tighter italic mb-2">NOW PLAYING</h2>
            <p class="text-on-surface-variant uppercase tracking-widest text-xs font-bold">Real-time stadium match status</p>
        </div>
        <div class="h-[1px] flex-grow bg-outline-variant/20 mx-10 mb-2"></div>
        <div class="flex items-center gap-4">
            <div class="text-right">
                <p class="text-xs text-on-surface-variant uppercase tracking-widest">Arena Time</p>
                <p class="font-headline font-bold text-xl">{{ date('H:i') }} PM</p>
            </div>
        </div>
    </div>
    <div class="space-y-4">
        @foreach(\App\Models\Booking::where('status', 'confirmed')->where('date', date('Y-m-d'))->latest()->take(2)->get() as $booking)
        <div class="bg-surface-container-low p-6 rounded-xl flex items-center justify-between border-l-4 border-tertiary">
            <div class="flex items-center gap-8 w-1/3">
                <span class="font-headline font-bold text-outline-variant">CRT {{ $loop->iteration }}</span>
                <div class="text-lg font-bold uppercase">{{ $booking->customer_name }}</div>
            </div>
            <div class="flex-grow px-12">
                <div class="relative h-1 bg-surface-container-highest rounded-full overflow-hidden">
                    <div class="absolute top-0 left-0 h-full bg-tertiary w-3/4"></div>
                </div>
                <div class="flex justify-between mt-2 text-[10px] uppercase font-bold tracking-widest text-on-surface-variant">
                    <span>{{ $booking->start_time }}</span>
                    <span>{{ $booking->end_time }}</span>
                </div>
            </div>
            <div class="flex items-center gap-8 w-1/3 justify-end text-right">
                <div class="text-lg font-bold">{{ $booking->court->name }}</div>
                <span class="material-symbols-outlined text-tertiary">stadium</span>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Features -->
<section class="bg-surface-container-low py-24">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-12 text-center">
            <div class="group cursor-default">
                <div class="w-16 h-16 bg-surface-container-highest rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-primary/20 transition-all duration-300">
                    <span class="material-symbols-outlined text-3xl text-primary">grass</span>
                </div>
                <h4 class="font-headline font-bold text-sm uppercase tracking-widest">Rumput Sintetis</h4>
            </div>
            <div class="group cursor-default">
                <div class="w-16 h-16 bg-surface-container-highest rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-primary/20 transition-all duration-300">
                    <span class="material-symbols-outlined text-3xl text-primary">light_mode</span>
                </div>
                <h4 class="font-headline font-bold text-sm uppercase tracking-widest">LED Lighting</h4>
            </div>
            <div class="group cursor-default">
                <div class="w-16 h-16 bg-surface-container-highest rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-primary/20 transition-all duration-300">
                    <span class="material-symbols-outlined text-3xl text-primary">scoreboard</span>
                </div>
                <h4 class="font-headline font-bold text-sm uppercase tracking-widest">Scoreboard</h4>
            </div>
            <div class="group cursor-default">
                <div class="w-16 h-16 bg-surface-container-highest rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-primary/20 transition-all duration-300">
                    <span class="material-symbols-outlined text-3xl text-primary">shower</span>
                </div>
                <h4 class="font-headline font-bold text-sm uppercase tracking-widest">Shower Room</h4>
            </div>
            <div class="group cursor-default">
                <div class="w-16 h-16 bg-surface-container-highest rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-primary/20 transition-all duration-300">
                    <span class="material-symbols-outlined text-3xl text-primary">local_parking</span>
                </div>
                <h4 class="font-headline font-bold text-sm uppercase tracking-widest">Large Parking</h4>
            </div>
        </div>
    </div>
</section>
@endsection
