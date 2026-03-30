@extends('layouts.admin')

@section('title', 'System Configuration - Admin')

@section('content')
<!-- Header Section -->
<div class="mb-12">
    <h2 class="text-5xl font-black font-headline tracking-tighter uppercase mb-2">System <span
        class="text-primary italic">Configuration</span></h2>
    <p class="text-on-surface-variant max-w-2xl font-body text-sm uppercase tracking-widest">Manage your arena's identity, commercial rules, and
      administrative access from this central control panel.</p>
</div>
<div class="grid grid-cols-12 gap-8">
    <!-- Section: Arena Info -->
    <div class="col-span-12 lg:col-span-7 space-y-8">
        <section class="glass-card rounded-3xl p-8 relative overflow-hidden group border border-white/5">
            <div class="absolute top-0 right-0 p-8 opacity-5">
                <span class="material-symbols-outlined text-9xl">stadium</span>
            </div>
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center border border-primary/20">
                    <span class="material-symbols-outlined text-primary">info</span>
                </div>
                <h3 class="text-2xl font-bold font-headline uppercase tracking-tight">Arena Identity</h3>
            </div>
            <div class="grid grid-cols-2 gap-6 relative z-10">
                <div class="col-span-2">
                    <label class="block text-[10px] font-bold text-primary uppercase tracking-[0.2em] mb-2">Arena Name</label>
                    <input
                        class="w-full bg-surface-container-highest border-b-2 border-primary/20 focus:border-primary focus:ring-0 text-on-surface p-4 rounded-xl transition-all font-headline text-lg font-bold"
                        type="text" value="LARAFELL ARENA - LARAGON" />
                </div>
                <div class="col-span-2">
                    <label class="block text-[10px] font-bold text-primary uppercase tracking-[0.2em] mb-2">Physical
                        Address</label>
                    <input
                        class="w-full bg-surface-container-highest border-b-2 border-primary/20 focus:border-primary focus:ring-0 text-on-surface p-4 rounded-xl transition-all"
                        type="text" value="Jl. Atletik No. 88, LARAGON Sport Center Hub" />
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-primary uppercase tracking-[0.2em] mb-2">WhatsApp
                        Contact</label>
                    <div
                        class="flex items-center gap-3 bg-surface-container-highest p-4 rounded-xl border-b-2 border-primary/20">
                        <span class="text-on-surface-variant">+62</span>
                        <input class="bg-transparent border-none focus:ring-0 p-0 text-on-surface w-full" type="text"
                            value="812-3456-7890" />
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-primary uppercase tracking-[0.2em] mb-2">Operation
                        Mode</label>
                    <div
                        class="flex items-center justify-between bg-surface-container-highest p-4 rounded-xl border-b-2 border-primary/20">
                        <span class="text-on-surface text-sm font-medium">24/7 Operations</span>
                        <div class="w-11 h-6 bg-primary rounded-full relative shadow-[0_0_15px_rgba(0,253,135,0.4)]">
                            <div class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Admin Management -->
        <section class="glass-card rounded-3xl p-8 border border-white/5">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center border border-secondary/20">
                        <span class="material-symbols-outlined text-secondary">shield_person</span>
                    </div>
                    <h3 class="text-2xl font-bold font-headline uppercase tracking-tight">Access Control</h3>
                </div>
                <button
                    class="bg-primary text-on-primary font-bold px-6 py-2 rounded-xl text-[10px] uppercase tracking-widest hover:shadow-[0_0_20px_rgba(164,255,185,0.4)] transition-all">Add
                    Staff</button>
            </div>
            <div class="space-y-4">
                <div
                    class="flex items-center justify-between p-4 bg-surface-container-low rounded-xl border border-white/5 hover:border-primary/20 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold uppercase">A</div>
                        <div>
                            <p class="font-bold text-on-surface">Admin User</p>
                            <p class="text-[10px] text-on-surface-variant uppercase font-bold tracking-widest">Superuser</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="bg-primary/10 text-primary text-[8px] px-2 py-1 rounded font-bold uppercase tracking-widest">FULL ACCESS</span>
                        <button class="text-on-surface-variant hover:text-error transition-colors"><span
                            class="material-symbols-outlined text-lg">more_vert</span></button>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Side Section: Pricing & Backup -->
    <div class="col-span-12 lg:col-span-5 space-y-8">
        <!-- Pricing Card -->
        <section
            class="bg-secondary-container/10 rounded-3xl p-8 border border-secondary/10 relative overflow-hidden group">
            <div class="absolute -bottom-10 -right-10 opacity-10 group-hover:scale-110 transition-transform duration-700">
                <span class="material-symbols-outlined text-[12rem] text-secondary">payments</span>
            </div>
            <div class="flex items-center gap-4 mb-8">
                <div
                    class="w-12 h-12 rounded-xl bg-secondary/20 flex items-center justify-center border border-secondary/30">
                    <span class="material-symbols-outlined text-secondary">sell</span>
                </div>
                <h3 class="text-2xl font-bold font-headline uppercase tracking-tight">Price Matrix</h3>
            </div>
            <div class="space-y-6 relative z-10">
                <div>
                    <div class="flex justify-between items-end mb-2">
                        <label class="text-[10px] font-bold text-secondary uppercase tracking-[0.2em]">Standard Hourly
                            Rate</label>
                        <span class="text-2xl font-black font-headline text-on-surface">Rp 150.000</span>
                    </div>
                    <div class="w-full h-1 bg-surface-container-highest rounded-full relative">
                        <div class="absolute left-0 top-0 h-full w-3/4 bg-secondary rounded-full shadow-[0_0_10px_rgba(254,148,0,0.4)]"></div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-background/50 rounded-xl border border-white/5">
                        <p class="text-[8px] font-bold text-on-surface-variant uppercase mb-1 tracking-widest">Weekend Surge</p>
                        <p class="text-lg font-bold font-headline text-secondary">+15%</p>
                    </div>
                    <div class="p-4 bg-background/50 rounded-xl border border-white/5">
                        <p class="text-[8px] font-bold text-on-surface-variant uppercase mb-1 tracking-widest">Night Discount</p>
                        <p class="text-lg font-bold font-headline text-primary">-10%</p>
                    </div>
                </div>
                <button
                    class="w-full flex items-center justify-center gap-3 bg-white/5 hover:bg-white/10 text-on-surface p-4 rounded-xl border border-white/10 transition-all font-bold text-[10px] uppercase tracking-widest">
                    <span class="material-symbols-outlined text-sm">edit_calendar</span>
                    Manage Specific Packages
                </button>
            </div>
        </section>
        <!-- Data & Backup Card -->
        <section class="glass-card rounded-3xl p-8 border-l-4 border-error/50 border-white/5">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 rounded-xl bg-error/10 flex items-center justify-center border border-error/20">
                    <span class="material-symbols-outlined text-error">database</span>
                </div>
                <h3 class="text-xl font-bold font-headline uppercase tracking-tight">Data Integrity</h3>
            </div>
            <div class="p-4 bg-error-container/10 rounded-xl border border-error/20 mb-6">
                <p class="text-[10px] text-on-error-container/80 mb-2 font-bold uppercase tracking-widest">Last automated backup: Today, 03:00 AM</p>
                <div class="w-full bg-white/5 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-error h-full w-[85%]"></div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <button
                    class="flex flex-col items-center justify-center gap-2 p-4 bg-surface-container-highest rounded-xl border border-white/5 hover:bg-surface-bright hover:border-primary/40 transition-all group">
                    <span
                        class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors">description</span>
                    <span class="text-[8px] font-bold uppercase tracking-widest">Export Excel</span>
                </button>
                <button
                    class="flex flex-col items-center justify-center gap-2 p-4 bg-surface-container-highest rounded-xl border border-white/5 hover:bg-surface-bright hover:border-secondary/40 transition-all group">
                    <span
                        class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary transition-colors">cloud_upload</span>
                    <span class="text-[8px] font-bold uppercase tracking-widest">Upload DB</span>
                </button>
            </div>
        </section>
        <!-- Status Banner -->
        <div
            class="p-6 bg-gradient-to-br from-primary to-primary-container rounded-3xl text-on-primary-container flex items-center justify-between shadow-[0_0_30px_rgba(164,255,185,0.2)]">
            <div>
                <p class="font-black font-headline tracking-tighter uppercase text-xl leading-none">System Healthy</p>
                <p class="text-[10px] font-bold uppercase tracking-widest opacity-80 mt-1">All core modules are synchronized.</p>
            </div>
            <div class="relative w-12 h-12 flex items-center justify-center">
                <div class="absolute w-8 h-8 bg-on-primary-container/20 rounded-full animate-ping"></div>
                <span class="material-symbols-outlined text-3xl font-bold">bolt</span>
            </div>
        </div>
    </div>
</div>
<!-- Sticky Footer Action -->
<div class="fixed bottom-10 right-10 z-50">
  <button
    class="group relative flex items-center justify-center w-16 h-16 bg-primary text-on-primary rounded-full shadow-[0_0_40px_rgba(164,255,185,0.4)] hover:scale-110 transition-transform">
    <span class="material-symbols-outlined text-3xl">save</span>
    <div
      class="absolute right-20 bg-primary text-on-primary px-4 py-2 rounded-xl text-[10px] font-black uppercase opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap tracking-widest shadow-2xl">
      Save All Changes</div>
  </button>
</div>
@endsection
