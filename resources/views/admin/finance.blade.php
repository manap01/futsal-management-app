@extends('layouts.admin')

@section('title', 'Finance Management - Admin')

@section('content')
@php
    $currentTab = request()->get('tab', 'pemasukan');
@endphp
<!-- Section Header & Tabs -->
<div class="flex justify-between items-end mb-10">
    <div>
        <h2 class="text-5xl font-headline font-black italic tracking-tighter uppercase mb-2">Finance Hub
        </h2>
        <p class="text-on-surface-variant font-body max-w-md opacity-80 text-sm uppercase tracking-widest">Oversee stadium cashflow, manage
            overheads, and track the pulse of your arena's economy.</p>
    </div>
    <div class="flex bg-surface-container p-1.5 rounded-xl">
        <a href="{{ route('admin.finance', ['tab' => 'pemasukan']) }}"
            class="px-6 py-2.5 rounded-lg text-[10px] font-headline font-bold uppercase tracking-widest {{ $currentTab == 'pemasukan' ? 'text-on-primary bg-primary' : 'text-on-surface-variant hover:text-on-surface' }} transition-all">Pemasukan</a>
        <a href="{{ route('admin.finance', ['tab' => 'pengeluaran']) }}"
            class="px-6 py-2.5 rounded-lg text-[10px] font-headline font-bold uppercase tracking-widest {{ $currentTab == 'pengeluaran' ? 'text-on-primary bg-primary' : 'text-on-surface-variant hover:text-on-surface' }} transition-all">Pengeluaran</a>
        <a href="{{ route('admin.finance', ['tab' => 'ringkasan']) }}"
            class="px-6 py-2.5 rounded-lg text-[10px] font-headline font-bold uppercase tracking-widest {{ $currentTab == 'ringkasan' ? 'text-on-primary bg-primary' : 'text-on-surface-variant hover:text-on-surface' }} transition-all">Ringkasan</a>
    </div>
</div>

