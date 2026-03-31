<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'LARAFELL ARENA PRO - Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700&amp;display=swap"
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
                        "on-surface": "#f9f5fd",
                        "on-tertiary-fixed": "#390013",
                        "surface-container": "#19191f",
                        "background": "#0e0e13",
                        "primary-fixed": "#00fd87",
                        "primary-container": "#00fd87",
                        "secondary-dim": "#ea8900",
                        "surface-container-low": "#131319",
                        "on-primary-fixed-variant": "#006632",
                        "surface-container-lowest": "#000000",
                        "primary-fixed-dim": "#00ed7e",
                        "on-tertiary-container": "#000000",
                        "on-primary-container": "#005b2c",
                        "tertiary-fixed-dim": "#ff7797",
                        "surface-dim": "#0e0e13",
                        "on-background": "#f9f5fd",
                        "error": "#ff716c",
                        "surface-bright": "#2c2b33",
                        "tertiary-fixed": "#ff8fa6",
                        "on-primary": "#006532",
                        "outline": "#76747b",
                        "primary-dim": "#00ed7e",
                        "surface": "#0e0e13",
                        "on-tertiary": "#48001a",
                        "on-error": "#490006",
                        "tertiary-container": "#fd006d",
                        "inverse-primary": "#006e37",
                        "tertiary": "#ff6c90",
                        "tertiary-dim": "#e50062",
                        "outline-variant": "#48474d",
                        "on-secondary-fixed-variant": "#784400",
                        "surface-container-highest": "#25252d",
                        "on-surface-variant": "#acaab1",
                        "error-container": "#9f0519",
                        "secondary-fixed-dim": "#ffb46b",
                        "on-secondary": "#482600",
                        "inverse-surface": "#fcf8ff",
                        "surface-tint": "#a4ffb9",
                        "secondary": "#fe9400",
                        "on-secondary-container": "#fff6f1",
                        "inverse-on-surface": "#55545b",
                        "error-dim": "#d7383b",
                        "on-tertiary-fixed-variant": "#77002f",
                        "surface-variant": "#25252d",
                        "secondary-fixed": "#ffc794",
                        "on-error-container": "#ffa8a3",
                        "on-primary-fixed": "#004621",
                        "on-secondary-fixed": "#502b00",
                        "secondary-container": "#8c5000",
                        "surface-container-high": "#1f1f26",
                        "primary": "#a4ffb9"
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
        .pitch-pattern {
            background-image: radial-gradient(#a4ffb9 0.5px, transparent 0.5px), linear-gradient(to right, #a4ffb9 0.5px, transparent 0.5px);
            background-size: 24px 24px;
            opacity: 0.03;
        }
        .glass-card {
            background: rgba(37, 37, 45, 0.6);
            backdrop-filter: blur(20px);
        }
    </style>
    @yield('styles')
</head>
<body class="bg-background text-on-surface font-body selection:bg-primary selection:text-on-primary">
    <!-- SideNavBar -->
    <aside
        class="h-screen w-64 fixed left-0 top-0 border-r border-[#ffffff]/10 bg-[#0e0e13]/80 backdrop-blur-xl z-50 flex flex-col p-4 gap-2 font-['Space_Grotesk'] tracking-tight shadow-[0_0_64px_rgba(0,0,0,0.4)]">
        <div class="mb-8 px-4 py-6">
            <h1 class="text-2xl font-black text-[#a4ffb9] tracking-tighter italic uppercase">GARUDA FUTSALL</h1>
            <p class="text-[10px] text-on-surface-variant tracking-[0.2em] uppercase mt-1">GARUDA Management</p>
        </div>
        <nav class="flex-1 space-y-1">
            <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'text-[#a4ffb9] bg-[#00fd87]/10 rounded-xl shadow-[0_0_15px_rgba(0,253,135,0.2)] border-l-4 border-[#a4ffb9]' : 'text-[#f9f5fd]/60 hover:text-[#a4ffb9] hover:bg-[#25252d]' }} transition-transform duration-150 active:scale-95"
                href="{{ route('admin.dashboard') }}">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-bold">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.bookings.*') ? 'text-[#a4ffb9] bg-[#00fd87]/10 rounded-xl shadow-[0_0_15px_rgba(0,253,135,0.2)] border-l-4 border-[#a4ffb9]' : 'text-[#f9f5fd]/60 hover:text-[#a4ffb9] hover:bg-[#25252d]' }} transition-all duration-300"
                href="{{ route('admin.bookings.index') }}">
                <span class="material-symbols-outlined">calendar_today</span>
                <span class="font-bold">Booking</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.courts.*') ? 'text-[#a4ffb9] bg-[#00fd87]/10 rounded-xl shadow-[0_0_15px_rgba(0,253,135,0.2)] border-l-4 border-[#a4ffb9]' : 'text-[#f9f5fd]/60 hover:text-[#a4ffb9] hover:bg-[#25252d]' }} transition-all duration-300"
                href="{{ route('admin.courts.index') }}">
                <span class="material-symbols-outlined">sports_soccer</span>
                <span class="font-bold">Court</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.finance') ? 'text-[#a4ffb9] bg-[#00fd87]/10 rounded-xl shadow-[0_0_15px_rgba(0,253,135,0.2)] border-l-4 border-[#a4ffb9]' : 'text-[#f9f5fd]/60 hover:text-[#a4ffb9] hover:bg-[#25252d]' }} transition-all duration-300"
                href="{{ route('admin.finance') }}">
                <span class="material-symbols-outlined">payments</span>
                <span class="font-bold">Finance</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.reports') ? 'text-[#a4ffb9] bg-[#00fd87]/10 rounded-xl shadow-[0_0_15px_rgba(0,253,135,0.2)] border-l-4 border-[#a4ffb9]' : 'text-[#f9f5fd]/60 hover:text-[#a4ffb9] hover:bg-[#25252d]' }} transition-all duration-300"
                href="{{ route('admin.reports') }}">
                <span class="material-symbols-outlined">analytics</span>
                <span class="font-bold">Reports</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.users.*') ? 'text-[#a4ffb9] bg-[#00fd87]/10 rounded-xl shadow-[0_0_15px_rgba(0,253,135,0.2)] border-l-4 border-[#a4ffb9]' : 'text-[#f9f5fd]/60 hover:text-[#a4ffb9] hover:bg-[#25252d]' }} transition-all duration-300"
                href="{{ route('admin.users.index') }}">
                <span class="material-symbols-outlined">group</span>
                <span class="font-bold">Akun</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.settings') ? 'text-[#a4ffb9] bg-[#00fd87]/10 rounded-xl shadow-[0_0_15px_rgba(0,253,135,0.2)] border-l-4 border-[#a4ffb9]' : 'text-[#f9f5fd]/60 hover:text-[#a4ffb9] hover:bg-[#25252d]' }} transition-all duration-300"
                href="{{ route('admin.settings') }}">
                <span class="material-symbols-outlined">settings</span>
                <span class="font-bold">Settings</span>
            </a>
        </nav>
        <div class="mt-auto pt-4 border-t border-outline-variant/20">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
            <a class="flex items-center gap-3 px-4 py-3 text-[#f9f5fd]/60 hover:text-error transition-all duration-300 cursor-pointer"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="material-symbols-outlined">logout</span>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="ml-64 min-h-screen">
        <!-- TopAppBar -->
        <header
            class="fixed top-0 right-0 w-[calc(100%-16rem)] h-20 z-40 bg-[#0e0e13]/60 backdrop-blur-md flex justify-between items-center px-8 border-b border-white/5">
            <div
                class="flex items-center gap-4 bg-surface-container-highest/50 px-4 py-2 rounded-full border border-white/5 focus-within:ring-1 focus-within:ring-[#a4ffb9]/30 transition-all">
                <span class="material-symbols-outlined text-on-surface-variant">search</span>
                <input
                    class="bg-transparent border-none focus:ring-0 text-sm w-64 text-on-surface placeholder:text-on-surface-variant font-body"
                    placeholder="Search court or booking..." type="text" />
            </div>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4">
                    <button class="relative text-on-surface-variant hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="absolute -top-1 -right-1 w-2 h-2 bg-secondary rounded-full"></span>
                    </button>
                </div>
                <div class="h-8 w-[1px] bg-outline-variant/30"></div>
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-xs font-bold font-headline uppercase tracking-wider text-on-surface">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] text-primary uppercase font-bold tracking-tighter">Superuser</p>
                    </div>
                    <img alt="Admin Avatar" class="w-10 h-10 rounded-full border-2 border-primary/20 object-cover"
                        src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=a4ffb9&color=006532" />
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="pt-28 pb-12 px-8 max-w-7xl mx-auto space-y-8">
            @yield('content')
        </div>
    </main>
    @yield('scripts')
</body>
</html>
