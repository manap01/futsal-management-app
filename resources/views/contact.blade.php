@extends('layouts.app')

@section('title', 'Kontak | LARAFELL')

@section('content')
<div class="pt-12 pb-20 px-4 md:px-8 max-w-7xl mx-auto min-h-screen">
    <div class="max-w-4xl mb-16 text-center mx-auto">
        <h2 class="font-headline font-black text-5xl md:text-7xl tracking-tighter uppercase leading-none mb-4 italic">
            HUBUNGI <span class="text-primary italic">KAMI</span>
        </h2>
        <p class="text-on-surface-variant text-lg max-w-xl font-body mx-auto">
            Dapatkan bantuan atau informasi lebih lanjut tentang penyewaan lapangan di LARAFELL.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mt-24">
        <!-- Contact Form -->
        <div class="bg-surface-container p-10 rounded-2xl border border-outline-variant/10 shadow-2xl">
            <h3 class="font-headline font-black text-2xl uppercase italic tracking-tighter mb-8 border-b border-outline-variant/20 pb-4">KIRIM PESAN</h3>
            <form action="#" class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan nama Anda..." class="w-full bg-transparent border-b border-outline-variant py-3 text-lg font-headline font-bold focus:border-primary transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant">Email</label>
                    <input type="email" placeholder="Masukkan email Anda..." class="w-full bg-transparent border-b border-outline-variant py-3 text-lg font-headline font-bold focus:border-primary transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant">Pesan</label>
                    <textarea rows="4" placeholder="Tuliskan pesan Anda..." class="w-full bg-transparent border-b border-outline-variant py-3 text-lg font-headline font-bold focus:border-primary transition-all"></textarea>
                </div>
                <button type="submit" class="w-full mt-10 py-5 bg-primary text-on-primary font-headline font-black uppercase tracking-[0.2em] rounded-xl hover:bg-primary-fixed transition-all neon-glow">
                    KIRIM PESAN
                </button>
            </form>
        </div>

        <!-- Info Panels -->
        <div class="space-y-12">
            <div class="p-8 bg-surface-container-low rounded-2xl border border-outline-variant/10">
                <div class="flex items-center gap-6">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-3xl">location_on</span>
                    </div>
                    <div>
                        <h4 class="font-headline font-bold uppercase tracking-widest mb-1">Lokasi Arena</h4>
                        <p class="text-on-surface-variant text-sm font-body leading-relaxed">Jl. Atletik No. 88, LARAGON Sport Center Hub, Jakarta Selatan</p>
                    </div>
                </div>
            </div>
            <div class="p-8 bg-surface-container-low rounded-2xl border border-outline-variant/10">
                <div class="flex items-center gap-6">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-3xl">phone_iphone</span>
                    </div>
                    <div>
                        <h4 class="font-headline font-bold uppercase tracking-widest mb-1">WhatsApp Kami</h4>
                        <p class="text-on-surface-variant text-sm font-body leading-relaxed">+62 812 3456 7890 (Admin LARAFELL)</p>
                    </div>
                </div>
            </div>
            <div class="p-8 bg-surface-container-low rounded-2xl border border-outline-variant/10">
                <div class="flex items-center gap-6">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-3xl">mail</span>
                    </div>
                    <div>
                        <h4 class="font-headline font-bold uppercase tracking-widest mb-1">Email</h4>
                        <p class="text-on-surface-variant text-sm font-body leading-relaxed">info@larafell.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
