@extends('layouts.admin')

@section('title', 'Performance Reports - Admin')

@section('content')
@php
    $currentTab = request()->get('tab', 'monthly');
@endphp
<!-- Editorial Header Section -->
<section class="mb-10 flex justify-between items-end">
    <div>
        <h2 class="font-headline text-5xl font-black tracking-tighter uppercase italic text-on-surface mb-2">
            Garuda <span class="text-primary">Reports</span></h2>
        <p class="font-body text-on-surface-variant max-w-xl text-sm uppercase tracking-widest">Comprehensive analytical breakdown of Garuda Futsall
            operations. Monitor growth, occupancy, and revenue streams.</p>
    </div>
    <div class="flex gap-2">
        <button
            class="bg-primary text-on-primary px-6 py-3 rounded-full font-headline font-bold uppercase tracking-tight flex items-center gap-2 hover:bg-primary-fixed-dim transition-all shadow-[0_0_20px_rgba(164,255,185,0.2)] text-xs">
            <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
            Export PDF
        </button>
    </div>
</section>
<!-- Report Type Selectors -->
<nav class="flex gap-4 mb-8">
    <a href="{{ route('admin.reports', ['tab' => 'daily']) }}"
        class="px-8 py-3 rounded-full font-headline font-bold uppercase tracking-widest text-[10px] transition-all border {{ $currentTab == 'daily' ? 'border-2 border-primary bg-primary/10 text-primary shadow-[0_0_15px_rgba(164,255,185,0.1)]' : 'border-outline-variant bg-surface-container-highest text-on-surface-variant hover:border-primary/40' }}">Daily</a>
    <a href="{{ route('admin.reports', ['tab' => 'monthly']) }}"
        class="px-8 py-3 rounded-full font-headline font-bold uppercase tracking-widest text-[10px] transition-all border {{ $currentTab == 'monthly' ? 'border-2 border-primary bg-primary/10 text-primary shadow-[0_0_15px_rgba(164,255,185,0.1)]' : 'border-outline-variant bg-surface-container-highest text-on-surface-variant hover:border-primary/40' }}">Monthly</a>
    <a href="{{ route('admin.reports', ['tab' => 'annual']) }}"
        class="px-8 py-3 rounded-full font-headline font-bold uppercase tracking-widest text-[10px] transition-all border {{ $currentTab == 'annual' ? 'border-2 border-primary bg-primary/10 text-primary shadow-[0_0_15px_rgba(164,255,185,0.1)]' : 'border-outline-variant bg-surface-container-highest text-on-surface-variant hover:border-primary/40' }}">Annual</a>
</nav>

@if($currentTab == 'monthly')
<!-- Summary Stats Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="glass-card p-6 rounded-3xl border border-white/5 relative overflow-hidden group">
        <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
            <span class="material-symbols-outlined text-9xl">calendar_month</span>
        </div>
        <p class="font-label uppercase text-[10px] tracking-[0.2em] text-primary mb-1">Total Bookings</p>
        <h3 class="font-headline text-4xl font-bold tracking-tight text-on-surface">{{ \App\Models\Booking::whereMonth('date', date('m'))->count() }}</h3>
        <p class="text-xs text-primary mt-2 flex items-center gap-1 font-bold">
            <span class="material-symbols-outlined text-xs">trending_up</span>
            +12% vs last month
        </p>
    </div>
    <div class="glass-card p-6 rounded-3xl border border-white/5 relative overflow-hidden group">
        <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
            <span class="material-symbols-outlined text-9xl">schedule</span>
        </div>
        <p class="font-label uppercase text-[10px] tracking-[0.2em] text-secondary mb-1">Peak Hours</p>
        <h3 class="font-headline text-4xl font-bold tracking-tight text-on-surface text-secondary">19:00 - 21:00</h3>
        <p class="text-[10px] text-on-surface-variant mt-2 font-bold uppercase tracking-widest">Monday & Wednesday peak</p>
    </div>
    <div class="glass-card p-6 rounded-3xl border border-white/5 relative overflow-hidden group">
        <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
            <span class="material-symbols-outlined text-9xl">payments</span>
        </div>
        <p class="font-label uppercase text-[10px] tracking-[0.2em] text-primary mb-1">Gross Revenue</p>
        <h3 class="font-headline text-4xl font-bold tracking-tight text-on-surface">Rp {{ number_format(\App\Models\Booking::whereMonth('date', date('m'))->where('status', 'confirmed')->sum('total_price'), 0, ',', '.') }}</h3>
        <p class="text-xs text-primary mt-2 flex items-center gap-1 font-bold">
            <span class="material-symbols-outlined text-xs">trending_up</span>
            +8.4% growth
        </p>
    </div>
    <div class="glass-card p-6 rounded-3xl border border-white/5 relative overflow-hidden group">
        <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
            <span class="material-symbols-outlined text-9xl">groups</span>
        </div>
        <p class="font-label uppercase text-[10px] tracking-[0.2em] text-tertiary mb-1">Unique Teams</p>
        <h3 class="font-headline text-4xl font-bold tracking-tight text-on-surface text-tertiary">{{ \App\Models\Booking::distinct('customer_name')->count() }}</h3>
        <p class="text-[10px] text-on-surface-variant mt-2 font-bold uppercase tracking-widest">Across all platforms</p>
    </div>
