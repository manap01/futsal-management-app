<!DOCTYPE html>
<html class="dark" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LOGIN | LARAFELL</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "background": "#0e0e13",
                        "surface": "#0e0e13",
                        "primary": "#a4ffb9",
                        "on-primary": "#006532",
                        "surface-container": "#19191f",
                        "on-surface": "#f9f5fd",
                        "on-surface-variant": "#acaab1",
                    },
                    fontFamily: {
                        "headline": ["Space Grotesk"],
                        "body": ["Plus Jakarta Sans"],
                    },
                },
            },
        }
    </script>
    <style>
        .neon-glow {
            box-shadow: 0 0 20px rgba(164, 255, 185, 0.3);
        }
        .glass-card {
            background: rgba(37, 37, 45, 0.6);
            backdrop-filter: blur(20px);
        }
    </style>
</head>

<body class="bg-background text-on-surface font-body flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-6">
        <div class="text-center mb-10">
            <div class="flex justify-center mb-4">
                <span class="material-symbols-outlined text-primary text-5xl">sports_soccer</span>
            </div>
            <h1 class="text-4xl font-black text-on-surface tracking-tighter italic font-headline uppercase">LARAFELL</h1>
            <p class="text-on-surface-variant font-bold uppercase tracking-widest text-xs mt-2">Admin Authentication</p>
        </div>

        <div class="glass-card rounded-[2rem] p-8 border border-white/5 shadow-2xl">
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-500/10 border border-red-500/50 rounded-xl text-red-500 text-xs font-bold uppercase tracking-widest">
                    {{ $errors->first() }}
                </div>
            @endif
            <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="space-y-2">
                    <label class="block font-headline font-bold text-xs uppercase tracking-widest text-primary ml-1">Email / Username</label>
                    <input type="text" name="email" placeholder="putsall123@gmail.com" 
                        class="w-full bg-surface-container border-none text-on-surface px-6 py-4 rounded-xl focus:ring-2 focus:ring-primary transition-all font-headline font-bold uppercase tracking-tight" required />
                </div>
                <div class="space-y-2">
                    <label class="block font-headline font-bold text-xs uppercase tracking-widest text-primary ml-1">Password</label>
                    <input type="password" name="password" placeholder="••••••••" 
                        class="w-full bg-surface-container border-none text-on-surface px-6 py-4 rounded-xl focus:ring-2 focus:ring-primary transition-all font-headline font-bold uppercase tracking-tight" required />
                </div>
                <div class="flex items-center justify-between text-xs font-bold uppercase tracking-tighter">
                    <label class="flex items-center gap-2 cursor-pointer text-on-surface-variant hover:text-on-surface transition-colors">
                        <input type="checkbox" name="remember" class="rounded bg-surface-container border-none text-primary focus:ring-0" />
                        Remember Me
                    </label>
                    <a href="#" class="text-primary hover:underline">Forgot Access?</a>
                </div>
                <button type="submit" 
                    class="w-full bg-primary py-4 rounded-xl text-on-primary font-headline font-black text-lg uppercase tracking-widest hover:bg-primary-fixed hover:shadow-[0_0_20px_rgba(164,255,185,0.4)] transition-all duration-300 active:scale-95">
                    Enter Stadium
                </button>
            </form>
        </div>
        
        <p class="text-center mt-8 text-on-surface-variant text-xs font-bold uppercase tracking-widest">
            <a href="{{ url('/') }}" class="hover:text-primary transition-colors flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-sm">arrow_back</span> Back to Public Site
            </a>
        </p>
    </div>
</body>

</html>
