<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'LARAFELL ARENA PRO | Book Your Game')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;800;900&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "background": "#0e0e13",
                        "surface-bright": "#2c2b33",
                        "on-surface": "#f9f5fd",
                        "on-tertiary-fixed": "#390013",
                        "outline": "#76747b",
                        "error": "#ff716c",
                        "secondary-dim": "#ea8900",
                        "surface-dim": "#0e0e13",
                        "secondary-fixed": "#ffc794",
                        "surface-container": "#19191f",
                        "surface-tint": "#a4ffb9",
                        "on-secondary-fixed-variant": "#784400",
                        "primary-container": "#00fd87",
                        "on-error-container": "#ffa8a3",
                        "on-secondary": "#482600",
                        "primary": "#a4ffb9",
                        "on-primary-container": "#005b2c",
                        "inverse-on-surface": "#55545b",
                        "on-surface-variant": "#acaab1",
                        "on-tertiary-container": "#000000",
                        "surface-container-lowest": "#000000",
                        "inverse-primary": "#006e37",
                        "tertiary": "#ff6c90",
                        "on-primary": "#006532",
                        "secondary-fixed-dim": "#ffb46b",
                        "secondary": "#fe9400",
                        "on-primary-fixed": "#004621",
                        "error-container": "#9f0519",
                        "surface-container-high": "#1f1f26",
                        "tertiary-dim": "#e50062",
                        "surface-variant": "#25252d",
                        "on-background": "#f9f5fd",
                        "tertiary-container": "#fd006d",
                        "tertiary-fixed": "#ff8fa6",
                        "on-error": "#490006",
                        "tertiary-fixed-dim": "#ff7797",
                        "primary-dim": "#00ed7e",
                        "primary-fixed": "#00fd87",
                        "on-primary-fixed-variant": "#006632",
                        "surface-container-highest": "#25252d",
                        "surface-container-low": "#131319",
                        "secondary-container": "#8c5000",
                        "on-tertiary-fixed-variant": "#77002f",
                        "on-secondary-container": "#fff6f1",
                        "primary-fixed-dim": "#00ed7e",
                        "error-dim": "#d7383b",
                        "inverse-surface": "#fcf8ff",
                        "on-secondary-fixed": "#502b00",
                        "outline-variant": "#48474d",
                        "on-tertiary": "#48001a",
                        "surface": "#0e0e13"
                    },
                    fontFamily: {
                        "headline": ["Space Grotesk"],
                        "body": ["Plus Jakarta Sans"],
                        "label": ["Plus Jakarta Sans"]
                    },
                    borderRadius: { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .neon-glow { box-shadow: 0 0 15px rgba(164, 255, 185, 0.4); }
        .arena-card-overlay {
            background-image: radial-gradient(circle at 2px 2px, rgba(164, 255, 185, 0.03) 1px, transparent 0);
            background-size: 24px 24px;
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.33); opacity: 1; }
            80%, 100% { opacity: 0; }
        }
        .animate-pulse-ring::before {
            content: '';
            position: absolute;
            width: 300%;
            height: 300%;
            border-radius: 9999px;
            background-color: currentColor;
            animation: pulse-ring 1.5s cubic-bezier(0.455, 0.03, 0.515, 0.955) infinite;
        }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    @yield('styles')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-background text-on-surface font-body selection:bg-primary selection:text-on-primary">
    <!-- TopNavBar -->
    <nav class="fixed top-0 w-full z-50 bg-[#0e0e13]/80 backdrop-blur-xl shadow-[0_4px_30px_rgba(0,0,0,0.5)]">
        <div class="flex justify-between items-center px-8 h-20 max-w-7xl mx-auto">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-primary text-3xl">sports_soccer</span>
                <span class="text-2xl font-black text-[#f9f5fd] tracking-tighter italic font-headline uppercase">LARAFELL ARENA</span>
            </div>
            <div class="hidden md:flex gap-8 items-center font-headline font-bold tracking-tight uppercase">
                <a class="{{ request()->routeIs('home') ? 'text-[#a4ffb9] border-b-2 border-[#a4ffb9] pb-1' : 'text-[#f9f5fd]/70 hover:text-[#a4ffb9] transition-colors' }}" href="{{ route('home') }}">Beranda</a>
                <a class="{{ request()->is('lapangan') ? 'text-[#a4ffb9] border-b-2 border-[#a4ffb9] pb-1' : 'text-[#f9f5fd]/70 hover:text-[#a4ffb9] transition-colors' }}" href="{{ url('/lapangan') }}">Lapangan</a>
                <a class="{{ request()->is('jadwal') ? 'text-[#a4ffb9] border-b-2 border-[#a4ffb9] pb-1' : 'text-[#f9f5fd]/70 hover:text-[#a4ffb9] transition-colors' }}" href="{{ url('/jadwal') }}">Jadwal</a>
                <a class="{{ request()->routeIs('booking.*') ? 'text-[#a4ffb9] border-b-2 border-[#a4ffb9] pb-1' : 'text-[#f9f5fd]/70 hover:text-[#a4ffb9] transition-colors' }}" href="{{ route('booking.index') }}">Booking</a>
                <a class="{{ request()->is('kontak') ? 'text-[#a4ffb9] border-b-2 border-[#a4ffb9] pb-1' : 'text-[#f9f5fd]/70 hover:text-[#a4ffb9] transition-colors' }}" href="{{ url('/kontak') }}">Kontak</a>
            </div>
            @auth
                <a href="{{ route('admin.dashboard') }}"
                    class="bg-primary text-on-primary px-6 py-2 rounded-xl font-headline font-bold uppercase tracking-widest text-sm hover:bg-primary-fixed transition-all active:scale-95 duration-150 neon-glow">
                    DASHBOARD
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="bg-primary text-on-primary px-6 py-2 rounded-xl font-headline font-bold uppercase tracking-widest text-sm hover:bg-primary-fixed transition-all active:scale-95 duration-150 neon-glow">
                    LOGIN
                </a>
            @endauth
        </div>
        <div class="bg-gradient-to-r from-transparent via-[#a4ffb9]/10 to-transparent h-[1px] w-full absolute bottom-0"></div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#0e0e13] border-t border-[#25252d] font-body text-sm">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 px-12 py-16 w-full max-w-7xl mx-auto">
            <div class="col-span-1 md:col-span-1">
                <span class="text-lg font-bold text-[#f9f5fd] block mb-6 font-headline italic tracking-tighter uppercase">LARAFELL ARENA PRO</span>
                <p class="text-[#f9f5fd]/40 mb-6 leading-relaxed">The ultimate destination for premium indoor and outdoor futsal competition in LARAGON. Professional grade surfaces, elite atmosphere.</p>
            </div>
            <div>
                <h5 class="text-[#f9f5fd] font-bold uppercase tracking-widest mb-6">Explore</h5>
                <div class="flex flex-col gap-4">
                    <a class="text-[#f9f5fd]/40 hover:text-[#fe9400] transition-opacity" href="#">Operating Hours</a>
                    <a class="text-[#f9f5fd]/40 hover:text-[#fe9400] transition-opacity" href="#">Arena Rules</a>
                    <a class="text-[#f9f5fd]/40 hover:text-[#fe9400] transition-opacity" href="#">Tournament Schedule</a>
                </div>
            </div>
            <div>
                <h5 class="text-[#f9f5fd] font-bold uppercase tracking-widest mb-6">Contact</h5>
                <div class="flex flex-col gap-4">
                    <a class="text-[#f9f5fd]/40 hover:text-[#fe9400] underline decoration-2 underline-offset-4" href="#">WhatsApp</a>
                    <a class="text-[#f9f5fd]/40 hover:text-[#fe9400] underline decoration-2 underline-offset-4" href="#">Instagram</a>
                    <a class="text-[#f9f5fd]/40 hover:text-[#fe9400] underline decoration-2 underline-offset-4" href="#">TikTok</a>
                </div>
            </div>
            <div>
                <h5 class="text-[#f9f5fd] font-bold uppercase tracking-widest mb-6">Location</h5>
                <p class="text-[#f9f5fd]/40 leading-relaxed">
                    Jl. Atletik No. 88, LARAGON Sport Center Hub<br />
                    Jakarta Selatan, Indonesia<br />
                    12345
                </p>
                <div class="mt-4 flex items-center gap-2 text-[#fe9400] font-bold">
                    <span class="material-symbols-outlined">location_on</span>
                    <span>View on Maps</span>
                </div>
            </div>
        </div>
        <div class="px-12 py-6 border-t border-[#25252d] text-center">
            <p class="text-[#f9f5fd]/40 text-[10px] tracking-widest uppercase">© 2024 LARAFELL ARENA PRO. ALL RIGHTS RESERVED.</p>
        </div>
    </footer>

    @yield('scripts')
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            icon: 'success',
            background: '#19191f',
            color: '#f9f5fd',
            confirmButtonColor: '#a4ffb9',
            confirmButtonText: 'OKE SIAP'
        });
    </script>
    @endif
</body>
</html>
