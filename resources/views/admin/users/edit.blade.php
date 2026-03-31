@extends('layouts.admin')

@section('title', 'Edit Akun - Admin')

@section('content')
<div class="flex items-center gap-4 mb-8">
    <a href="{{ route('admin.users.index') }}" class="w-10 h-10 bg-surface-container rounded-xl flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors border border-white/5">
        <span class="material-symbols-outlined text-sm">arrow_back</span>
    </a>
    <div>
        <h2 class="text-4xl font-headline font-black text-on-surface tracking-tight uppercase italic">Edit <span class="text-primary">Akun</span></h2>
        <p class="text-on-surface-variant font-label text-sm uppercase tracking-[0.2em] mt-1">Perbarui akses admin Garuda Futsall</p>
    </div>
</div>

<div class="glass-card rounded-3xl p-8 border border-white/5 max-w-2xl mx-auto">
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="space-y-2">
            <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Nama Lengkap *</label>
            <input type="text" name="name" class="w-full bg-surface-container-low border-b border-outline-variant p-4 font-headline font-medium text-lg focus:border-primary transition-colors text-on-surface" placeholder="Nama admin..." value="{{ old('name', $user->name) }}" required>
            @error('name')<p class="text-error text-[10px] font-bold uppercase tracking-widest mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="space-y-2">
            <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Email Address *</label>
            <input type="email" name="email" class="w-full bg-surface-container-low border-b border-outline-variant p-4 font-headline font-medium text-lg focus:border-primary transition-colors text-on-surface" placeholder="email@example.com..." value="{{ old('email', $user->email) }}" required>
            @error('email')<p class="text-error text-[10px] font-bold uppercase tracking-widest mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="p-4 bg-primary/5 rounded-xl border border-primary/20 mb-6">
            <p class="text-[10px] text-primary/80 font-bold uppercase tracking-widest">Kosongkan password jika tidak ingin mengubahnya.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Password Baru</label>
                <input type="password" name="password" class="w-full bg-surface-container-low border-b border-outline-variant p-4 font-headline font-medium text-lg focus:border-primary transition-colors text-on-surface" placeholder="••••••••">
                @error('password')<p class="text-error text-[10px] font-bold uppercase tracking-widest mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="space-y-2">
                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="w-full bg-surface-container-low border-b border-outline-variant p-4 font-headline font-medium text-lg focus:border-primary transition-colors text-on-surface" placeholder="••••••••">
            </div>
        </div>

        <div class="pt-6">
            <button type="submit" class="w-full bg-primary text-on-primary py-4 rounded-xl font-bold uppercase tracking-widest hover:shadow-[0_0_20px_rgba(164,255,185,0.4)] transition-all flex items-center justify-center gap-3">
                <span class="material-symbols-outlined">save</span>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