@if($currentTab == 'pemasukan')
<!-- Dashboard Grid -->
<div class="grid grid-cols-12 gap-8">
    <!-- Left Column: Quick Stats & History -->
    <div class="col-span-8 space-y-8">
        <!-- Stats Highlight Cards -->
        <div class="grid grid-cols-2 gap-6">
            <div class="glass-card p-8 rounded-3xl relative overflow-hidden group border border-white/5">
                <div
                    class="absolute -right-4 -bottom-4 opacity-5 group-hover:scale-110 transition-transform duration-700 text-primary">
                    <span class="material-symbols-outlined text-9xl">trending_up</span>
                </div>
                <p class="text-xs font-headline font-bold text-primary uppercase tracking-[0.2em] mb-4">
                    Daily Revenue</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-4xl font-headline font-black italic">Rp {{ number_format(\App\Models\Booking::whereDate('date', date('Y-m-d'))->where('status', 'confirmed')->sum('total_price'), 0, ',', '.') }}</span>
                    <span class="text-primary text-xs font-bold">+12%</span>
                </div>
                <div class="mt-6 flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
                    <p class="text-[10px] text-on-surface-variant font-bold uppercase tracking-widest">
                        Real-time tracking active</p>
                </div>
            </div>
            <div class="glass-card p-8 rounded-3xl relative overflow-hidden group border border-white/5">
                <div
                    class="absolute -right-4 -bottom-4 opacity-5 group-hover:scale-110 transition-transform duration-700 text-secondary">
                    <span class="material-symbols-outlined text-9xl">account_balance_wallet</span>
                </div>
                <p class="text-xs font-headline font-bold text-secondary uppercase tracking-[0.2em] mb-4">
                    Active Bookings</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-4xl font-headline font-black italic">{{ \App\Models\Booking::whereDate('date', date('Y-m-d'))->where('status', 'confirmed')->count() }} Sessions</span>
                    <span class="text-secondary text-xs font-bold">Today</span>
                </div>
                <div class="mt-6 flex items-center gap-4">
                    <div class="flex -space-x-2">
                        <div class="w-6 h-6 rounded-full bg-primary/20 border border-background flex items-center justify-center text-[8px] font-bold">A</div>
                        <div class="w-6 h-6 rounded-full bg-secondary/20 border border-background flex items-center justify-center text-[8px] font-bold">B</div>
                        <div class="w-6 h-6 rounded-full bg-tertiary/20 border border-background flex items-center justify-center text-[8px] font-bold">C</div>
                    </div>
                    <p class="text-[10px] text-on-surface-variant font-bold uppercase tracking-widest">+{{ \App\Models\Booking::where('status', 'pending')->count() }} more pending</p>
                </div>
            </div>
        </div>
        <!-- Income History Table -->
        <div class="glass-card rounded-3xl overflow-hidden border border-white/5">
            <div
                class="px-8 py-6 border-b border-white/5 flex justify-between items-center bg-surface-container/30">
                <h3 class="font-headline font-bold uppercase tracking-widest text-sm">Income History</h3>
                <div
                    class="flex items-center gap-2 px-3 py-1 bg-white/5 rounded-full border border-white/10 cursor-pointer hover:bg-white/10 transition-colors">
                    <span class="text-[10px] font-headline font-bold uppercase tracking-tighter">Export
                        CSV</span>
                    <span class="material-symbols-outlined text-xs">download</span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-surface-container-low/50">
                        <tr>
                            <th
                                class="px-8 py-4 text-[10px] font-headline font-bold text-on-surface-variant uppercase tracking-widest">
                                Transaction ID</th>
                            <th
                                class="px-8 py-4 text-[10px] font-headline font-bold text-on-surface-variant uppercase tracking-widest">
                                Source / Booking</th>
                            <th
                                class="px-8 py-4 text-[10px] font-headline font-bold text-on-surface-variant uppercase tracking-widest text-right">
                                Amount</th>
                            <th
                                class="px-8 py-4 text-[10px] font-headline font-bold text-on-surface-variant uppercase tracking-widest">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 font-body">
                        @foreach(\App\Models\Booking::where('status', 'confirmed')->latest()->take(10)->get() as $tx)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-8 py-5 text-sm font-medium">#TX-{{ 90000 + $tx->id }}</td>
                            <td class="px-8 py-5">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold uppercase italic font-headline">{{ $tx->court->name }} - {{ $tx->start_time }}</span>
                                    <span class="text-[10px] text-on-surface-variant uppercase font-bold">Booking Ref: BK-{{ 4000 + $tx->id }} ({{ $tx->customer_name }})</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-right font-headline font-bold text-primary">Rp {{ number_format($tx->total_price, 0, ',', '.') }}</td>
                            <td class="px-8 py-5">
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold uppercase bg-primary/10 text-primary border border-primary/20">Success</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Right Column: Add Income Form & Summary Chart -->
    <div class="col-span-4 space-y-8">
        <!-- Add Income Form -->
        <div class="glass-card p-8 rounded-3xl border-l-4 border-secondary border-white/5">
            <div class="flex items-center gap-3 mb-6">
                <span class="material-symbols-outlined text-secondary">add_circle</span>
                <h3 class="font-headline font-bold uppercase tracking-widest">Quick Add Income</h3>
            </div>
            <form class="space-y-6">
                <div class="space-y-1">
                    <label
                        class="text-[10px] font-headline font-bold uppercase tracking-widest text-on-surface-variant ml-1">Source
                        Name</label>
                    <input
                        class="w-full bg-surface-container-highest border-none border-b-2 border-transparent focus:border-secondary focus:ring-0 rounded-xl px-4 py-3 text-sm placeholder:text-on-surface-variant/40"
                        placeholder="e.g. Academy Payment" type="text" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label
                            class="text-[10px] font-headline font-bold uppercase tracking-widest text-on-surface-variant ml-1">Amount
                            (Rp)</label>
                        <input
                            class="w-full bg-surface-container-highest border-none border-b-2 border-transparent focus:border-secondary focus:ring-0 rounded-xl px-4 py-3 text-sm placeholder:text-on-surface-variant/40"
                            placeholder="0" type="number" />
                    </div>
                    <div class="space-y-1">
                        <label
                            class="text-[10px] font-headline font-bold uppercase tracking-widest text-on-surface-variant ml-1">Category</label>
                        <select
                            class="w-full bg-surface-container-highest border-none border-b-2 border-transparent focus:border-secondary focus:ring-0 rounded-xl px-4 py-3 text-sm text-on-surface-variant">
                            <option>Booking</option>
                            <option>Retail</option>
                            <option>Membership</option>
                        </select>
                    </div>
                </div>
                <div class="space-y-1">
                    <label
                        class="text-[10px] font-headline font-bold uppercase tracking-widest text-on-surface-variant ml-1">Description</label>
                    <textarea
                        class="w-full bg-surface-container-highest border-none border-b-2 border-transparent focus:border-secondary focus:ring-0 rounded-xl px-4 py-3 text-sm placeholder:text-on-surface-variant/40 resize-none"
                        placeholder="Additional details..." rows="2"></textarea>
                </div>
                <button
                    class="w-full py-4 bg-secondary text-on-secondary font-headline font-black uppercase tracking-widest rounded-xl hover:scale-[1.02] active:scale-95 transition-all shadow-lg shadow-secondary/10">Log
                    Transaction</button>
            </form>
        </div>
        <!-- Visual Summary (Pie Mockup) -->
        <div class="glass-card p-8 rounded-3xl relative border border-white/5">
            <h3 class="font-headline font-bold uppercase tracking-widest text-sm mb-6">Revenue Split</h3>
            <div class="flex justify-center items-center py-4">
                <!-- SVG Pie Chart Mockup -->
                <div class="relative w-40 h-40">
                    <svg class="w-full h-full transform -rotate-90" viewbox="0 0 36 36">
                        <path class="text-white/5"
                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none" stroke="currentColor" stroke-dasharray="100, 100" stroke-width="3">
                        </path>
                        <path class="text-primary"
                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none" stroke="currentColor" stroke-dasharray="70, 100"
                            stroke-linecap="round" stroke-width="3.5"></path>
                        <path class="text-secondary"
                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none" stroke="currentColor" stroke-dasharray="25, 100"
                            stroke-dashoffset="-70" stroke-linecap="round" stroke-width="3.5"></path>
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-[8px] font-headline font-bold opacity-40 uppercase tracking-widest">TOTAL</span>
                        <span class="text-xl font-headline font-black italic">100%</span>
                    </div>
                </div>
            </div>
            <div class="mt-6 grid grid-cols-2 gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-primary"></div>
                    <span class="text-[10px] font-bold uppercase opacity-60">Courts (70%)</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-secondary"></div>
                    <span class="text-[10px] font-bold uppercase opacity-60">Retail (25%)</span>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif($currentTab == 'pengeluaran')
