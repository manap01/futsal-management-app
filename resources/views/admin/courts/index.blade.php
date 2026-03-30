@extends('layouts.admin')

@section('title', 'Manajemen Lapangan - Admin')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h2 class="text-4xl font-headline font-black text-on-surface tracking-tight uppercase italic">Arena Management</h2>
        <p class="text-on-surface-variant font-label text-sm uppercase tracking-[0.2em] mt-1">Configure stadium court specifications</p>
    </div>
    <a href="{{ route('admin.courts.create') }}"
        class="bg-primary text-on-primary px-8 py-3 rounded-xl font-headline font-black text-xs uppercase tracking-widest hover:shadow-[0_0_20px_rgba(164,255,185,0.4)] transition-all active:scale-95">ADD NEW COURT</a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($courts as $court)
    <div class="glass-card rounded-2xl overflow-hidden border border-white/5 group">
        <div class="h-48 relative overflow-hidden">
            <img src="{{ $court->image }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent"></div>
            <div class="absolute top-4 right-4 flex gap-2">
                <a href="{{ route('admin.courts.edit', $court->id) }}" class="w-10 h-10 rounded-full bg-surface-container-highest/80 backdrop-blur-md flex items-center justify-center text-on-surface hover:text-primary transition-colors border border-white/10">
                    <span class="material-symbols-outlined text-sm">edit</span>
                </a>
                <form action="{{ route('admin.courts.destroy', $court->id) }}" method="POST" onsubmit="return confirm('Hapus lapangan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-10 h-10 rounded-full bg-surface-container-highest/80 backdrop-blur-md flex items-center justify-center text-on-surface hover:text-error transition-colors border border-white/10">
                        <span class="material-symbols-outlined text-sm">delete</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <h3 class="font-headline font-black text-2xl uppercase tracking-tight text-on-surface">{{ $court->name }}</h3>
                <p class="text-[10px] font-bold text-primary uppercase tracking-[0.2em]">{{ $court->type }}</p>
            </div>
            <div class="flex justify-between items-end border-t border-white/5 pt-4">
                <div>
                    <p class="text-[10px] uppercase text-on-surface-variant font-bold mb-1">Pricing</p>
                    <p class="font-headline font-black text-xl text-secondary">Rp {{ number_format($court->price_per_hour, 0, ',', '.') }}<span class="text-[10px] font-normal text-on-surface-variant lowercase italic">/ jam</span></p>
                </div>
                <div class="text-right">
                    <p class="text-[10px] uppercase text-on-surface-variant font-bold mb-1">Status</p>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-primary/10 text-primary uppercase">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                        Active
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
