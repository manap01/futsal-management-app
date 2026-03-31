@extends('layouts.app')

@section('title', 'BOOKING - LARAFELL ARENA PRO')

@section('styles')
<style>
    .glass-card {
        background: rgba(37, 37, 45, 0.6);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }
    .neon-glow-primary { box-shadow: 0 0 20px rgba(164, 255, 185, 0.2); }
    input:focus, select:focus, textarea:focus {
        outline: none;
        border-bottom: 2px solid #a4ffb9 !important;
    }
    .slot-btn.selected {
        background: rgba(254, 148, 0, 0.1);
        color: #fe9400;
        border: 2px solid #fe9400;
        box-shadow: 0 0 15px rgba(254, 148, 0, 0.2);
    }
    .court-card.selected {
        border: 2px solid #a4ffb9;
        box-shadow: 0 0 20px rgba(164, 255, 185, 0.2);
    }
</style>
@endsection

@section('content')
<main class="pt-32 pb-20 px-4 md:px-8 max-w-7xl mx-auto min-h-screen">
    <!-- Booking Stepper -->
    <div class="mb-16 flex justify-between items-center max-w-4xl mx-auto relative">
        <div class="absolute top-1/2 left-0 w-full h-[2px] bg-surface-container-highest -z-10 -translate-y-1/2"></div>
        <div class="flex flex-col items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center font-headline font-bold text-lg neon-glow-primary" id="step-1-circle">1</div>
            <span class="text-xs font-headline font-bold tracking-widest uppercase text-primary" id="step-1-label">LAPANGAN</span>
        </div>
        <div class="flex flex-col items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center font-headline font-bold text-lg" id="step-2-circle">2</div>
            <span class="text-xs font-headline font-bold tracking-widest uppercase text-on-surface-variant" id="step-2-label">JADWAL</span>
        </div>
        <div class="flex flex-col items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center font-headline font-bold text-lg" id="step-3-circle">3</div>
            <span class="text-xs font-headline font-bold tracking-widest uppercase text-on-surface-variant" id="step-3-label">DATA</span>
        </div>
        <div class="flex flex-col items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center font-headline font-bold text-lg" id="step-4-circle">4</div>
            <span class="text-xs font-headline font-bold tracking-widest uppercase text-on-surface-variant" id="step-4-label">PEMBAYARAN</span>
        </div>
        <div class="flex flex-col items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center font-headline font-bold text-lg" id="step-5-circle">5</div>
            <span class="text-xs font-headline font-bold tracking-widest uppercase text-on-surface-variant" id="step-5-label">KONFIRMASI</span>
        </div>
    </div>

    @if($errors->any())
        <div class="mb-8 p-4 bg-red-500/10 border border-red-500/50 rounded-xl text-red-500 text-sm font-bold uppercase tracking-widest">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data" id="booking-form">
        @csrf
        <input type="hidden" name="court_id" id="input-court-id" value="{{ $selectedCourt->id ?? '' }}" required>
        <input type="hidden" name="date" id="input-date" value="{{ $prefill['date'] ?? date('Y-m-d') }}" required>
        <input type="hidden" name="start_time" id="input-start-time" value="{{ $prefill['time'] ?? '' }}" required>

        <section class="space-y-12">
            <div class="max-w-4xl">
                <h2 class="font-headline font-black text-5xl md:text-7xl tracking-tighter uppercase leading-none mb-4 italic">
                    Amankan <span class="text-primary italic">Arena</span> Anda
                </h2>
                <p class="text-on-surface-variant text-lg max-w-xl font-body">
                    Pilih lapangan terbaik dan tentukan waktu bertanding. Rasakan atmosfer profesional di setiap menit permainan.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-8 space-y-16">
                    <!-- STEP 1: PILIH LAPANGAN -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <span class="text-primary font-headline font-bold tracking-widest text-sm uppercase">01 / PILIH LAPANGAN</span>
                            <div class="h-[1px] flex-grow bg-surface-container-highest"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($courts as $court)
                            <div class="court-card glass-card rounded-xl overflow-hidden border border-outline-variant/20 cursor-pointer transition-all duration-300 {{ (isset($selectedCourt) && $selectedCourt->id == $court->id) ? 'selected' : '' }}" 
                                 data-id="{{ $court->id }}" 
                                 data-name="{{ $court->name }}" 
                                 data-price="{{ $court->price_per_hour }}"
                                 onclick="selectCourt(this)">
                                <div class="h-48 relative">
                                    <img class="w-full h-full object-cover opacity-80" src="{{ $court->image }}" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
                                </div>
                                <div class="p-5 space-y-2">
                                    <h4 class="font-headline font-bold text-xl uppercase tracking-tight">{{ $court->name }}</h4>
                                    <div class="flex items-center gap-2 text-on-surface-variant text-xs">
                                        <span class="material-symbols-outlined text-sm">grid_view</span>
                                        <span>{{ $court->type }}</span>
                                    </div>
                                    <p class="text-primary font-headline font-bold text-lg mt-2 italic">Rp {{ number_format($court->price_per_hour/1000, 0) }}k <span class="text-[10px] font-normal text-on-surface-variant lowercase">/ jam</span></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- STEP 2: PILIH JADWAL -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <span class="text-on-surface-variant font-headline font-bold tracking-widest text-sm uppercase">02 / PILIH JADWAL</span>
                            <div class="h-[1px] flex-grow bg-surface-container-highest"></div>
                        </div>
                        <div class="glass-card p-8 rounded-xl space-y-8">
                            <div class="flex gap-4 overflow-x-auto pb-4 no-scrollbar">
                                @for($i = 0; $i < 7; $i++)
                                @php $d = now()->addDays($i); @endphp
                                <button type="button" 
                                    data-date="{{ $d->format('Y-m-d') }}"
                                    data-label="{{ $i == 0 ? 'Hari Ini' : $d->translatedFormat('D') }}"
                                    onclick="selectDate(this)"
                                    class="date-btn flex-shrink-0 w-20 h-24 rounded-lg {{ $i == 0 ? 'bg-primary text-on-primary neon-glow-primary' : 'bg-surface-container-highest border border-outline-variant/20 text-on-surface-variant' }} flex flex-col items-center justify-center gap-1 font-headline hover:border-primary/50 transition-colors">
                                    <span class="text-[10px] uppercase font-bold tracking-widest opacity-80">{{ $i == 0 ? 'Hari Ini' : $d->translatedFormat('D') }}</span>
                                    <span class="text-2xl font-black italic">{{ $d->format('d') }}</span>
                                    <span class="text-[10px] uppercase font-bold tracking-widest">{{ $d->translatedFormat('M') }}</span>
                                </button>
                                @endfor
                            </div>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <h5 class="font-headline font-bold uppercase tracking-widest text-sm italic">Sesi Tersedia</h5>
                                    <div class="flex gap-4 text-[10px] font-bold tracking-widest uppercase">
                                        <div class="flex items-center gap-1.5"><div class="w-2 h-2 rounded-full bg-primary"></div> Tersedia</div>
                                        <div class="flex items-center gap-1.5"><div class="w-2 h-2 rounded-full bg-secondary"></div> Dipilih</div>
                                        <div class="flex items-center gap-1.5"><div class="w-2 h-2 rounded-full bg-tertiary"></div> Penuh</div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-3">
                                    @for($h = 8; $h <= 23; $h++)
                                    @php $time = sprintf('%02d:00', $h); @endphp
                                    <button type="button" 
                                        data-time="{{ $time }}"
                                        onclick="selectTime(this)"
                                        class="slot-btn py-3 px-2 rounded-lg bg-surface-container-highest border border-outline-variant/20 hover:border-primary transition-all font-headline font-bold text-center text-sm">
                                        {{ $time }}
                                    </button>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3: DATA PEMESAN -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <span class="text-on-surface-variant font-headline font-bold tracking-widest text-sm uppercase">03 / DATA PEMESAN</span>
                            <div class="h-[1px] flex-grow bg-surface-container-highest"></div>
                        </div>
                        <div class="glass-card p-8 rounded-xl grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Nama Tim / Pemesan *</label>
                                <input type="text" name="customer_name" oninput="checkStep4()"
                                    class="w-full bg-surface-container-low border-b border-outline-variant p-4 font-headline font-medium text-lg focus:border-primary transition-colors" placeholder="Masukkan nama..." required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">Durasi (Jam) *</label>
                                <input type="number" name="duration" min="1" max="10" value="1" id="input-duration" oninput="updateTotal()"
                                    class="w-full bg-surface-container-low border-b border-outline-variant p-4 font-headline font-medium text-lg focus:border-primary transition-colors" required>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 4: KONTAK & PEMBAYARAN -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <span class="text-on-surface-variant font-headline font-bold tracking-widest text-sm uppercase">04 / KONTAK & PEMBAYARAN</span>
                            <div class="h-[1px] flex-grow bg-surface-container-highest"></div>
                        </div>
                        <div class="glass-card p-8 rounded-xl space-y-8">
                            <div class="p-6 bg-primary/10 border border-primary/20 rounded-2xl mb-6">
                                <h4 class="text-primary font-headline font-bold uppercase tracking-widest text-xs mb-3 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    Informasi Pembayaran
                                </h4>
                                <div class="space-y-2">
                                    <p class="text-on-surface text-sm font-bold italic tracking-tight">BANK BCA</p>
                                    <p class="text-2xl font-black font-headline text-primary tracking-tighter italic">1234567890</p>
                                    <p class="text-[10px] text-on-surface-variant font-bold uppercase tracking-widest">A/N GARUDA FUTSALL ARENA</p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-on-surface-variant">No WhatsApp *</label>
                                <input type="tel" name="customer_phone" class="w-full bg-surface-container-low border-b border-outline-variant p-4 font-headline font-medium text-lg focus:border-primary transition-colors" placeholder="+62 812..." required>
                            </div>
                            <div class="space-y-4">
                                <p class="text-xs text-on-surface-variant uppercase tracking-widest leading-relaxed">
                                    Silakan transfer DP minimal <span class="text-primary font-bold">Rp 50.000</span> ke rekening:<br/>
                                    <span class="text-on-surface font-bold">BCA 12345678 a/n LARAFELL ARENA</span>
                                </p>
                                <div class="space-y-2">
                                    <label class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant">Upload Bukti Transfer</label>
                                    <input type="file" name="payment_proof" class="w-full text-sm text-on-surface-variant file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: SUMMARY -->
                <div class="lg:col-span-4">
                    <div class="sticky top-28 space-y-6">
                        <div class="flex items-center gap-4">
                            <span class="text-on-surface-variant font-headline font-bold tracking-widest text-sm uppercase">05 / KONFIRMASI</span>
                            <div class="h-[1px] flex-grow bg-surface-container-highest"></div>
                        </div>
                        <div class="glass-card rounded-xl overflow-hidden relative border border-outline-variant/30">
                            <div class="absolute -top-12 -right-12 w-40 h-40 bg-primary/20 blur-[60px] rounded-full"></div>
                            <div class="p-8 space-y-8 relative">
                                <h3 class="font-headline font-black text-2xl italic uppercase tracking-tight">Ringkasan Pesanan</h3>
                                <div class="space-y-6">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Lapangan</p>
                                            <p class="font-headline font-bold text-lg" id="summary-court">{{ $selectedCourt->name ?? '---' }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Waktu</p>
                                            <p class="font-headline font-bold text-lg" id="summary-time">---</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Tanggal</p>
                                            <p class="font-headline font-bold text-lg italic uppercase" id="summary-date">{{ date('d M Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="h-[1px] w-full bg-outline-variant/30 border-dashed border-b"></div>
                                    <div class="pt-4 flex justify-between items-end">
                                        <p class="font-headline font-black text-xs uppercase tracking-widest text-primary italic">TOTAL ESTIMASI</p>
                                        <p class="font-headline font-black text-3xl text-primary italic" id="summary-total">Rp 0</p>
                                    </div>
                                </div>
                                <div class="space-y-4 pt-4">
                                    <label class="flex items-start gap-3 cursor-pointer group">
                                        <input type="checkbox" required class="mt-1 appearance-none w-4 h-4 border-2 border-outline-variant rounded-sm checked:bg-primary checked:border-primary transition-all">
                                        <span class="text-[11px] text-on-surface-variant font-body leading-tight group-hover:text-on-surface transition-colors">
                                            Saya menyetujui syarat & ketentuan serta kebijakan pembatalan yang berlaku di LARAFELL ARENA PRO.
                                        </span>
                                    </label>
                                    <button type="submit" class="w-full bg-primary text-on-primary py-5 rounded-xl font-headline font-black text-xl uppercase tracking-widest italic flex items-center justify-center gap-3 group overflow-hidden relative shadow-[0_10px_30px_rgba(164,255,185,0.3)] hover:scale-[1.02] active:scale-95 transition-all duration-300">
                                        <span class="relative z-10">KONFIRMASI BOOKING</span>
                                        <span class="material-symbols-outlined relative z-10 group-hover:translate-x-2 transition-transform">chevron_right</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</main>
@endsection

@section('scripts')
<script>
    let currentPrice = 0;

    function selectCourt(el) {
        const id = el.getAttribute('data-id');
        const name = el.getAttribute('data-name');
        const price = el.getAttribute('data-price');
        
        document.getElementById('input-court-id').value = id;
        document.getElementById('summary-court').innerText = name;
        currentPrice = parseInt(price);
        updateTotal();
        
        document.querySelectorAll('.court-card').forEach(c => c.classList.remove('selected'));
        el.classList.add('selected');
        
        // Visual feedback for stepper
        document.querySelector('.w-10.bg-primary').classList.add('neon-glow-primary');
    }

    function selectDate(el) {
        const date = el.getAttribute('data-date');
        const label = el.getAttribute('data-label');
        
        document.getElementById('input-date').value = date;
        document.getElementById('summary-date').innerText = date;
        
        document.querySelectorAll('.date-btn').forEach(b => {
            b.classList.remove('bg-primary', 'text-on-primary', 'neon-glow-primary');
            b.classList.add('bg-surface-container-highest', 'text-on-surface-variant');
        });
        el.classList.remove('bg-surface-container-highest', 'text-on-surface-variant');
        el.classList.add('bg-primary', 'text-on-primary', 'neon-glow-primary');
        
        document.getElementById('step-2-circle').classList.replace('bg-surface-container-highest', 'bg-primary');
        document.getElementById('step-2-circle').classList.add('text-on-primary', 'neon-glow-primary');
        document.getElementById('step-2-label').classList.replace('text-on-surface-variant', 'text-primary');
    }

    function selectTime(el) {
        const time = el.getAttribute('data-time');
        
        document.getElementById('input-start-time').value = time;
        document.getElementById('summary-time').innerText = time;
        
        document.querySelectorAll('.slot-btn').forEach(b => b.classList.remove('selected'));
        el.classList.add('selected');

        document.getElementById('step-3-circle').classList.replace('bg-surface-container-highest', 'bg-primary');
        document.getElementById('step-3-circle').classList.add('text-on-primary', 'neon-glow-primary');
        document.getElementById('step-3-label').classList.replace('text-on-surface-variant', 'text-primary');
        updateTotal();
    }

    function updateTotal() {
        const duration = document.getElementById('input-duration').value || 1;
        const total = currentPrice * duration;
        document.getElementById('summary-total').innerText = 'Rp ' + total.toLocaleString('id-ID');
    }

    function checkStep4() {
        const name = document.querySelector('input[name="customer_name"]').value;
        if(name.length > 2) {
            document.getElementById('step-4-circle').classList.replace('bg-surface-container-highest', 'bg-primary');
            document.getElementById('step-4-circle').classList.add('text-on-primary', 'neon-glow-primary');
            document.getElementById('step-4-label').classList.replace('text-on-surface-variant', 'text-primary');
        }
    }

    document.getElementById('booking-form').onsubmit = function(e) {
        const court = document.getElementById('input-court-id').value;
        const time = document.getElementById('input-start-time').value;
        
        if(!court || !time) {
            e.preventDefault();
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silakan pilih lapangan dan jam main terlebih dahulu.',
                icon: 'warning',
                background: '#19191f',
                color: '#f9f5fd',
                confirmButtonColor: '#fe9400'
            });
        } else {
            document.getElementById('step-5-circle').classList.replace('bg-surface-container-highest', 'bg-primary');
            document.getElementById('step-5-circle').classList.add('text-on-primary', 'neon-glow-primary');
            document.getElementById('step-5-label').classList.replace('text-on-surface-variant', 'text-primary');
        }
    };

    // Initialize if court selected from URL
    window.onload = function() {
        const prefillCourtId = "{{ $selectedCourt->id ?? '' }}";
        const prefillDate = "{{ $prefill['date'] ?? '' }}";
        const prefillTime = "{{ $prefill['time'] ?? '' }}";

        if (prefillCourtId) {
            const courtEl = document.querySelector(`.court-card[data-id="${prefillCourtId}"]`);
            if (courtEl) selectCourt(courtEl);
        }

        if (prefillDate) {
            const dateEl = document.querySelector(`.date-btn[data-date="${prefillDate}"]`);
            if (dateEl) selectDate(dateEl);
        }

        if (prefillTime) {
            const timeEl = document.querySelector(`.slot-btn[data-time="${prefillTime}"]`);
            if (timeEl) selectTime(timeEl);
        }

        const selected = document.querySelector('.court-card.selected');
        if (selected && !prefillCourtId) selectCourt(selected);
    };
</script>
@endsection
