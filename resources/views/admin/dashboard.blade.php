@extends('layouts.admin')

@section('title', 'LARAFELL ARENA PRO - Admin Dashboard')

@section('content')
<!-- Headline -->
<div class="flex justify-between items-end">
    <div>
        <h2 class="text-4xl font-headline font-black text-on-surface tracking-tight uppercase">Garuda Dashboard</h2>
        <p class="text-on-surface-variant font-label text-sm uppercase tracking-[0.2em] mt-1">Live Venue Analytics &amp; Management</p>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('admin.export.csv') }}" class="bg-surface-container-highest hover:bg-surface-bright text-on-surface px-6 py-2 rounded-xl font-bold text-xs uppercase tracking-widest transition-all border border-white/5 flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">download</span>
            Export CSV
        </a>
        <a href="{{ route('admin.bookings.index') }}" class="bg-primary text-on-primary px-6 py-2 rounded-xl font-bold text-xs uppercase tracking-widest hover:shadow-[0_0_20px_rgba(164,255,185,0.4)] transition-all">New Booking</a>
    </div>
</div>

<!-- Top Widget Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Daily Revenue -->
    <div class="glass-card p-6 rounded-2xl relative overflow-hidden group border border-white/5">
        <div class="pitch-pattern absolute inset-0 opacity-10"></div>
        <div class="relative z-10">
            <div class="flex justify-between items-start mb-4">
                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Daily Revenue</span>
                <span class="material-symbols-outlined text-primary">payments</span>
            </div>
            <h3 class="text-2xl font-black font-headline text-on-surface">Rp {{ number_format(\App\Models\Booking::whereDate('date', date('Y-m-d'))->where('status', 'confirmed')->sum('total_price'), 0, ',', '.') }}</h3>
            <div class="mt-4 flex items-center gap-2">
                <span class="text-xs font-bold text-primary flex items-center">+20% <span class="material-symbols-outlined text-sm">trending_up</span></span>
                <span class="text-[10px] text-on-surface-variant uppercase">vs yesterday</span>
            </div>
        </div>
    </div>
    <!-- Active Bookings -->
    <div class="glass-card p-6 rounded-2xl relative overflow-hidden border border-white/5">
        <div class="relative z-10">
            <div class="flex justify-between items-start mb-4">
                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Active Bookings</span>
                <span class="material-symbols-outlined text-secondary">event_available</span>
            </div>
            <h3 class="text-2xl font-black font-headline text-on-surface">{{ \App\Models\Booking::where('status', 'confirmed')->where('date', date('Y-m-d'))->count() }} Slots</h3>
            <div class="mt-4 space-y-1">
                @forelse(\App\Models\Booking::where('status', 'confirmed')->where('date', date('Y-m-d'))->latest()->take(2)->get() as $booking)
                <div class="flex items-center gap-2 text-[10px] text-on-surface-variant">
                    <div class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></div>
                    <span class="font-bold uppercase tracking-tighter">{{ $booking->court->name }}: {{ $booking->start_time }}</span>
                </div>
                @empty
                <p class="text-[10px] text-on-surface-variant italic">No active sessions today</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Court Occupancy -->
    <div class="glass-card p-6 rounded-2xl relative overflow-hidden border border-white/5">
        <div class="relative z-10">
            <div class="flex justify-between items-start mb-4">
                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Court Occupancy</span>
                <span class="material-symbols-outlined text-tertiary">sports_soccer</span>
            </div>
            <h3 class="text-2xl font-black font-headline text-on-surface">{{ \App\Models\Booking::where('status', 'confirmed')->where('date', date('Y-m-d'))->count() }}/{{ \App\Models\Court::count() ?: 1 }} <span class="text-sm font-normal text-on-surface-variant uppercase font-bold tracking-widest">Arenas</span></h3>
            <div class="mt-4 flex gap-2">
                @php $totalCourts = \App\Models\Court::count() ?: 1; @endphp
                @foreach(\App\Models\Court::all() as $court)
                @php $isOccupied = \App\Models\Booking::where('court_id', $court->id)->where('date', date('Y-m-d'))->where('status', 'confirmed')->exists(); @endphp
                <div class="flex-1 h-1.5 {{ $isOccupied ? 'bg-primary shadow-[0_0_10px_rgba(164,255,185,0.4)]' : 'bg-surface-container-high' }} rounded-full"></div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Weekly Booking -->
    <div class="glass-card p-6 rounded-2xl relative overflow-hidden border border-white/5">
        <div class="relative z-10">
            <div class="flex justify-between items-start mb-4">
                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Weekly Booking</span>
                <span class="material-symbols-outlined text-on-surface">bar_chart</span>
            </div>
            <div class="flex items-end justify-between">
                <h3 class="text-2xl font-black font-headline text-on-surface">{{ \App\Models\Booking::where('created_at', '>=', now()->subDays(7))->count() }}</h3>
                <div class="flex items-end gap-1 h-8">
                    @for($i = 0; $i < 5; $i++)
                    <div class="w-1 bg-primary/{{ 20 + ($i * 15) }} h-{{ 2 + ($i * 1.5) }} rounded-full"></div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Middle: Weekly Revenue Chart -->
