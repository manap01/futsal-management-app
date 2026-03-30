@extends('layouts.admin')

@section('title', 'Tambah Lapangan Baru - Admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10">
        <h2 class="text-4xl font-headline font-black text-on-surface tracking-tight uppercase">Tambah Arena Baru</h2>
        <p class="text-on-surface-variant font-label text-sm uppercase tracking-[0.2em] mt-1">Konfigurasi spesifikasi lapangan LARAGON</p>
    </div>

    <div class="glass-card p-10 rounded-3xl border border-white/5 shadow-2xl">
        <form action="{{ route('admin.courts.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-2">
                <label class="block font-headline font-bold text-xs uppercase tracking-widest text-primary ml-1">Nama Lapangan</label>
                <input type="text" name="name" placeholder="Contoh: Lapangan Utama" 
                    class="w-full bg-surface-container border-none text-on-surface px-6 py-4 rounded-xl focus:ring-2 focus:ring-primary transition-all font-headline font-bold uppercase tracking-tight" required />
            </div>
            <div class="space-y-2">
                <label class="block font-headline font-bold text-xs uppercase tracking-widest text-primary ml-1">Tipe Permukaan</label>
                <input type="text" name="type" placeholder="Contoh: Synthetic Pro A" 
                    class="w-full bg-surface-container border-none text-on-surface px-6 py-4 rounded-xl focus:ring-2 focus:ring-primary transition-all font-headline font-bold uppercase tracking-tight" required />
            </div>
            <div class="space-y-2">
                <label class="block font-headline font-bold text-xs uppercase tracking-widest text-primary ml-1">Harga Per Jam (Rp)</label>
                <input type="number" name="price_per_hour" placeholder="Contoh: 150000" 
                    class="w-full bg-surface-container border-none text-on-surface px-6 py-4 rounded-xl focus:ring-2 focus:ring-primary transition-all font-headline font-bold uppercase tracking-tight" required />
            </div>
            <div class="space-y-2">
                <label class="block font-headline font-bold text-xs uppercase tracking-widest text-primary ml-1">URL Gambar</label>
                <input type="text" name="image" placeholder="https://..." 
                    class="w-full bg-surface-container border-none text-on-surface px-6 py-4 rounded-xl focus:ring-2 focus:ring-primary transition-all font-headline font-bold uppercase tracking-tight" required />
            </div>
            <div class="space-y-2">
                <label class="block font-headline font-bold text-xs uppercase tracking-widest text-primary ml-1">Deskripsi / Fitur (Pisahkan dengan koma)</label>
                <textarea name="description" rows="3" placeholder="Contoh: FIFA Standard, Premium Turf, LED Lighting" 
                    class="w-full bg-surface-container border-none text-on-surface px-6 py-4 rounded-xl focus:ring-2 focus:ring-primary transition-all font-headline font-bold uppercase tracking-tight" required></textarea>
            </div>
            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-primary py-5 rounded-xl text-on-primary font-headline font-black text-lg uppercase tracking-widest hover:bg-primary-fixed hover:shadow-[0_0_20px_rgba(164,255,185,0.4)] transition-all duration-300 active:scale-95">
                    SIMPAN ARENA
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
