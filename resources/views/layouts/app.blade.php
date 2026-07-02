<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $profile->name }} | {{ $profile->title }}</title>
    <meta name="description" content="Portofolio Profesional {{ $profile->name }} — {{ $profile->title }}. Fokus pada integrasi estetika UI/UX dan keandalan sistem.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --font-heading: 'Poppins', system-ui, sans-serif;
            --font-body:    'Inter',   system-ui, sans-serif;
        }
        html { font-family: var(--font-body); background-color: var(--color-light-bg); }
        h1, h2, h3, h4, .font-heading { font-family: var(--font-heading); }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #2563EB33; border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: #2563EB55; }
        .gradient-text { background: linear-gradient(135deg, #2563EB 0%, #7C3AED 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .glass-card { background: rgba(255,255,255,0.85); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(226,232,240,0.8); transition: all 0.4s cubic-bezier(0.16,1,0.3,1); box-shadow: 0 4px 30px rgba(0,0,0,0.02); }
        .glass-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px -10px rgba(37,99,235,0.12); border-color: rgba(37,99,235,0.25); }
        .floating-shape { position: absolute; border-radius: 50%; filter: blur(100px); pointer-events: none; z-index: 0; animation: float 12s ease-in-out infinite alternate; }
        @keyframes float { 0% { transform: translateY(0px) rotate(0deg) scale(1); } 100% { transform: translateY(-50px) rotate(120deg) scale(1.15); } }
        .nav-link { position: relative; }
        .nav-link::after { content: ''; position: absolute; bottom: -4px; left: 0; width: 0; height: 2px; background: linear-gradient(90deg, #2563EB, #7C3AED); border-radius: 99px; transition: width 0.3s cubic-bezier(0.16,1,0.3,1); }
        .nav-link:hover::after { width: 100%; }
        .grid-pattern { background-size:30px 30px; background-image: linear-gradient(to right, rgba(148,163,184,0.05) 1px, transparent 1px), linear-gradient(to bottom, rgba(148,163,184,0.05) 1px, transparent 1px); }
    </style>
    <script>
        (function(){
            var stored = localStorage.getItem('theme');
            var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (stored === 'dark' || (!stored && prefersDark)) { document.documentElement.classList.add('dark'); }
        })();
    </script>
</head>
<body class="bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 antialiased relative min-h-screen overflow-x-hidden grid-pattern">
    <!-- Glowing shapes -->
    <div class="floating-shape w-[600px] h-[600px] bg-blue-500/10 top-[-150px] left-[-200px]"></div>
    <div class="floating-shape w-[500px] h-[500px] bg-purple-500/8 bottom-[100px] right-[-150px]" style="animation-delay:-6s;"></div>
    <div class="floating-shape w-[400px] h-[400px] bg-indigo-500/5 top-[40%] left-[30%]" style="animation-delay:-3s;"></div>
    <!-- Navigation Bar -->
    <header id="navbar" class="sticky top-0 z-50 backdrop-blur-lg bg-white/80 dark:bg-slate-800/80 border-b border-slate-200/60 dark:border-slate-700/60 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="#home" class="flex items-center gap-2.5 group">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#2563EB] to-[#7C3AED] flex items-center justify-center text-white font-heading font-extrabold text-base shadow-md group-hover:scale-105 transition-transform duration-300">
                    {{ mb_substr($profile->name,0,1) }}
                </span>
                <span class="text-lg font-heading font-bold text-slate-900 dark:text-slate-100">Putra<span class="text-[#2563EB]">.</span></span>
            </a>
            <nav class="hidden md:flex items-center gap-8">
                <a href="#home" class="nav-link text-sm font-semibold text-slate-600 hover:text-[#2563EB] dark:text-slate-300">Beranda</a>
                <a href="#skills" class="nav-link text-sm font-semibold text-slate-600 hover:text-[#2563EB] dark:text-slate-300">Keahlian</a>
                <a href="#timeline" class="nav-link text-sm font-semibold text-slate-600 hover:text-[#2563EB] dark:text-slate-300">Alur Kerja</a>
                <a href="#projects" class="nav-link text-sm font-semibold text-slate-600 hover:text-[#2563EB] dark:text-slate-300">Portofolio</a>
            </nav>
            <div class="flex items-center gap-4">
                @if(!empty($profile->social_links['github']))
                    <a href="{{ $profile->social_links['github'] }}" target="_blank" class="text-slate-400 hover:text-[#2563EB]" title="GitHub">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                    </a>
                @endif
                @if(!empty($profile->social_links['linkedin']))
                    <a href="{{ $profile->social_links['linkedin'] }}" target="_blank" class="text-slate-400 hover:text-[#2563EB]" title="LinkedIn">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                @endif
                <div class="w-px h-4 bg-slate-200"></div>
                <a href="{{ url('/admin') }}" class="text-xs font-semibold px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-100 text-slate-600">Admin</a>
                <button id="mobile-menu-btn" aria-label="Buka menu" class="flex md:hidden items-center justify-center w-10 h-10 rounded-xl bg-slate-100 text-slate-500 hover:bg-slate-200">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200/50 bg-white/95 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col gap-1.5">
                <a href="#home" class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100" onclick="closeMobileMenu()">Beranda</a>
                <a href="#skills" class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100" onclick="closeMobileMenu()">Keahlian</a>
                <a href="#timeline" class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100" onclick="closeMobileMenu()">Alur Kerja</a>
                <a href="#projects" class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100" onclick="closeMobileMenu()">Portofolio</a>
            </div>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>
    <footer class="bg-white dark:bg-slate-800 border-t border-slate-200 dark:border-slate-700/60 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-slate-500 dark:text-slate-400">
            © {{ date('Y') }} {{ $profile->name }}. All rights reserved.
        </div>
    </footer>
</body>
</html>