</div>
<!-- Main Analytics Section -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
    <!-- Monthly Revenue Heatmap -->
    <div class="lg:col-span-1 glass-card p-8 rounded-3xl border border-white/5">
        <div class="flex justify-between items-center mb-6">
            <h4 class="font-headline text-xl font-bold uppercase tracking-tight">Revenue Heatmap</h4>
            <span
                class="text-[10px] font-bold text-on-surface-variant bg-surface-container px-2 py-1 rounded">{{ strtoupper(date('M Y')) }}</span>
        </div>
        <div class="grid grid-cols-7 gap-2">
            <!-- Day Labels -->
            <div class="text-center text-[10px] font-bold text-on-surface-variant mb-2">S</div>
            <div class="text-center text-[10px] font-bold text-on-surface-variant mb-2">M</div>
            <div class="text-center text-[10px] font-bold text-on-surface-variant mb-2">T</div>
            <div class="text-center text-[10px] font-bold text-on-surface-variant mb-2">W</div>
            <div class="text-center text-[10px] font-bold text-on-surface-variant mb-2">T</div>
            <div class="text-center text-[10px] font-bold text-on-surface-variant mb-2">F</div>
            <div class="text-center text-[10px] font-bold text-on-surface-variant mb-2">S</div>
            <!-- Days -->
            @php
                $daysInMonth = date('t');
            @endphp
            @for($i = 1; $i <= $daysInMonth; $i++)
            @php
                $revenueOnDay = \App\Models\Booking::whereDate('date', date('Y-m-').sprintf('%02d', $i))->where('status', 'confirmed')->sum('total_price');
                $opacityClass = $revenueOnDay > 0 ? 'bg-primary/'.min(100, 20 + (int)($revenueOnDay / 1000000 * 80)) : 'bg-primary/5';
            @endphp
            <div
                class="aspect-square {{ $opacityClass }} rounded-lg flex items-center justify-center text-[10px] border border-primary/10">
                {{ $i }}</div>
            @endfor
        </div>
        <div class="mt-8 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="text-[8px] text-on-surface-variant uppercase font-bold">Low</span>
                <div class="flex gap-1">
                    <div class="w-2 h-2 rounded-sm bg-primary/10"></div>
                    <div class="w-2 h-2 rounded-sm bg-primary/40"></div>
                    <div class="w-2 h-2 rounded-sm bg-primary/70"></div>
                    <div class="w-2 h-2 rounded-sm bg-primary"></div>
                </div>
                <span class="text-[8px] text-on-surface-variant uppercase font-bold">High</span>
            </div>
        </div>
    </div>
    <!-- 30-Day Bar Chart Concept -->
    <div class="lg:col-span-2 glass-card p-8 rounded-3xl border border-white/5 flex flex-col">
        <div class="flex justify-between items-center mb-10">
            <h4 class="font-headline text-xl font-bold uppercase tracking-tight">Booking Volume <span
                    class="text-on-surface-variant font-normal">(Last 15 Days)</span></h4>
            <div class="flex gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-primary"></div>
                    <span class="text-[10px] text-on-surface-variant font-bold uppercase">Bookings</span>
                </div>
            </div>
        </div>
        <div
            class="flex-grow flex items-end justify-between gap-2 h-64 border-b border-outline-variant/30 pb-4 relative">
            @for($i = 14; $i >= 0; $i--)
            @php
                $date = now()->subDays($i);
                $count = \App\Models\Booking::whereDate('date', $date->format('Y-m-d'))->count();
                $height = min(100, $count * 10 + 5);
            @endphp
            <div class="flex-1 bg-surface-container rounded-t-sm group relative" style="height: <?php echo $height; ?>%;">
                <div
                    class="absolute inset-0 bg-primary opacity-20 group-hover:opacity-100 transition-opacity rounded-t-sm">
                </div>
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[8px] font-bold opacity-0 group-hover:opacity-100 transition-opacity">{{ $count }}</div>
            </div>
            @endfor
        </div>
        <div class="flex justify-between mt-4">
            <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">{{ now()->subDays(14)->format('M d') }}</span>
            <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">{{ now()->subDays(7)->format('M d') }}</span>
            <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">{{ now()->format('M d') }}</span>
        </div>
    </div>
