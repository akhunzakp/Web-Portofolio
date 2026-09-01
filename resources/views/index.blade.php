<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $profile->name }} | {{ $profile->title }}</title>
    <meta name="description" content="Portofolio Profesional {{ $profile->name }} — {{ $profile->title }}. Fokus pada integrasi estetika UI/UX dan keandalan sistem.">

    {{-- Google Fonts: Poppins (Headings) + Inter (Body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --font-heading: 'Poppins', system-ui, sans-serif;
            --font-body:    'Inter',   system-ui, sans-serif;
        }
        html { 
            font-family: var(--font-body); 
            background-color: #F8FAFC;
        }
        h1, h2, h3, h4, .font-heading { font-family: var(--font-heading); }

        /* Smooth scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track  { background: transparent; }
        ::-webkit-scrollbar-thumb  { background: #2563EB33; border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: #2563EB55; }

        /* Lenis Momentum Scroll CSS */
        html.lenis, html.lenis body {
            height: auto;
        }
        .lenis.lenis-smooth {
            scroll-behavior: auto !important;
        }
        .lenis.lenis-smooth [data-lenis-prevent] {
            overscroll-behavior: contain;
        }
        .lenis.lenis-stopped {
            overflow: hidden;
        }
        .lenis.lenis-smooth iframe {
            pointer-events: none;
        }

        /* Top Scroll Progress Indicator */
        #scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #2563EB 0%, #7C3AED 100%);
            transform-origin: left;
            transform: scaleX(0);
            z-index: 9999;
            pointer-events: none;
            transition: transform 0.1s cubic-bezier(0, 0, 0.2, 1);
        }

        /* Modern Scroll Reveal Utilities */
        .reveal-on-scroll {
            opacity: 0;
            will-change: opacity, transform;
            transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1), 
                        transform 0.85s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal-fade-up {
            transform: translateY(32px);
        }
        .reveal-scale {
            transform: scale(0.94);
        }
        .reveal-left {
            transform: translateX(-32px);
        }
        .reveal-right {
            transform: translateX(32px);
        }
        .reveal-on-scroll.is-revealed {
            opacity: 1;
            transform: translateY(0) translateX(0) scale(1);
        }

        /* Stagger Delays */
        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-400 { transition-delay: 400ms; }
        .delay-500 { transition-delay: 500ms; }

        /* Accessibility: Reduced Motion Fallback */
        @media (prefers-reduced-motion: reduce) {
            .reveal-on-scroll {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
                will-change: auto !important;
            }
            #scroll-progress {
                display: none !important;
            }
        }

        /* Gradient text utility */
        .gradient-text {
            background: linear-gradient(135deg, #2563EB 0%, #7C3AED 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Glassmorphic Cards with Soft Drop Shadows */
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(226, 232, 240, 0.8);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.02);
        }
        .glass-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px -10px rgba(37, 99, 235, 0.12);
            border-color: rgba(37, 99, 235, 0.25);
        }

        /* Floating background shapes */
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            pointer-events: none;
            z-index: 0;
            animation: float 12s ease-in-out infinite alternate;
        }
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg) scale(1); }
            100% { transform: translateY(-50px) rotate(120deg) scale(1.15); }
        }

        /* Nav link hover underline */
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1.5px;
            background: #2563EB; 
            border-radius: 99px;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.35); /* Glow biru halus */
            transition: width 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }   
        .nav-link:hover::after { width: 100%; }

        /* Bento Grid Interactive Highlight Glow */
        .bento-highlight {
            position: relative;
            overflow: hidden;
        }
        .bento-highlight::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(600px circle at var(--x, 0px) var(--y, 0px), rgba(37, 99, 235, 0.06), transparent 50%);
            z-index: 1;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .bento-highlight:hover::before {
            opacity: 1;
        }

        /* Grid Pattern Overlay */
        .grid-pattern {
            background-size: 30px 30px;
            background-image: linear-gradient(to right, rgba(148, 163, 184, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(148, 163, 184, 0.05) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased relative min-h-screen overflow-x-hidden grid-pattern">

    {{-- Top Scroll Progress Indicator Bar --}}
    <div id="scroll-progress" aria-hidden="true"></div>

    {{-- Glowing Blob Elements --}}
    <div class="floating-shape w-[600px] h-[600px] bg-blue-500/10 top-[-150px] left-[-200px]"></div>
    <div class="floating-shape w-[500px] h-[500px] bg-purple-500/8 bottom-[100px] right-[-150px]" style="animation-delay: -6s;"></div>
    <div class="floating-shape w-[400px] h-[400px] bg-indigo-500/5 top-[40%] left-[30%]" style="animation-delay: -3s;"></div>

    {{-- ================================================================
         STICKY GLASSMORPHIC NAVIGATION BAR
    ================================================================ --}}
    <header id="navbar" class="sticky top-0 z-50 backdrop-blur-md bg-white/20 border-b border-slate-200/60 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Branding --}}
                <a href="#home" class="flex items-center gap-2.5 group relative z-10">
                    <span class="text-lg font-heading font-bold text-slate-900 tracking-tight">
                        Visual <span class="text-[#2563EB]">Enthusiast</span>
                    </span>
                </a>

                {{-- Menus --}}
                <nav class="hidden md:flex items-center gap-8">
                    <a href="#home"     class="nav-link active relative py-1 text-sm font-semibold text-[#2563EB] transition-colors duration-200 after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2.5px] after:bg-[#2563EB] after:rounded-full after:shadow-sm after:shadow-blue-500/50" data-lang-id="Beranda" data-lang-en="Home page">Home page</a>
                    <a href="#skills"   class="nav-link active relative py-1 text-sm font-semibold text-[#2563EB] transition-colors duration-200 after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2.5px] after:bg-[#2563EB] after:rounded-full after:shadow-sm after:shadow-blue-500/50" data-lang-id="Pengalaman" data-lang-en="Experience">Experience</a>
                    <a href="#timeline" class="nav-link active relative py-1 text-sm font-semibold text-[#2563EB] transition-colors duration-200 after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2.5px] after:bg-[#2563EB] after:rounded-full after:shadow-sm after:shadow-blue-500/50" data-lang-id="Kemampuan" data-lang-en="Tech Stack">Tech Stack</a>
                    <a href="#projects" class="nav-link active relative py-1 text-sm font-semibold text-[#2563EB] transition-colors duration-200 after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2.5px] after:bg-[#2563EB] after:rounded-full after:shadow-sm after:shadow-blue-500/50" data-lang-id="Proyek" data-lang-en="Project">Project</a>
                </nav>

                {{-- Actions --}}
                <div class="flex items-center gap-4 relative z-10">
                    {{-- Social Links --}}

                    @if(!empty($profile->social_links['linkedin']))
                        <a href="{{ $profile->social_links['linkedin'] }}" target="_blank" class="text-slate-400 hover:text-[#2563EB] transition-colors duration-200" title="LinkedIn">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    @endif

                    <div class="w-px h-4 bg-slate-200"></div>

                    {{-- Language Switcher (Desktop Dropdown) --}}
                    <div class="relative">
                        <button id="lang-menu-btn" type="button" aria-expanded="false" aria-label="Pilih Bahasa"
                            class="group flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-slate-200 hover:border-slate-300 bg-white/60 hover:bg-slate-100/80 text-xs font-semibold px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-100 text-slate-600 transition-colors">
                            <svg class="w-3.5 h-3.5 text-slate-500 group-hover:text-[#2563EB] transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.6 9h16.8M3.6 15h16.8"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.5 3a17 17 0 000 18M12.5 3a17 17 0 010 18"/>
                            </svg>
                            <span id="current-lang-text" class="uppercase font-bold tracking-wider text-[11px] text-slate-700">ID</span>
                        </button>

                        {{-- Dropdown Card --}}
                        <div id="lang-dropdown" class="hidden absolute right-0 mt-2 w-36 rounded-xl bg-white/95 backdrop-blur-xl border border-slate-200/80 shadow-xl shadow-slate-900/5 p-1 z-50 transition-all duration-200">
                            <button type="button" onclick="setLanguage('id')" class="lang-option w-full flex items-center justify-between px-3 py-2 text-xs font-medium rounded-lg text-slate-700 hover:bg-blue-50 hover:text-[#2563EB] transition-all duration-150 active-lang" data-lang="id">
                                <span class="flex items-center gap-2">
                                    <span class="text-sm">Indonesia</span>
                                </span>
                            </button>
                            <button type="button" onclick="setLanguage('en')" class="lang-option w-full flex items-center justify-between px-3 py-2 text-xs font-medium rounded-lg text-slate-700 hover:bg-blue-50 hover:text-[#2563EB] transition-all duration-150" data-lang="en">
                                <span class="flex items-center gap-2">
                                    <span class="text-sm">Inglish</span>
                                </span>
                            </button>
                        </div>
                    </div>

                    {{-- Mobile menu trigger --}}
                    <button id="mobile-menu-btn" aria-label="Buka menu"
                        class="flex md:hidden rounded-lg px-3 py-1.5 border border-slate-200 hover:bg-slate-100 text-slate-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile dropdown menu --}}
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col gap-1">
                <a href="#home"     class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-all" onclick="closeMobileMenu()" data-lang-id="Beranda" data-lang-en="Home page">Home page</a>
                <a href="#skills"   class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-all" onclick="closeMobileMenu()" data-lang-id="Pengalaman" data-lang-en="Experience">Experience</a>
                <a href="#timeline" class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-all" onclick="closeMobileMenu()" data-lang-id="Kemampuan" data-lang-en="Tech Stack">Tech Stack</a>
                <a href="#projects" class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-all" onclick="closeMobileMenu()" data-lang-id="Proyek" data-lang-en="Project">Project</a>

                <div class="my-2.5 border-t border-slate-200/60 mx-3"></div>

                {{-- Language Switcher (Mobile Toggle Bar) --}}
                <div class="flex items-center justify-between px-3">
                    <span class="text-xs font-medium text-slate-500 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.6 9h16.8M3.6 15h16.8"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.5 3a17 17 0 000 18M12.5 3a17 17 0 010 18"/>
                        </svg>
                        Language / Bahasa
                    </span>
                    <div class="inline-flex p-0.5 rounded-lg bg-slate-100 border border-slate-200/80">
                        <button type="button" onclick="setLanguage('id')" class="mobile-lang-btn text-[11px] font-semibold px-3 py-1 rounded-md transition-all duration-200 bg-white text-[#2563EB] shadow-xs" data-lang="id">
                            ID
                        </button>
                        <button type="button" onclick="setLanguage('en')" class="mobile-lang-btn text-[11px] font-semibold px-3 py-1 rounded-md transition-all duration-200 text-slate-500 hover:text-slate-900" data-lang="en">
                            EN
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- ================================================================
         HERO SECTION
    ================================================================ --}}
    <section id="home" class="relative overflow-hidden py-24 lg:py-36">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-12 gap-16 items-center">

                {{-- Left: Description copy --}}
                <div class="lg:col-span-7 text-center lg:text-left reveal-on-scroll reveal-fade-up">
                    {{-- Glowing Leadership pill --}}
                    <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 mb-8">
                        <!-- <span class="w-2 h-2 rounded-full bg-[#2563EB] animate-pulse"></span> -->
                        <span class="text-xs font-bold text-[#2563EB] tracking-wide font-heading">
                            UI/UX & Front-End Dev
                        </span>
                    </div>

                    {{-- Main dynamic heading --}}
                    <h1 class="font-heading text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight text-slate-900 mb-6">
                        <span class="gradient-text">Hi, I'm</span> <br>
                        Yuma Akhunza Kausar Putra

                    </h1>

                    {{-- Bio description --}}
                    <p class="text-base sm:text-lg text-slate-500 leading-relaxed mb-10 max-w-xl mx-auto lg:mx-0 font-medium">
                        {{ $profile->bio }}
                    </p>

                    {{-- Buttons CTAs --}}
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">

                        <a href="mailto:{{ $profile->contact_email }}?subject=Tanya%20Projek%20Portofolio"
                            class="group w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-xl font-semibold text-sm text-[#2563EB] bg-blue-50 border border-blue-200 hover:bg-blue-100 transition-all duration-200 transform hover:-translate-y-0.5 active:translate-y-0">
                            <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Contact me
                        </a>
                        <!-- <a href="mailto:{{ $profile->contact_email }}"
                            class="group w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-xl font-semibold text-sm text-[#2563EB] bg-blue-50 border border-blue-200 hover:bg-blue-100 transition-all duration-200 transform hover:-translate-y-0.5 active:translate-y-0">
                            <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Contact me
                        </a> -->
                        <a href="{{ asset('files/CV Yuma Akhunza.pdf') }}" download="CV_Yuma_Akhunza.pdf"
                            class="group w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-xl font-semibold text-sm text-white bg-gradient-to-r from-[#2563EB] to-[#7C3AED] hover:from-[#1D4ED8] hover:to-[#6D28D9] shadow-lg shadow-blue-500/25 transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0">
                                
                                <svg class="w-4.5 h-4.5 transition-transform duration-200 group-hover:translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Download CV
                        </a>
                        <!-- <a href="#" onclick="alert('Berkas CV diunduh secara lokal.'); return false;"
                            class="group w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-xl font-semibold text-sm text-white bg-gradient-to-r from-[#2563EB] to-[#7C3AED] hover:from-[#1D4ED8] hover:to-[#6D28D9] shadow-lg shadow-blue-500/25 transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0">
                            <svg class="w-4.5 h-4.5 transition-transform duration-200 group-hover:translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download CV
                        </a> -->
                    </div>
                </div>

                {{-- Right: Profile Bento box shape --}}
                <div class="lg:col-span-5 flex justify-center reveal-on-scroll reveal-scale delay-200">
                    <div class="relative w-80 h-80 sm:w-96 sm:h-96">
                        {{-- Drop shadows glow --}}
                        <div class="absolute inset-0 rounded-3xl bg-gradient-to-tr from-[#2563EB] to-[#7C3AED] rotate-6 opacity-15 blur-2xl animate-pulse"></div>
                        <div class="absolute inset-0 rounded-3xl bg-gradient-to-bl from-blue-400 to-indigo-600 -rotate-3 opacity-10 blur-lg"></div>

                        {{-- Bento profile --}}
                        <div class="relative w-full h-full bg-white rounded-3xl border border-slate-200 shadow-2xl p-8 flex flex-col justify-between overflow-hidden ">
                            <div class="flex justify-between items-start">
                                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#2563EB] to-[#7C3AED] flex items-center justify-center text-white font-heading font-extrabold text-3xl shadow-lg shadow-blue-500/20">
                                    {{ mb_substr($profile->name, 0, 1) }}
                                </div>
                                <!-- <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-600 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Tersedia
                                </span>  -->
                            </div>

                            <div>
                                <h3 class="font-heading font-bold text-xl text-slate-900 leading-tight">
                                    {{ $profile->name }}
                                </h3>
                                <p class="text-xs font-semibold text-[#2563EB] mt-1 uppercase tracking-wider">
                                    {{ $profile->title }}
                                </p>
                                <p class="text-xs text-slate-400 mt-2 font-medium">
                                    Politeknik Negeri Malang
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-1.5 border-t border-slate-100 pt-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">Laravel</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">PHP</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">Blade</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">Tailwind</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">bootstrap</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">MySQL</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">Figma</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">Rest API</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">Git</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">Github</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">Canva</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ================================================================
         WORKFLOW & TIMELINE SECTION
    ================================================================ --}}
    <section id="skills" class="py-24 bg-white border-y border-slate-200/80 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">



            {{-- Section titles --}}
            <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll reveal-fade-up">
                <!-- <span class="inline-block text-xs font-bold tracking-[0.15em] uppercase text-[#2563EB] mb-3">Linimasa</span> -->
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900" data-lang-id="Pengalaman" data-lang-en="Experience">
                    Experience
                </h2>
                <p class="mt-4 text-slate-500 text-base font-medium" data-lang-id="Sebuah perjalanan yang ditandai oleh pengasahan disiplin akademik, manajemen kepemimpinan organisasi, dan inovasi rekayasa perangkat lunak." data-lang-en="A journey marked by the honing of academic discipline, organizational leadership management, and software engineering innovation.">
                    A journey marked by the honing of academic discipline, organizational leadership management, and software engineering innovation.
                </p>
            </div>

            {{-- Timeline steps --}}
            <div class="relative border-l-2 border-slate-200/80 ml-4 md:ml-32 pl-8 space-y-12">
                
                {{-- Timeline Step 1 --}}
                <div class="relative reveal-on-scroll reveal-fade-up delay-100 group">
                    {{-- Blue indicator --}}
                    <div class="absolute -left-[41px] top-1.5 w-6 h-6 rounded-full bg-white/90 backdrop-blur-md border-4 border-[#2563EB] shadow-lg shadow-blue-500/20 z-10 transition-transform duration-300 group-hover:scale-110"></div>
                    
                    {{-- Side label for date --}}
                    <span class="hidden md:block absolute -left-32 top-2.0 text-xs font-bold text-slate-400 tracking-wider text-right w-20 uppercase">
                        2019 - 2022
                    </span>
                    
                <div class="glass-card rounded-2xl p-6 sm:p-8 bento-highlight bg-white/70 backdrop-blur-xl border border-slate-200/80 shadow-xl shadow-slate-900/5 hover:border-blue-300/60 transition-all duration-300 relative overflow-hidden">
                    {{-- Glass Blob Glow --}}
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-500/5 rounded-full blur-2xl pointer-events-none"></div>

                    <span class="md:hidden block text-[10px] font-bold text-[#2563EB] mb-2 uppercase tracking-wide">2019 - 2022</span>
                    <h3 class="font-heading font-bold text-slate-900 text-base sm:text-lg" data-lang-id="SMAN 3 Taruna Angkasa, Jawa Timur" data-lang-en="Senior High School 3 Taruna Angkasa, East Java">Senior High School 3 Taruna Angkasa, East Java</h3>
                    <div class="mt-1">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-100/50" data-lang-id="SMA, IPA" data-lang-en="Senior High School, Natural Science">Senior High School, Natural Science</span>
                    </div>

                    {{-- Deskripsi Poin per Poin --}}
                    <ul class="mt-4 space-y-2.5 text-xs text-slate-500 font-medium leading-relaxed">
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-100 ring-4 ring-blue-50/80 mt-1.5 flex-shrink-0"></span>
                            <span data-lang-id="Ketua Divisi TIK (OSIS), Koordinator Literasi Digital, dan Anggota Aktif Pramuka." data-lang-en="Head of ICT Division (OSIS), Digital Literacy Coordinator, and Active Member of Scout Organization (Pramuka).">
                                Head of ICT Division (OSIS), Digital Literacy Coordinator, and Active Member of Scout Organization (Pramuka).
                            </span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-100 ring-4 ring-blue-50/80 mt-1.5 flex-shrink-0"></span>
                            <span data-lang-id="Mengelola branding digital dan strategi konten sekolah, berhasil menerbitkan 50+ aset kreatif untuk media sosial." data-lang-en="Managed the school's digital branding and content strategy, successfully publishing 50+ creative assets for social media.">
                                Managed the school's digital branding and content strategy, successfully publishing 50+ creative assets for social media.
                            </span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-100 ring-4 ring-blue-50/80 mt-1.5 flex-shrink-0"></span>
                            <span data-lang-id="Menjaga standar akademik tinggi di bidang sains dan matematika, sekaligus mengasah kemampuan awal dalam desain digital." data-lang-en="Maintained high academic standards in science and mathematics, while developing early technical skills in digital design.">
                                Maintained high academic standards in science and mathematics, while developing early technical skills in digital design.
                            </span>
                        </li>
                    </ul>
                </div>
                </div>

                {{-- Timeline Step 2 --}}
                <div class="relative reveal-on-scroll reveal-fade-up delay-200 group">
                    <div class="absolute -left-[41px] top-1.5 w-6 h-6 rounded-full bg-white/90 backdrop-blur-md border-4 border-[#2563EB] shadow-lg shadow-blue-500/20 z-10 transition-transform duration-300 group-hover:scale-110"></div>
                    
                    <span class="hidden md:block absolute -left-32 top-2.0 text-xs font-bold text-slate-400 tracking-wider text-right w-20 uppercase">
                        2022 - Present
                    </span>

                <div class="glass-card rounded-2xl p-6 sm:p-8 bento-highlight bg-white/70 backdrop-blur-xl border border-slate-200/80 shadow-xl shadow-slate-900/5 hover:border-blue-300/60 transition-all duration-300 relative overflow-hidden">
                    {{-- Glass Blob Glow --}}
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-500/5 rounded-full blur-2xl pointer-events-none"></div>

                    <span class="md:hidden block text-[10px] font-bold text-[#2563EB] mb-2 uppercase tracking-wide">2022 - Selesai</span>
                    <h3 class="font-heading font-bold text-slate-900 text-base sm:text-lg" data-lang-id="Politeknik Negeri Malang" data-lang-en="State Polytechnic of Malang">State Polytechnic of Malang</h3>
                    <div class="mt-1">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-100/50" data-lang-id="D4 Teknik Informatika" data-lang-en="Bachelor of Applied Science in Informatics Engineering">Bachelor of Applied Science in Informatics Engineering</span>
                    </div>

                    {{-- Deskripsi Poin per Poin --}}
                    <ul class="mt-4 space-y-2.5 text-xs text-slate-500 font-medium leading-relaxed">
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-100 ring-4 ring-blue-50/80 mt-1.5 flex-shrink-0"></span>
                            <span data-lang-id="Wakil Ketua Dewan Perwakilan Mahasiswa (DPM) dan Ketua Angkatan 2023 (DPM)." data-lang-en="Vice Chairman of Student Representative Council (DPM), Head of Batch 2023 (DPM).">
                                Vice Chairman of Student Representative Council (DPM), Head of Batch 2023 (DPM).
                            </span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-100 ring-4 ring-blue-50/80 mt-1.5 flex-shrink-0"></span>
                            <span data-lang-id="Fokus pada Rekayasa Perangkat Lunak, Pengembangan Aplikasi Mobile, dan Desain UI/UX." data-lang-en="Focused on Software Engineering, Mobile Development, and UI/UX Design.">
                                Focused on Software Engineering, Mobile Development, and UI/UX Design.
                            </span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-100 ring-4 ring-blue-50/80 mt-1.5 flex-shrink-0"></span>
                            <span data-lang-id="Aktif dalam Dewan Perwakilan Mahasiswa (DPM) dan berbagai proyek teknis." data-lang-en="Active in Student Representative Council (DPM) and various technical projects.">
                                Active in Student Representative Council (DPM) and various technical projects.
                            </span>
                        </li>
                    </ul>
                </div>
                </div>

                {{-- Timeline Step 3 --}}
                <div class="relative reveal-on-scroll reveal-fade-up delay-300 group">
                    <div class="absolute -left-[41px] top-1.5 w-6 h-6 rounded-full bg-white/90 backdrop-blur-md border-4 border-[#2563EB] shadow-lg shadow-blue-500/20 z-10 transition-transform duration-300 group-hover:scale-110"></div>
                    
                    <span class="hidden md:block absolute -left-32 top-2.0 text-xs font-bold text-slate-400 tracking-wider text-right w-20 uppercase">
                        2026 - Present
                    </span>

                <div class="glass-card rounded-2xl p-6 sm:p-8 bento-highlight bg-white/70 backdrop-blur-xl border border-slate-200/80 shadow-xl shadow-slate-900/5 hover:border-blue-300/60 transition-all duration-300 relative overflow-hidden">
                    {{-- Glass Blob Glow --}}
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-500/5 rounded-full blur-2xl pointer-events-none"></div>

                    <span class="md:hidden block text-[10px] font-bold text-[#2563EB] mb-2 uppercase tracking-wide">2026 - Present</span>
                    <h3 class="font-heading font-bold text-slate-900 text-base sm:text-lg" data-lang-id="Praktik Kerja Lapangan (PKL) di PT. Rekaindo Global Jasa" data-lang-en="Field Work Practice at PT. Rekaindo Global Jasa">Field Work Practice</h3>
                    <div class="mt-1">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-100/50" data-lang-id="Front-End, UI/UX, & Desain Grafis" data-lang-en="Front-End, UI/UX, & Graphic Design">Front-End, UI/UX, & Graphic Design</span>
                    </div>

                    {{-- Deskripsi Poin per Poin --}}
                    <ul class="mt-4 space-y-2.5 text-xs text-slate-500 font-medium leading-relaxed">
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-100 ring-4 ring-blue-50/80 mt-1.5 flex-shrink-0"></span>
                            <span data-lang-id="Implementasi alur kerja pengembangan Front-End, perancangan antarmuka UI/UX, serta pembuatan aset desain grafis." data-lang-en="Implementation of Front-End development workflows, UI/UX interface design, and graphic design asset creation.">
                                Implementation of Front-End development workflows, UI/UX interface design, and graphic design asset creation.
                            </span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-100 ring-4 ring-blue-50/80 mt-1.5 flex-shrink-0"></span>
                            <span data-lang-id="Penelitian berfokus pada optimasi performa antarmuka pengguna berbasis komponen." data-lang-en="Research focuses on optimizing the performance of component-based user interfaces.">
                                Research focuses on optimizing the performance of component-based user interfaces.
                            </span>
                        </li>
                    </ul>
                </div>
                </div>

            </div>

        </div>
    </section>

    {{-- ================================================================
         SKILLS MATRIKS BENTO GRID
    ================================================================ --}}
    <section id="timeline" class="py-24 transition-colors duration-300">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
                $techStacks = [
                    ['name' => 'Laravel',   'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg'],
                    ['name' => 'PHP',       'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg'],
                    ['name' => 'Tailwind',  'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original.svg'],
                    ['name' => 'Bootstrap', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
                    ['name' => 'MySQL',     'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg'],
                    ['name' => 'Figma',     'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg'],
                    ['name' => 'REST API',  'icon' => 'https://api.iconify.design/tabler:api.svg?color=%232563eb'],
                    ['name' => 'Git',       'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg'],
                    ['name' => 'GitHub',    'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg'],
                    ['name' => 'Canva',     'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/canva/canva-original.svg'],
                ];
            @endphp
            
            {{-- Title headers --}}
            <div class="text-center max-w-2xl mx-auto mb-8 reveal-on-scroll reveal-fade-up">
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900">
                    Tech Stack
                </h2>
                <p class="mt-4 text-slate-500 text-base leading-relaxed font-medium">
                    A structured grouping of technical capabilities emphasizing front-end engineering, back-end data flows, and interface modeling.
                </p>
            </div>          
            
            <section class="relative w-full py-8 mb-12 px-6 bg-[#0b0f17] overflow-hidden">

            {{-- Logo Tech Stack --}}
            {{-- Background Grid Lines (Garis samar latar belakang) --}}
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b15_1px,transparent_1px),linear-gradient(to_bottom,#1e293b15_1px,transparent_1px)] bg-[size:3rem_3rem] pointer-events-none"></div>

            {{-- Container Menyebar Horizontal --}}
            <div class="relative z-10 max-w-5xl mx-auto flex flex-wrap items-center justify-center gap-6 sm:gap-8 md:gap-10">
                @foreach($techStacks as $tech)
                    <div class="group relative flex flex-col items-center justify-center cursor-pointer py-2">

                        {{-- Efek Glow Pendaran Biru Halus di Belakang Logo Saat Hover --}}
                        <div class="absolute -inset-3 bg-[#2563EB]/25 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                        {{-- Logo Full tanpa Card + Animasi Floating & Scaling --}}
                        <img src="{{ $tech['icon'] }}" 
                            alt="{{ $tech['name'] }}" 
                            class="relative z-10 w-10 h-10 sm:w-12 sm:h-12 object-contain opacity-65 group-hover:opacity-100 scale-100 group-hover:scale-125 group-hover:-translate-y-2.5 transition-all duration-300 ease-out drop-shadow-sm group-hover:drop-shadow-[0_10px_20px_rgba(37,99,235,0.45)]">

                        {{-- Penyesuaian Font Size & Color --}}
                        <span class="relative z-10 mt-3 text-sm sm:text-xs font-medium text-slate-400 group-hover:text-white group-hover:font-semibold transition-all duration-300 tracking-wider whitespace-nowrap">
                            {{ $tech['name'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </section>
            
            {{-- Asymmetric Bento layout --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
            {{-- Box 1: Frontend (Wide) --}}
            @php
                $frontendSkills = $skills->get('frontend', collect());
            @endphp

            <div class="glass-card bento-highlight lg:row-span-2 rounded-3xl p-6 flex flex-col reveal-on-scroll reveal-scale delay-100 bg-white/70 backdrop-blur-xl border border-slate-200/80 shadow-xl shadow-slate-900/5 hover:border-blue-300/60 transition-all duration-300">
                
                {{-- 1. Area Atas (Glassmorphic Visual Thumbnail Area) --}}
                <div class="w-full h-52 bg-gradient-to-br from-white/80 via-slate-50/60 to-blue-50/40 backdrop-blur-lg rounded-2xl mb-6 flex flex-col items-center justify-center p-6 border border-slate-200/80 relative overflow-hidden shadow-inner group">
                    
                    {{-- Subtle Glass Blob Glow --}}
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-purple-500/10 rounded-full blur-2xl pointer-events-none"></div>

                    {{-- Icon --}}
                    <div class="w-12 h-12 rounded-2xl bg-white/90 backdrop-blur-md text-indigo-600 flex items-center justify-center border border-indigo-100/80 mb-4 z-10 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    
                </div>

                {{-- 2. Area Tengah (Judul & Deskripsi) --}}
                <div class="px-2 flex-1">
                    <h3 class="font-heading font-bold text-xl text-slate-900 leading-tight mb-2" data-lang-id="Front End Development" data-lang-en="Front End Development">
                        Front End Development
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium line-clamp-3" data-lang-id="Mengintegrasikan arsitektur modular dengan optimasi pemuatan halaman yang berfokus pada pengalaman pengguna skala besar." data-lang-en="Integrating modular architecture with page-loading optimization focused on large-scale user experience.">
                        Integrating modular architecture with page-loading optimization focused on large-scale user experience.
                    </p>
                </div>

                {{-- 3. Area Bawah (Footer Glass Pills) --}}
                <div class="mt-4 px-2 pb-1 flex items-center justify-between border-t border-slate-200 pt-4">
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($frontendSkills as $sk)
                            <div class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">
                                {{ $sk->name }}
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- Box 2: Backend (Tall) --}}
            @php
                $backendSkills = $skills->get('backend', collect());
            @endphp

            <div class="glass-card bento-highlight lg:row-span-2 rounded-3xl p-6 flex flex-col reveal-on-scroll reveal-scale delay-200 bg-white/70 backdrop-blur-xl border border-slate-200/80 shadow-xl shadow-slate-900/5 hover:border-blue-300/60 transition-all duration-300">
                
                {{-- 1. Area Atas (Glassmorphic Visual Thumbnail Area) --}}
                <div class="w-full h-52 bg-gradient-to-br from-white/80 via-slate-50/60 to-purple-50/40 backdrop-blur-lg rounded-2xl mb-6 flex flex-col items-center justify-center p-6 border border-slate-200/80 relative overflow-hidden shadow-inner group">
                    
                    {{-- Subtle Glass Blob Glow --}}
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-purple-500/10 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-indigo-500/10 rounded-full blur-2xl pointer-events-none"></div>

                    {{-- Icon --}}
                    <div class="w-12 h-12 rounded-2xl bg-white/90 backdrop-blur-md text-indigo-600 flex items-center justify-center border border-indigo-100/80 mb-4 z-10 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582-4 8-4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s-8-1.79-8-4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                        </svg>
                    </div>
                </div>

                {{-- 2. Area Tengah (Judul & Deskripsi) --}}
                <div class="px-2 flex-1">
                    <h3 class="font-heading font-bold text-xl text-slate-900 leading-tight mb-2" data-lang-id="Back End Infrastructure" data-lang-en="Back End Infrastructure">
                        Back End Infrastructure
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium line-clamp-3" data-lang-id="Membangun lapisan logika bisnis yang tangguh didukung pemodelan kueri terindeks secara optimal untuk efisiensi komputasi server." data-lang-en="Building a robust business logic layer supported by optimally indexed query modeling for server computational efficiency.">
                        Building a robust business logic layer supported by optimally indexed query modeling for server computational efficiency.
                    </p>
                </div>

                {{-- 3. Area Bawah (Footer Glass Pills) --}}
                <div class="mt-4 px-2 pb-1 flex items-center justify-between border-t border-slate-200 pt-4">
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($backendSkills as $sk)
                            <div class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">
                                {{ $sk->name }}
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- Box 3: Design Tools (Wide Bottom) --}}
            @php
                $designSkills = $skills->get('design_tools', collect());
            @endphp

            <div class="glass-card bento-highlight lg:row-span-2 rounded-3xl p-6 flex flex-col reveal-on-scroll reveal-scale delay-300 bg-white/70 backdrop-blur-xl border border-slate-200/80 shadow-xl shadow-slate-900/5 hover:border-blue-300/60 transition-all duration-300">
                
                {{-- 1. Area Atas (Glassmorphic Visual Thumbnail Area) --}}
                <div class="w-full h-52 bg-gradient-to-br from-white/80 via-slate-50/60 to-indigo-50/40 backdrop-blur-lg rounded-2xl mb-6 flex flex-col items-center justify-center p-6 border border-slate-200/80 relative overflow-hidden shadow-inner group">
                    
                    {{-- Subtle Glass Blob Glow --}}
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-500/10 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl pointer-events-none"></div>

                    {{-- Icon --}}
                    <div class="w-12 h-12 rounded-2xl bg-white/90 backdrop-blur-md text-indigo-600 flex items-center justify-center border border-indigo-100/80 mb-4 z-10 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                        </svg>
                    </div>
                </div>

                {{-- 2. Area Tengah (Judul & Deskripsi) --}}
                <div class="px-2 flex-1">
                    <h3 class="font-heading font-bold text-xl text-slate-900 leading-tight mb-2" data-lang-id="Design Tools" data-lang-en="Design Tools">
                        Design Tools
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium line-clamp-3" data-lang-id="Merancang kerangka desain modular berbasis komponen di Figma, disertai integrasi alur kerja pengembangan Git yang terstruktur." data-lang-en="Designing a component-based modular design framework in Figma, accompanied by the integration of a structured Git development workflow.">
                        Designing a component-based modular design framework in Figma, accompanied by the integration of a structured Git development workflow.
                    </p>
                </div>

                {{-- 3. Area Bawah (Footer Glass Pills) --}}
                <div class="mt-4 px-2 pb-1 flex items-center justify-between border-t border-slate-200 pt-4">
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($designSkills as $sk)
                            <div class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50/80 backdrop-blur-xs text-blue-700 border border-blue-100/60">
                                {{ $sk->name }}
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            </div>
        </div>
    </section>

    {{-- ================================================================
         GALERI PORTOFOLIO BENTO GRID SHOWCASE
    ================================================================ --}}
    <section id="projects" class="py-24 bg-white border-t border-slate-200/80 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Section Title --}}
            <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll reveal-fade-up">
                <!-- <span class="inline-block text-xs font-bold tracking-[0.15em] uppercase text-[#2563EB] mb-3">Galeri Portofolio</span> -->
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900">
                    Application Engineering Showcase
                </h2>
                <p class="mt-4 text-slate-500 text-base font-medium">
                    A collection of selected projects demonstrating the implementation of adaptive interfaces, platform scalability, and data processing integrity.
                </p>
            </div>

            {{-- Bento Box Projects --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @forelse($projects as $index => $project)
                    @php
                        // Asymmetric Grid Bento Box layout logic for 3 elements:
                        // Project 1 (Fruityfy): col-span-1
                        // Project 2 (Antareksa): col-span-1
                        // Project 3 (OLAP): col-span-1 (wide banner)
                        $span = 'lg:col-span-1';
                        if ($index === 0) {
                            $span = 'lg:col-span-1';
                        } elseif ($index === 2) {
                            $span = 'lg:col-span-1';
                        }

                        $accent = 'from-blue-500 to-indigo-600';
                        $iconPath = '<path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>';
                        if (Str::contains(strtolower($project->title), 'fruityfy')) {
                            $accent = 'from-emerald-500 to-teal-600';
                            $iconPath = '<path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"/>';
                        } elseif (Str::contains(strtolower($project->title), 'antareksa')) {
                            $accent = 'from-indigo-500 to-purple-600';
                            $iconPath = '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>';
                        } elseif (Str::contains(strtolower($project->title), 'olap') || Str::contains(strtolower($project->title), 'data')) {
                            $accent = 'from-amber-500 to-orange-600';
                            $iconPath = '<path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>';
                        }
                        $delayClass = 'delay-' . (($index % 3 + 1) * 100);
                    @endphp

                    <div class="glass-card {{ $span }} rounded-3xl overflow-hidden flex flex-col justify-between bg-white border border-slate-200 reveal-on-scroll reveal-fade-up {{ $delayClass }}">
                        <div>
                            {{-- Visual Header Banner --}}
                            <div class="relative h-48 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 flex flex-col items-center justify-center gap-3">
                                <div class="absolute inset-0 opacity-[0.03]" style="background-image: repeating-linear-gradient(0deg, #fff 0px, #fff 1px, transparent 1px, transparent 40px), repeating-linear-gradient(90deg, #fff 0px, #fff 1px, transparent 1px, transparent 40px);"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>

                                @if($project->image_path)
                                    <img src="{{ asset('storage/' . $project->image_path) }}" 
                                    alt="{{ $project->title }}" 
                                    class="absolute inset-0 w-full h-full object-cover opacity-5 brightness-75 blur-[5px] transition-all duration-300">
                                @endif

                                <div class="relative z-10 w-11 h-11 rounded-2xl bg-gradient-to-br {{ $accent }} flex items-center justify-center shadow-lg shadow-black/10 font-bold bg-[#2563EB]">
                                <svg class="w-5 h-5 text-white hover:text-white/80 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                </div>

                                @if($project->is_featured)
                                    <span class="relative z-10 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[9px] font-semibold bg-[#2563EB] text-white shadow-mdr">
                                        ★ Featured
                                    </span>
                                @endif
                            </div>

                            {{-- Project Meta and Body --}}
                            <div class="p-8">
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    @foreach($project->tech_stack ?? [] as $t)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-100/50">
                                            {{ $t }}
                                        </span>
                                    @endforeach
                                </div>

                                <h3 class="font-heading font-bold text-lg text-slate-900 mb-2 leading-tight">
                                    {{ $project->title }}
                                </h3>

                                <p class="text-xs text-slate-500 leading-relaxed font-medium">
                                    {{ $project->description }}
                                </p>
                            </div>
                        </div>

                        {{-- Footer Link --}}
                        <div class="px-8 pb-8 pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank"
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:text-[#2563EB] transition-colors duration-150">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                                    GitHub
                                </a>
                            @endif

                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank"
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:text-[#2563EB] transition-colors duration-150">
                                    Detail
                                    <svg class="w-4 h-4 text-slate-400 hover:text-[#2563EB] transition-all duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7V17" />
                                    </svg>
                                </a>
                            @else
                                <span class="text-xs font-bold text-slate-400">
                                    
                                </span>
                            @endif


                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-slate-400 italic py-12">Tidak ada proyek yang ditemukan.</p>
                @endforelse
            </div>

        </div>
    </section>

    {{-- ================================================================
         CONTACT SECTION
    ================================================================ --}}
    <section id="contact" class="py-24 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-14 reveal-on-scroll reveal-fade-up">
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900 gradient-text" data-lang-id="Hubungi Saya" data-lang-en="Get In Touch">
                    Get In Touch
                </h2>
                <p class="mt-4 text-slate-500 text-sm font-medium" data-lang-id="Terbuka untuk kolaborasi perangkat lunak, proyek lepas (freelance), atau posisi magang." data-lang-en="Open to software collaborations, freelance projects, or internship positions.">
                    Open to software collaborations, freelance projects, or internship positions.
                </p>
            </div>

            <div class="glass-card rounded-3xl overflow-hidden md:grid md:grid-cols-5 bg-white/70 backdrop-blur-xl border border-slate-200/80 shadow-2xl shadow-slate-900/5 reveal-on-scroll reveal-scale relative">
                {{-- Ambient Glass Blob Glow behind card --}}
                <div class="absolute -top-20 -left-20 w-48 h-48 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-20 -right-20 w-48 h-48 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>

                {{-- Left panel - Solid Blue, no gradient --}}
                <div class="md:col-span-2 bg-[#2563EB] p-8 sm:p-10 flex flex-col justify-between text-white shadow-xl shadow-blue-600/20 reveal-on-scroll reveal-left delay-100 relative overflow-hidden">
                    {{-- Inner Glass Blob Glow for Left Panel --}}
                    <div class="absolute -top-10 -right-10 w-36 h-36 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="absolute -bottom-10 -left-10 w-28 h-28 bg-white/5 rounded-full blur-xl pointer-events-none"></div>

                    <div class="relative z-10">
                        <h3 class="font-heading font-bold text-lg mb-1" data-lang-id="Informasi Kontak" data-lang-en="Contact Information">Contact Information</h3>
                        <p class="text-blue-100 text-xs leading-relaxed mb-8" data-lang-id="Hubungi saya melalui saluran komunikasi digital di bawah ini." data-lang-en="Contact us via the digital communication channels below.">Contact us via the digital communication channels below.</p>

                        <div class="space-y-4">
                            <a href="mailto:{{ $profile->contact_email }}" class="flex items-center gap-3 text-blue-100 hover:text-white transition-all text-xs group">
                                <span class="w-9 h-9 rounded-xl bg-white/15 backdrop-blur-md border border-white/20 group-hover:bg-white/25 group-hover:scale-105 flex items-center justify-center transition-all shrink-0 shadow-sm">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </span>
                                <span class="truncate font-semibold">{{ $profile->contact_email }}</span>
                            </a>

                            @if(!empty($profile->social_links['github']))
                                <a href="{{ $profile->social_links['github'] }}" target="_blank" class="flex items-center gap-3 text-blue-100 hover:text-white transition-all text-xs group">
                                    <span class="w-9 h-9 rounded-xl bg-white/15 backdrop-blur-md border border-white/20 group-hover:bg-white/25 group-hover:scale-105 flex items-center justify-center transition-all shrink-0 shadow-sm">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                                    </span>
                                    <span class="font-semibold">akhunzakp</span>
                                </a>
                            @endif
                            @if(!empty($profile->social_links['linkedin']))
                                <a href="{{ $profile->social_links['linkedin'] }}" target="_blank" class="flex items-center gap-3 text-blue-100 hover:text-white transition-all text-xs group">
                                    <span class="w-9 h-9 rounded-xl bg-white/15 backdrop-blur-md border border-white/20 group-hover:bg-white/25 group-hover:scale-105 flex items-center justify-center transition-all shrink-0 shadow-sm">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                                    </span>
                                    <span class="font-semibold">Yuma Akhunza K.P</span>
                                </a>
                            @endif

                            @if(!empty($profile->social_links['instagram']))
                                <a href="{{ $profile->social_links['instagram'] }}" target="_blank" class="flex items-center gap-3 text-blue-100 hover:text-white transition-all text-xs group">
                                    <span class="w-9 h-9 rounded-xl bg-white/15 backdrop-blur-md border border-white/20 group-hover:bg-white/25 group-hover:scale-105 flex items-center justify-center transition-all shrink-0 shadow-sm">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    </span>
                                    <span class="font-semibold">akhunza.kp</span>
                                </a>
                            @endif

                            <a href="https://maps.app.goo.gl/NdFKTGZJx1uSRAPcA" target="_blank" class="flex items-center gap-3 text-blue-100 hover:text-white transition-all text-xs group">
                                <span class="w-9 h-9 rounded-xl bg-white/15 backdrop-blur-md border border-white/20 group-hover:bg-white/25 group-hover:scale-105 flex items-center justify-center transition-all shrink-0 shadow-sm">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </span>
                                <span class="font-semibold">Madiun, East Java, Indonesia</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right Panel Form --}}
                <div class="md:col-span-3 p-8 sm:p-10 reveal-on-scroll reveal-right delay-200 bg-white/50 backdrop-blur-md">
                    <form onsubmit="event.preventDefault(); alert('Pesan Anda berhasil dikirim. Terima kasih!');" class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                            <label class="block text-[10px] font-semibold text-slate-400 mb-1.5 tracking-wide" for="contact-name" data-lang-id="Nama Anda" data-lang-en="Your Name">Nama Anda</label>
                                <input type="text" id="contact-name" required placeholder="John Doe"
                                    data-lang-id-placeholder="John Doe" data-lang-en-placeholder=""
                                    class="w-full px-4 py-2.5 rounded-xl text-xs bg-slate-50/80 border border-slate-200 text-[#0F172A] focus:ring-2 focus:ring-[#2563EB]/25 focus:border-[#2563EB] focus:bg-white outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-400 mb-1.5 tracking-wide" for="contact-email" data-lang-id="Alamat Email" data-lang-en="Email Address">Alamat Email</label>
                                <input type="email" id="contact-email" required placeholder="email@contoh.com"
                                    data-lang-id-placeholder="email@contoh.com" data-lang-en-placeholder="email@example.com"
                                    class="w-full px-4 py-2.5 rounded-xl text-xs bg-slate-50/80 border border-slate-200 text-[#0F172A] focus:ring-2 focus:ring-[#2563EB]/25 focus:border-[#2563EB] focus:bg-white outline-none transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] font-semibold text-slate-400 mb-1.5 tracking-wide" for="contact-subject" data-lang-id="Subjek" data-lang-en="Subject">Subjek</label>
                            <input type="text" id="contact-subject" placeholder="Tawaran Kerja / Pertanyaan Proyek"
                                data-lang-id-placeholder="Tawaran Kerja / Pertanyaan Proyek" data-lang-en-placeholder="Job Offer / Project Inquiry"
                                class="w-full px-4 py-2.5 rounded-xl text-xs bg-slate-50/80 border border-slate-200 text-[#0F172A] focus:ring-2 focus:ring-[#2563EB]/25 focus:border-[#2563EB] focus:bg-white outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-[10px] font-semibold text-slate-400 mb-1.5 tracking-wide" for="contact-message" data-lang-id="Pesan Anda" data-lang-en="Your Message">Pesan Anda</label>
                            <textarea id="contact-message" rows="4" required placeholder="Tuliskan pesan detail Anda di sini..."
                                data-lang-id-placeholder="Tuliskan pesan detail Anda di sini..." data-lang-en-placeholder="Write your detailed message here..."
                                class="w-full px-4 py-2.5 rounded-xl text-xs bg-slate-50/80 border border-slate-200 text-[#0F172A] focus:ring-2 focus:ring-[#2563EB]/25 focus:border-[#2563EB] focus:bg-white outline-none resize-none transition-all"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-xs font-semibold text-white bg-gradient-to-r from-[#2563EB] to-[#7C3AED] hover:from-[#1D4ED8] hover:to-[#6D28D9] shadow-md shadow-blue-500/25 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                            <span data-lang-id="Kirim Pesan" data-lang-en="Send Message">Send Message</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>

    {{-- ================================================================
         FOOTER
    ================================================================ --}}
    <footer class="bg-white border-t border-slate-200/80 py-10 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                <p class="text-xs text-slate-400 font-medium">
                    &copy; {{ date('Y') }} <span class="font-semibold text-slate-600">{{ $profile->name }}</span> | Hak Cipta Dilindungi Undang-Undang |

                    {{-- Admin Dashboard shortcut --}}
                    <a href="{{ url('/admin') }}" class="text-xs font-semibold">
                        Settings 
                    </a>
                </p>
                <div class="flex items-center gap-6">
                    <a href="#home"     class="text-xs text-slate-400 hover:text-[#2563EB] font-semibold transition-colors">Home page</a>
                    <a href="#skills"   class="text-xs text-slate-400 hover:text-[#2563EB] font-semibold transition-colors">Experience</a>
                    <a href="#timeline" class="text-xs text-slate-400 hover:text-[#2563EB] font-semibold transition-colors">Tech Stack</a>
                    <a href="#projects" class="text-xs text-slate-400 hover:text-[#2563EB] font-semibold transition-colors">Project</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- ================================================================
         JAVASCRIPT — Lenis Smooth Scroll + Scroll Progress + Reveal-on-Scroll Observer
    ================================================================ --}}
    <script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script>
    <script>
        // --- Mobile Menu Toggle ---
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu    = document.getElementById('mobile-menu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        function closeMobileMenu() {
            if (mobileMenu) {
                mobileMenu.classList.add('hidden');
            }
        }

        // --- Navbar shadow on scroll ---
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                navbar.classList.add('shadow-md', 'shadow-slate-200/40');
            } else {
                navbar.classList.remove('shadow-md', 'shadow-slate-200/40');
            }
        }, { passive: true });

        // --- Lenis Momentum Smooth Scroll Engine ---
        let lenis;
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (!prefersReducedMotion && typeof Lenis !== 'undefined') {
            lenis = new Lenis({
                duration: 1.2,
                easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                orientation: 'vertical',
                gestureOrientation: 'vertical',
                smoothWheel: true,
                wheelMultiplier: 1.0,
                touchMultiplier: 1.5,
            });

            function raf(time) {
                lenis.raf(time);
                requestAnimationFrame(raf);
            }
            requestAnimationFrame(raf);

            // Intercept internal anchor clicks for Lenis smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href');
                    if (targetId && targetId !== '#') {
                        const targetEl = document.querySelector(targetId);
                        if (targetEl) {
                            e.preventDefault();
                            lenis.scrollTo(targetEl, { offset: -70 });
                        }
                    }
                });
            });
        }

        // --- Scroll Progress Indicator Bar ---
        const scrollProgress = document.getElementById('scroll-progress');
        window.addEventListener('scroll', () => {
            if (scrollProgress) {
                const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
                if (totalHeight > 0) {
                    const progress = Math.min(1, Math.max(0, window.scrollY / totalHeight));
                    scrollProgress.style.transform = `scaleX(${progress})`;
                }
            }
        }, { passive: true });

        // --- Reveal-On-Scroll Intersection Observer ---
        const revealElements = document.querySelectorAll('.reveal-on-scroll');
        if ('IntersectionObserver' in window) {
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        // Clear will-change after animation finishes for 60fps rendering
                        entry.target.addEventListener('transitionend', () => {
                            entry.target.style.willChange = 'auto';
                        }, { once: true });
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px 0px -60px 0px',
                threshold: 0.1
            });

            revealElements.forEach(el => revealObserver.observe(el));
        } else {
            // Fallback for older browsers
            revealElements.forEach(el => el.classList.add('is-revealed'));
        }

        // --- Bento Card Hover Mouse Coordinate Glow Effect ---
        const bentoCards = document.querySelectorAll('.bento-highlight');
        bentoCards.forEach(card => {
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--x', `${x}px`);
                card.style.setProperty('--y', `${y}px`);
            });
        });

        // --- Smooth scroll active link highlight ---
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('header a.nav-link');

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        navLinks.forEach(link => {
                            const isActive = link.getAttribute('href') === '#' + entry.target.id;
                            link.classList.toggle('text-[#2563EB]', isActive);
                            link.classList.toggle('border-b-2', isActive);
                        });
                    }
                });
            }, { threshold: 0.4 });

            sections.forEach(s => observer.observe(s));
        }

        // --- Client-Side Translation Engine ---
        const langMenuBtn = document.getElementById('lang-menu-btn');
        const langDropdown = document.getElementById('lang-dropdown');

        if (langMenuBtn && langDropdown) {
            langMenuBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                langDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', (e) => {
                if (!langDropdown.contains(e.target) && !langMenuBtn.contains(e.target)) {
                    langDropdown.classList.add('hidden');
                }
            });
        }

        function setLanguage(lang) {
            // Update Active Label in Header
            const currentLangText = document.getElementById('current-lang-text');
            if (currentLangText) {
                currentLangText.textContent = lang.toUpperCase() === 'ID' ? 'ID' : 'EN';
            }

            // Update Desktop Dropdown Options UI
            document.querySelectorAll('.lang-option').forEach(opt => {
                const isSelected = opt.getAttribute('data-lang') === lang;
                const check = opt.querySelector('.lang-check');
                if (check) {
                    check.classList.toggle('hidden', !isSelected);
                }
                opt.classList.toggle('bg-blue-50', isSelected);
                opt.classList.toggle('text-[#2563EB]', isSelected);
                opt.classList.toggle('font-bold', isSelected);
            });

            // Update Mobile Toggle Buttons UI
            document.querySelectorAll('.mobile-lang-btn').forEach(btn => {
                const isSelected = btn.getAttribute('data-lang') === lang;
                btn.classList.toggle('bg-white', isSelected);
                btn.classList.toggle('text-[#2563EB]', isSelected);
                btn.classList.toggle('font-bold', isSelected);
                btn.classList.toggle('shadow-xs', isSelected);
                btn.classList.toggle('text-slate-500', !isSelected);
                btn.classList.toggle('font-semibold', !isSelected);
            });

            if (langDropdown) {
                langDropdown.classList.add('hidden');
            }

            // Persist User Preference
            localStorage.setItem('user_language', lang);

            // Dynamic Content Translation via data-lang-id and data-lang-en
            const elementsToTranslate = document.querySelectorAll('[data-lang-id], [data-lang-en]');
            elementsToTranslate.forEach(el => {
                const targetText = el.getAttribute(`data-lang-${lang}`);
                if (targetText !== null && targetText.trim() !== '') {
                    el.textContent = targetText;
                }
            });

            // Input Placeholder Translation via data-lang-id-placeholder and data-lang-en-placeholder
            const inputsToTranslate = document.querySelectorAll('[data-lang-id-placeholder], [data-lang-en-placeholder]');
            inputsToTranslate.forEach(input => {
                const targetPlaceholder = input.getAttribute(`data-lang-${lang}-placeholder`);
                if (targetPlaceholder !== null) {
                    input.setAttribute('placeholder', targetPlaceholder);
                }
            });
        }

        // Auto-Initialize Saved Language Preference (Default to 'id')
        const savedLang = localStorage.getItem('user_language') || 'id';
        setLanguage(savedLang);
    </script>

</body>
</html>
