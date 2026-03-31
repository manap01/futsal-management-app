@extends('layouts.admin')

@section('title', 'Manajemen Akun - Admin')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h2 class="text-4xl font-headline font-black text-on-surface tracking-tight uppercase italic">Manajemen <span class="text-primary">Akun</span></h2>
        <p class="text-on-surface-variant font-label text-sm uppercase tracking-[0.2em] mt-1">Kelola akses admin Garuda Futsall</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="bg-primary text-on-primary px-6 py-2 rounded-xl font-bold text-xs uppercase tracking-widest hover:shadow-[0_0_20px_rgba(164,255,185,0.4)] transition-all flex items-center gap-2">
        <span class="material-symbols-outlined text-sm">person_add</span>
        Tambah Akun
    </a>
</div>

@if(session('success'))
<div class="bg-primary/10 border border-primary/20 text-primary px-6 py-4 rounded-xl mb-6 flex items-center gap-3">
    <span class="material-symbols-outlined">check_circle</span>
    <span class="font-bold uppercase text-xs tracking-widest">{{ session('success') }}</span>
</div>
@endif

@if(session('error'))
<div class="bg-error/10 border border-error/20 text-error px-6 py-4 rounded-xl mb-6 flex items-center gap-3">
    <span class="material-symbols-outlined">error</span>
    <span class="font-bold uppercase text-xs tracking-widest">{{ session('error') }}</span>
</div>
@endif

<div class="glass-card rounded-3xl border border-white/5 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-surface-container/50 border-b border-white/5 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">
                    <th class="px-8 py-4">Nama</th>
                    <th class="px-8 py-4">Email</th>
                    <th class="px-8 py-4">Dibuat Pada</th>
                    <th class="px-8 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($users as $user)
                <tr class="hover:bg-primary/5 transition-colors group">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <span class="font-headline font-bold text-on-surface uppercase italic tracking-tighter">{{ $user->name }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5 text-on-surface-variant text-sm">{{ $user->email }}</td>
                    <td class="px-8 py-5 text-on-surface-variant text-sm uppercase tracking-widest">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="p-2 bg-surface-container-high rounded-lg text-on-surface-variant hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </a>
                            @if(auth()->id() !== $user->id)
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-surface-container-high rounded-lg text-on-surface-variant hover:text-error transition-colors">
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