</div>
<!-- Detailed Breakdown Table Section -->
<section class="glass-card rounded-3xl border border-white/5 overflow-hidden">
    <div class="p-8 flex justify-between items-center border-b border-white/5">
        <h4 class="font-headline text-2xl font-black uppercase tracking-tighter italic">Daily Breakdown <span
                class="text-primary">Detailed Log</span></h4>
        <div class="flex gap-4">
            <button
                class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant bg-surface-container px-4 py-2 rounded-full hover:bg-surface-container-highest transition-all">
                <span class="material-symbols-outlined text-sm">filter_list</span> Filter
            </button>
            <a href="{{ route('admin.export.csv') }}"
                class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant bg-surface-container px-4 py-2 rounded-full hover:bg-surface-container-highest transition-all">
                <span class="material-symbols-outlined text-sm">download</span> CSV
            </a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-surface-container/50 border-b border-white/5">
                    <th
                        class="px-8 py-4 font-headline uppercase text-[10px] tracking-widest text-on-surface-variant">
                        Date</th>
                    <th
                        class="px-8 py-4 font-headline uppercase text-[10px] tracking-widest text-on-surface-variant">
                        Bookings</th>
                    <th
                        class="px-8 py-4 font-headline uppercase text-[10px] tracking-widest text-on-surface-variant">
                        Total Hours</th>
                    <th
                        class="px-8 py-4 font-headline uppercase text-[10px] tracking-widest text-on-surface-variant">
                        Revenue</th>
                    <th
                        class="px-8 py-4 font-headline uppercase text-[10px] tracking-widest text-on-surface-variant">
                        Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach(\App\Models\Booking::select('date', \DB::raw('count(*) as count'), \DB::raw('sum(total_price) as total'))->groupBy('date')->latest('date')->take(7)->get() as $row)
                <tr class="hover:bg-primary/5 transition-colors group">
                    <td class="px-8 py-5 font-headline font-bold text-on-surface text-sm">{{ Carbon\Carbon::parse($row->date)->format('M d, Y') }}</td>
                    <td class="px-8 py-5 text-on-surface-variant text-sm">{{ $row->count }}</td>
                    <td class="px-8 py-5 text-on-surface-variant text-sm">{{ $row->count * 1.5 }} hrs</td>
                    <td class="px-8 py-5 font-headline font-bold text-primary text-sm">Rp {{ number_format($row->total, 0, ',', '.') }}</td>
                    <td class="px-8 py-5">
                        <span
                            class="inline-flex items-center gap-1 bg-primary/10 text-primary text-[10px] font-bold uppercase px-2 py-1 rounded">{{ $row->total > 1000000 ? 'Peak' : 'Normal' }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@else
<!-- Placeholder for Daily/Annual -->
<div class="glass-card rounded-[3rem] p-20 flex flex-col items-center justify-center border border-white/5 text-center">
    <div class="w-24 h-24 rounded-full bg-primary/10 flex items-center justify-center mb-8 border border-primary/20">
        <span class="material-symbols-outlined text-primary text-5xl">analytics</span>
    </div>
    <h3 class="text-3xl font-headline font-black uppercase italic tracking-tighter mb-4">{{ ucfirst($currentTab) }} Analysis</h3>
    <p class="text-on-surface-variant max-w-md uppercase text-xs font-bold tracking-widest leading-loose">Modul analisis {{ $currentTab }} sedang dalam tahap sinkronisasi data dari database cloud arena.</p>
</div>
@endif
@endsection