<!-- Pengeluaran Placeholder -->
<div class="glass-card rounded-[3rem] p-20 flex flex-col items-center justify-center border border-white/5 text-center">
    <div class="w-24 h-24 rounded-full bg-error/10 flex items-center justify-center mb-8 border border-error/20">
        <span class="material-symbols-outlined text-error text-5xl">payments</span>
    </div>
    <h3 class="text-3xl font-headline font-black uppercase italic tracking-tighter mb-4">Expense Tracker</h3>
    <p class="text-on-surface-variant max-w-md uppercase text-xs font-bold tracking-widest leading-loose">Halaman ini digunakan untuk mencatat pengeluaran operasional arena seperti listrik, maintenance, dan gaji karyawan.</p>
    <button class="mt-10 bg-error text-on-error px-8 py-3 rounded-xl font-headline font-bold uppercase tracking-widest text-[10px] hover:shadow-[0_0_20px_rgba(255,113,108,0.3)] transition-all">Tambah Pengeluaran Baru</button>
</div>
@elseif($currentTab == 'ringkasan')
<!-- Ringkasan Section -->
<div class="mt-4">
    <div class="grid grid-cols-12 gap-8">
        <!-- Large Net Balance -->
        <div
            class="col-span-5 glass-card rounded-[3rem] p-12 bg-gradient-to-br from-surface-container-highest to-surface relative group border border-white/5">
            <div class="relative z-10">
                <p
                    class="text-xs font-headline font-bold text-on-surface-variant uppercase tracking-[0.3em] mb-6">
                    Current Arena Balance</p>
                <h3 class="text-7xl font-headline font-black italic tracking-tighter text-on-surface mb-4">
                    Rp 128.4M</h3>
                <div class="flex items-center gap-4">
                    <span
                        class="inline-flex items-center gap-1 text-primary bg-primary/10 px-3 py-1 rounded-full text-xs font-bold">
                        <span class="material-symbols-outlined text-sm">trending_up</span>
                        2.4% vs Last Month
                    </span>
                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-40">Audited Dec
                        2023</span>
                </div>
            </div>
        </div>
        <!-- Performance Line Chart -->
        <div class="col-span-7 glass-card rounded-[3rem] p-10 flex flex-col border border-white/5">
            <div class="flex justify-between items-start mb-10">
                <div>
                    <h3 class="font-headline font-bold uppercase tracking-widest text-sm">30-Day Performance
                    </h3>
                    <p class="text-[10px] text-on-surface-variant uppercase font-bold tracking-tighter">
                        Income vs Expense analysis</p>
                </div>
                <div class="flex gap-4">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-1 rounded-full bg-primary"></div>
                        <span class="text-[10px] font-bold uppercase opacity-60">Income</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-1 rounded-full bg-secondary"></div>
                        <span class="text-[10px] font-bold uppercase opacity-60">Expense</span>
                    </div>
                </div>
            </div>
            <!-- Visual Line Chart Mockup -->
            <div class="flex-grow flex items-end gap-1 px-4 relative">
                <div class="flex-grow h-32 flex items-end justify-between px-2">
                    <div class="w-1.5 h-[40%] bg-primary/20 rounded-full"></div>
                    <div class="w-1.5 h-[55%] bg-primary/30 rounded-full"></div>
                    <div class="w-1.5 h-[45%] bg-primary/20 rounded-full"></div>
                    <div class="w-1.5 h-[70%] bg-primary/40 rounded-full"></div>
                    <div class="w-1.5 h-[85%] bg-primary rounded-full"></div>
                    <div class="w-1.5 h-[65%] bg-primary/30 rounded-full"></div>
                    <div class="w-1.5 h-[75%] bg-primary/40 rounded-full"></div>
                    <div class="w-1.5 h-[90%] bg-primary rounded-full"></div>
                    <div class="w-1.5 h-[60%] bg-primary/30 rounded-full"></div>
                    <div class="w-1.5 h-[50%] bg-primary/20 rounded-full"></div>
                    <div class="w-1.5 h-[80%] bg-primary rounded-full"></div>
                </div>
            </div>
            <div
                class="mt-8 flex justify-between px-6 text-[10px] font-headline font-bold uppercase text-on-surface-variant tracking-widest">
                <span>Week 1</span>
                <span>Week 2</span>
                <span>Week 3</span>
                <span>Week 4</span>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