<section class="glass-card p-8 rounded-3xl relative overflow-hidden border border-white/5">
    <div class="pitch-pattern absolute inset-0 opacity-[0.02]"></div>
    <div class="relative z-10">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h4 class="text-xl font-headline font-black text-on-surface uppercase tracking-tight">Revenue Performance</h4>
                <p class="text-xs text-on-surface-variant font-label mt-1 uppercase tracking-widest font-bold">Weekly financial snapshot across all courts</p>
            </div>
            <select class="bg-surface-container-high border-none rounded-lg text-[10px] font-bold uppercase tracking-widest text-on-surface px-4 py-2 focus:ring-1 focus:ring-primary/50">
                <option>Last 7 Days</option>
                <option>Last 30 Days</option>
            </select>
        </div>
        <div class="h-64 flex items-end justify-between gap-4 px-4 border-b border-outline-variant/10">
            @php 
                $days = [];
                $revenues = [];
                for ($i = 6; $i >= 0; $i--) {
                    $date = now()->subDays($i);
                    $days[] = $date->format('D');
                    $revenues[] = \App\Models\Booking::whereDate('date', $date->format('Y-m-d'))
                        ->where('status', 'confirmed')
                        ->sum('total_price');
                }
                $maxRevenue = max($revenues) ?: 1;
            @endphp
            @foreach($days as $index => $day)
            @php 
                $height = ($revenues[$index] / $maxRevenue) * 100;
                // Ensure a minimum height for visibility if there is revenue
                if ($revenues[$index] > 0 && $height < 10) $height = 10;
            @endphp
            <div class="flex-1 flex flex-col items-center gap-3 group">
                <div class="w-full bg-surface-container-high rounded-t-xl relative overflow-hidden h-full group-hover:bg-primary/10 transition-colors">
                    <div class="absolute bottom-0 w-full transition-all duration-700 ease-out {{ ($day == 'Sat' || $day == 'Sun') ? 'bg-primary/80 shadow-[0_0_20px_rgba(164,255,185,0.3)]' : 'bg-primary/40' }}" 
                         style="height: <?php echo $height; ?>%;">
                    </div>
                    @if($revenues[$index] > 0)
                    <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-surface-bright px-2 py-1 rounded text-[8px] font-bold border border-primary/20 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-20">
                        Rp {{ number_format($revenues[$index], 0, ',', '.') }}
                    </div>
                    @endif
                </div>
                <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">{{ $day }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Bottom: Today's Schedule & Activity -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Today's Schedule -->
    <div class="lg:col-span-2 glass-card rounded-3xl overflow-hidden border border-white/5">
        <div class="p-6 border-b border-white/5 flex justify-between items-center bg-surface-container/30">
            <h4 class="text-sm font-headline font-black text-on-surface uppercase tracking-widest">Today's Schedule</h4>
            <span class="text-[10px] font-bold py-1 px-3 bg-primary/10 text-primary rounded-full uppercase tracking-tighter">Live Updates</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-surface-container-low/50 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">
                    <tr>
                        <th class="px-6 py-4">Time</th>
                        <th class="px-6 py-4">Court</th>
                        <th class="px-6 py-4">Team</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse(\App\Models\Booking::whereDate('date', date('Y-m-d'))->orderBy('start_time')->take(5)->get() as $booking)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 font-headline font-bold text-on-surface">{{ $booking->start_time }}</td>
                        <td class="px-6 py-4 text-sm text-on-surface-variant font-bold italic">{{ $booking->court->name }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-secondary/20 flex items-center justify-center text-[10px] font-bold text-secondary uppercase">{{ substr($booking->customer_name, 0, 2) }}</div>
                                <span class="text-sm font-bold uppercase font-headline italic tracking-tighter">{{ $booking->customer_name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold {{ $booking->status == 'confirmed' ? 'bg-primary/10 text-primary' : 'bg-surface-container-high text-on-surface-variant' }} uppercase">
                                @if($booking->status == 'confirmed')<span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>@endif
                                {{ $booking->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.bookings.index') }}" class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors">visibility</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-on-surface-variant italic uppercase tracking-widest text-xs">No bookings scheduled for today</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Activity Log -->
    <div class="glass-card rounded-3xl p-6 border border-white/5">
        <h4 class="text-sm font-headline font-black text-on-surface uppercase tracking-widest mb-6">Activity Log</h4>
        <div class="space-y-6">
            @foreach(\App\Models\Booking::latest()->take(4)->get() as $booking)
            <div class="flex gap-4 relative">
                @if(!$loop->last)<div class="absolute left-[11px] top-7 bottom-[-24px] w-[1px] bg-outline-variant/20"></div>@endif
                <div class="w-6 h-6 rounded-full bg-{{ $booking->status == 'confirmed' ? 'primary' : ($booking->status == 'cancelled' ? 'error' : 'secondary') }}/20 flex items-center justify-center z-10">
                    <span class="material-symbols-outlined text-[14px] text-{{ $booking->status == 'confirmed' ? 'primary' : ($booking->status == 'cancelled' ? 'error' : 'secondary') }}">
                        {{ $booking->status == 'confirmed' ? 'check_circle' : ($booking->status == 'cancelled' ? 'cancel' : 'add_box') }}
                    </span>
                </div>
                <div>
                    <p class="text-[13px] font-bold text-on-surface uppercase font-headline italic tracking-tighter">Booking {{ ucfirst($booking->status) }}</p>
                    <p class="text-[10px] text-on-surface-variant uppercase mt-0.5 font-bold tracking-widest">{{ $booking->court->name }} - {{ $booking->customer_name }} • {{ $booking->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <a href="{{ route('admin.bookings.index') }}" class="block w-full mt-8 py-3 rounded-xl bg-surface-container-high hover:bg-surface-bright text-center text-[10px] font-bold uppercase tracking-widest text-on-surface-variant transition-all border border-white/5">View All Activity</a>
    </div>
</div>
@endsection
