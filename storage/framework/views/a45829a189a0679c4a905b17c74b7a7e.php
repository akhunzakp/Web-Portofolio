<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($profile->name); ?> | <?php echo e($profile->title); ?></title>
    <meta name="description" content="Portofolio Profesional <?php echo e($profile->name); ?> — <?php echo e($profile->title); ?>. Fokus pada integrasi estetika UI/UX dan keandalan sistem.">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

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
            bottom: -4px; left: 0;
            width: 0; height: 2px;
            background: linear-gradient(90deg, #2563EB, #7C3AED);
            border-radius: 99px;
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

    
    <div class="floating-shape w-[600px] h-[600px] bg-blue-500/10 top-[-150px] left-[-200px]"></div>
    <div class="floating-shape w-[500px] h-[500px] bg-purple-500/8 bottom-[100px] right-[-150px]" style="animation-delay: -6s;"></div>
    <div class="floating-shape w-[400px] h-[400px] bg-indigo-500/5 top-[40%] left-[30%]" style="animation-delay: -3s;"></div>

    
    <header id="navbar" class="sticky top-0 z-50 backdrop-blur-lg bg-white/80 border-b border-slate-200/60 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                
                <a href="#home" class="flex items-center gap-2.5 group relative z-10">
                    <!-- <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#2563EB] to-[#7C3AED] flex items-center justify-center text-white font-heading font-extrabold text-base shadow-md group-hover:scale-105 transition-transform duration-300">
                        <?php echo e(mb_substr($profile->name, 0, 1)); ?>

                    </span> -->
                    <span class="text-lg font-heading font-bold text-slate-900 tracking-tight">
                        UI/UX & Visual Designer <span class="text-[#2563EB]">Enthusiast</span>
                    </span>
                </a>

                
                <nav class="hidden md:flex items-center gap-8">
                    <a href="#home"     class="nav-link text-sm font-semibold text-slate-600 hover:text-[#2563EB] transition-colors duration-200">Home page</a>
                    <a href="#skills"   class="nav-link text-sm font-semibold text-slate-600 hover:text-[#2563EB] transition-colors duration-200">Experience</a>
                    <a href="#timeline" class="nav-link text-sm font-semibold text-slate-600 hover:text-[#2563EB] transition-colors duration-200">Tech Stack</a>
                    <a href="#projects" class="nav-link text-sm font-semibold text-slate-600 hover:text-[#2563EB] transition-colors duration-200">Project</a>
                </nav>

                
                <div class="flex items-center gap-4 relative z-10">
                    
                    <?php if(!empty($profile->social_links['linkedin'])): ?>
                        <a href="<?php echo e($profile->social_links['linkedin']); ?>" target="_blank" class="text-slate-400 hover:text-[#2563EB] transition-colors duration-200" title="LinkedIn">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    <?php endif; ?>

                    <div class="w-px h-4 bg-slate-200"></div>

                    
                    <a href="<?php echo e(url('/admin')); ?>" class="text-xs font-semibold px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-100 text-slate-600 transition-colors">
                        Setting
                    </a>

                    
                    <button id="mobile-menu-btn" aria-label="Buka menu"
                        class="flex md:hidden items-center justify-center w-10 h-10 rounded-xl bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200/50 bg-white/95 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col gap-1.5">
                <a href="#home"     class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-all" onclick="closeMobileMenu()">Home page</a>
                <a href="#skills"   class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-all" onclick="closeMobileMenu()">Tech Stack</a>
                <a href="#timeline" class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-all" onclick="closeMobileMenu()">Experience</a>
                <a href="#projects" class="px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-all" onclick="closeMobileMenu()">Project</a>
            </div>
        </div>
    </header>

    
    <section id="home" class="relative overflow-hidden py-24 lg:py-36">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-12 gap-16 items-center">

                
                <div class="lg:col-span-7 text-center lg:text-left">
                    
                    <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 mb-8">
                        <!-- <span class="w-2 h-2 rounded-full bg-[#2563EB] animate-pulse"></span> -->
                        <span class="text-xs font-bold text-[#2563EB] tracking-wide font-heading">
                            Get in Touch
                        </span>
                    </div>

                    
                    <h1 class="font-heading text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight text-slate-900 mb-6">
                        <span class="gradient-text">Hi, I'm</span> Putra<br>
                        I Build Thing for the Web

                    </h1>

                    
                    <p class="text-base sm:text-lg text-slate-500 leading-relaxed mb-10 max-w-xl mx-auto lg:mx-0 font-medium">
                        <?php echo e($profile->bio); ?>

                    </p>

                    
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">

                        <a href="mailto:<?php echo e($profile->contact_email); ?>?subject=Tanya%20Projek%20Portofolio"
                            class="group w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-xl font-semibold text-sm text-[#2563EB] bg-blue-50 border border-blue-200 hover:bg-blue-100 transition-all duration-200 transform hover:-translate-y-0.5 active:translate-y-0">
                            <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Contact me
                        </a>
                        <!-- <a href="mailto:<?php echo e($profile->contact_email); ?>"
                            class="group w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-xl font-semibold text-sm text-[#2563EB] bg-blue-50 border border-blue-200 hover:bg-blue-100 transition-all duration-200 transform hover:-translate-y-0.5 active:translate-y-0">
                            <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Contact me
                        </a> -->
                        <a href="<?php echo e(asset('files/CV Yuma Akhunza.pdf')); ?>" download="CV_Yuma_Akhunza.pdf"
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

                
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-80 h-80 sm:w-96 sm:h-96">
                        
                        <div class="absolute inset-0 rounded-3xl bg-gradient-to-tr from-[#2563EB] to-[#7C3AED] rotate-6 opacity-15 blur-2xl animate-pulse"></div>
                        <div class="absolute inset-0 rounded-3xl bg-gradient-to-bl from-blue-400 to-indigo-600 -rotate-3 opacity-10 blur-lg"></div>

                        
                        <div class="relative w-full h-full bg-white rounded-3xl border border-slate-200 shadow-2xl p-8 flex flex-col justify-between overflow-hidden">
                            <div class="flex justify-between items-start">
                                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#2563EB] to-[#7C3AED] flex items-center justify-center text-white font-heading font-extrabold text-3xl shadow-lg shadow-blue-500/20">
                                    <?php echo e(mb_substr($profile->name, 0, 1)); ?>

                                </div>
                            </div>

                            <div>
                                <h3 class="font-heading font-bold text-xl text-slate-900 leading-tight">
                                    <?php echo e($profile->name); ?>

                                </h3>
                                <p class="text-xs font-semibold text-[#2563EB] mt-1 uppercase tracking-wider">
                                    <?php echo e($profile->title); ?>

                                </p>
                                <p class="text-xs text-slate-400 mt-2 font-medium">
                                    Politeknik Negeri Malang
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-1.5 border-t border-slate-100 pt-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">Laravel</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">Flutter</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">Figma</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">Canva</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    
    <section id="skills" class="py-24 bg-white border-y border-slate-200/80 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">



            
            <div class="text-center max-w-2xl mx-auto mb-16">
                <!-- <span class="inline-block text-xs font-bold tracking-[0.15em] uppercase text-[#2563EB] mb-3">Linimasa</span> -->
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900">
                    Experience
                </h2>
                <p class="mt-4 text-slate-500 text-base font-medium">
                    A journey marked by the honing of academic discipline, organizational leadership management, and software engineering innovation.                </p>
            </div>

            
            <div class="relative border-l-2 border-slate-200/80 ml-4 md:ml-32 pl-8 space-y-12">
                
                
                <div class="relative">
                    
                    <div class="absolute -left-[41px] top-1.5 w-6 h-6 rounded-full bg-white border-4 border-[#2563EB] shadow-md z-10"></div>
                    
                    
                    <span class="hidden md:block absolute -left-32 top-2.0 text-xs font-bold text-slate-400 tracking-wider text-right w-20 uppercase">
                        2019 - 2022
                    </span>
                    
                    <div class="glass-card rounded-2xl p-6 bento-highlight">
                        <span class="md:hidden block text-[10px] font-bold text-[#2563EB] mb-2 uppercase tracking-wide">2019 - 2022</span>
                        <h3 class="font-heading font-bold text-slate-900 text-base">SMAN 3 Taruna Angkasa</h3>
                        <p class="text-xs font-semibold text-[#2563EB] mt-0.5">Senior High School, Natural Science</p>
                        <p class="text-xs text-slate-500 leading-relaxed mt-3 font-medium">
                            Head of ICT Division (OSIS), Digital Literacy Coordinator, and Active Member of Scout Organization (Pramuka).
                            <br>As the Head of ICT Division, I managed the school's digital branding and content strategy, successfully publishing 50+ creative assets for social media. I also focused on maintaining high academic standards in science and mathematics, while developing early technical skills in digital design.
                        </p>
                    </div>
                </div>

                
                <div class="relative">
                    <div class="absolute -left-[41px] top-1.5 w-6 h-6 rounded-full bg-white border-4 border-[#2563EB] shadow-md z-10"></div>
                    
                    <span class="hidden md:block absolute -left-32 top-2.0 text-xs font-bold text-slate-400 tracking-wider text-right w-20 uppercase">
                        2022 - Present
                    </span>

                    <div class="glass-card rounded-2xl p-6 bento-highlight">
                        <span class="md:hidden block text-[10px] font-bold text-[#2563EB] mb-2 uppercase tracking-wide">2022 - Selesai</span>
                        <h3 class="font-heading font-bold text-slate-900 text-base">State Polytechnic of Malang</h3>
                        <p class="text-xs font-semibold text-[#2563EB] mt-0.5">Bachelor of Applied Science in Informatics Engineering</p>
                        <p class="text-xs text-slate-500 leading-relaxed mt-3 font-medium">
                            Vice Chairman of Student Representative Council (DPM), Head of Batch 2023 (DPM).
                            <br>Focused on Software Engineering, Mobile Development, and UI/UX Design. Active in Student Representative Council (DPM) and various technical projects.
                        </p>
                    </div>
                </div>

                
                <div class="relative">
                    <div class="absolute -left-[41px] top-1.5 w-6 h-6 rounded-full bg-white border-4 border-[#2563EB] shadow-md z-10"></div>
                    
                    <span class="hidden md:block absolute -left-32 top-2.0 text-xs font-bold text-slate-400 tracking-wider text-right w-20 uppercase">
                        2026 - Present
                    </span> 

                    <div class="glass-card rounded-2xl p-6 bento-highlight">
                        <span class="md:hidden block text-[10px] font-bold text-[#2563EB] mb-2 uppercase tracking-wide">2026 - Present</span>
                        <h3 class="font-heading font-bold text-slate-900 text-base">PT. Rekaindo Global Jasa</h3>
                        <p class="text-xs font-semibold text-[#2563EB] mt-0.5">Field Work Practice</p>
                        <p class="text-xs text-slate-500 leading-relaxed mt-3 font-medium">
                            The research focuses on optimizing the performance of component-based user interfaces.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    
    <section id="timeline" class="py-24 transition-colors duration-300">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900">
                    Tech Stack
                </h2>
                <p class="mt-4 text-slate-500 text-base leading-relaxed font-medium">
                    A structured grouping of technical capabilities emphasizing front-end engineering, back-end data flows, and interface modeling.
                </p>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                
                <?php
                    $frontendSkills = $skills->get('frontend', collect());
                ?>
                <div class="glass-card bento-highlight lg:row-span-2 rounded-3xl p-8 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3.5 mb-4">
                            <div class="w-11 h-11 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0 border border-indigo-100">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-base text-slate-900 leading-tight">Front-End Development</h3>
                                <p class="text-xs text-slate-400 mt-0.5">Achieving precision design and adaptive state management.</p>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed mb-6 font-medium">
                            Integrating modular architecture with page-loading optimization focused on large-scale user experience.
                        </p>
                    </div>

                    <!-- Card Skills -->
                    <div class="flex flex-row flex-wrap gap-2 mt-auto">
                        <?php $__currentLoopData = $frontendSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-bold bg-emerald-500/10 text-emerald-600 border border-emerald-200">  
                                <?php echo e($sk->name); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                
                <?php
                    $backendSkills = $skills->get('backend', collect());
                ?>
                <div class="glass-card bento-highlight lg:row-span-2 rounded-3xl p-8 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3.5 mb-4">
                            <div class="w-11 h-11 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0 border border-indigo-100">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-base text-slate-900 leading-tight">Back-End Infrastructure</h3>
                                <p class="text-xs text-slate-400 mt-0.5">Relational data pipeline optimization and logical API development.</p>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed mb-6 font-medium">
                            Building a robust business logic layer supported by optimally indexed query modeling for server computational efficiency.
                        </p>
                    </div>

                    <!-- Card Skills -->
                    <div class="flex flex-row flex-wrap gap-2 mt-auto">
                        <?php $__currentLoopData = $backendSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-bold bg-emerald-500/10 text-emerald-600 border border-emerald-200">                                     <?php echo e($sk->name); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                
                <?php
                    $designSkills = $skills->get('design_tools', collect());
                ?>
                <div class="glass-card bento-highlight lg:row-span-2 rounded-3xl p-8 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3.5 mb-4">
                            <div class="w-11 h-11 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0 border border-indigo-100">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-base text-slate-900 leading-tight">Design & Collaboration Tools</h3>
                                <p class="text-xs text-slate-400 mt-0.5">Creation of interactive digital blueprints and version control workflows.</p>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed mb-6 font-medium">
                            Designing a component-based modular design framework in Figma, accompanied by the integration of a structured Git development workflow.
                        </p>
                    </div>

                    <!-- Card Skills -->
                    <div class="flex flex-row flex-wrap gap-2 mt-auto">
                        <?php $__currentLoopData = $designSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-bold bg-emerald-500/10 text-emerald-600 border border-emerald-200">                                      <?php echo e($sk->name); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    
    <section id="projects" class="py-24 bg-white border-t border-slate-200/80 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            
            <div class="text-center max-w-2xl mx-auto mb-16">
                <!-- <span class="inline-block text-xs font-bold tracking-[0.15em] uppercase text-[#2563EB] mb-3">Galeri Portofolio</span> -->
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900">
                    Application Engineering Showcase
                </h2>
                <p class="mt-4 text-slate-500 text-base font-medium">
                    A collection of selected projects demonstrating the implementation of adaptive interfaces, platform scalability, and data processing integrity.
                </p>
            </div>

            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
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
                    ?>

                    <div class="glass-card <?php echo e($span); ?> rounded-3xl overflow-hidden flex flex-col justify-between bg-white border border-slate-200">
                        <div>
                            
                            <div class="relative h-48 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 flex flex-col items-center justify-center gap-3">
                                <div class="absolute inset-0 opacity-[0.03]" style="background-image: repeating-linear-gradient(0deg, #fff 0px, #fff 1px, transparent 1px, transparent 40px), repeating-linear-gradient(90deg, #fff 0px, #fff 1px, transparent 1px, transparent 40px);"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>

                                <?php if($project->image_path): ?>
                                    <img src="<?php echo e(asset('storage/' . $project->image_path)); ?>" alt="<?php echo e($project->title); ?>" class="absolute inset-0 w-full h-full object-cover opacity-20">
                                <?php endif; ?>

                                <div class="relative z-10 w-11 h-11 rounded-2xl bg-gradient-to-br <?php echo e($accent); ?> flex items-center justify-center shadow-lg shadow-black/10">
                                    <svg class="w-5.5 h-5.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><?php echo $iconPath; ?></svg>
                                </div>

                                <?php if($project->is_featured): ?>
                                    <span class="relative z-10 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[9px] font-bold bg-[#2563EB] text-white shadow-md uppercase tracking-wider">
                                        ★ Featured
                                    </span>
                                <?php endif; ?>
                            </div>

                            
                            <div class="p-8">
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    <?php $__currentLoopData = $project->tech_stack ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                                            <?php echo e($t); ?>

                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <h3 class="font-heading font-bold text-lg text-slate-900 mb-2 leading-tight">
                                    <?php echo e($project->title); ?>

                                </h3>

                                <p class="text-xs text-slate-500 leading-relaxed font-medium">
                                    <?php echo e($project->description); ?>

                                </p>
                            </div>
                        </div>

                        
                        <div class="px-8 pb-8 pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                            <?php if($project->project_url): ?>
                                <a href="<?php echo e($project->project_url); ?>" target="_blank"
                                    class="text-xs font-bold text-[#2563EB] hover:underline underline-offset-2">
                                    Akses Demo
                                </a>
                            <?php else: ?>
                                <span class="text-xs font-bold text-slate-400">
                                    
                                </span>
                            <?php endif; ?>

                            <?php if($project->github_url): ?>
                                <a href="<?php echo e($project->github_url); ?>" target="_blank"
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:text-[#2563EB] transition-colors duration-150">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                                    GitHub
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="col-span-full text-center text-slate-400 italic py-12">Tidak ada proyek yang ditemukan.</p>
                <?php endif; ?>
            </div>

        </div>
    </section>

    
    <section id="contact" class="py-24 bg-slate-50 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-14">
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900 gradient-text">
                    Get In Touch
                </h2>
                <p class="mt-4 text-slate-500 text-sm font-medium">
                    Open to software collaborations, freelance projects, or internship positions.
                </p>
            </div>

            <div class="glass-card rounded-3xl overflow-hidden md:grid md:grid-cols-5 bg-white border border-slate-200">
                
                <div class="md:col-span-2 bg-gradient-to-br from-[#2563EB] to-[#7C3AED] p-8 flex flex-col justify-between text-white shadow-xl shadow-blue-500/10">
                    <div>
                        <h3 class="font-heading font-bold text-lg mb-2">Contact Information</h3>
                        <p class="text-blue-100 text-xs leading-relaxed mb-8">Contact us via the digital communication channels below.</p>

                        <div class="space-y-4">
                            <a href="mailto:<?php echo e($profile->contact_email); ?>" class="flex items-center gap-3 text-blue-100 hover:text-white transition-colors text-xs group">
                                <span class="w-8.5 h-8.5 rounded-xl bg-white/10 group-hover:bg-white/20 flex items-center justify-center transition-colors shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </span>
                                <span class="truncate font-semibold"><?php echo e($profile->contact_email); ?></span>
                            </a>

                            <?php if(!empty($profile->social_links['instagram'])): ?>
                                <a href="<?php echo e($profile->social_links['instagram']); ?>" target="_blank" class="flex items-center gap-3 text-blue-100 hover:text-white transition-colors text-xs group">
                                    <span class="w-8 h-8 rounded-xl bg-white/10 group-hover:bg-white/20 flex items-center justify-center transition-colors shrink-0">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </span>
                                    <span class="font-semibold">akhunza.kp</span>
                                </a>
                            <?php endif; ?>
                            <?php if(!empty($profile->social_links['github'])): ?>
                                <a href="<?php echo e($profile->social_links['github']); ?>" target="_blank" class="flex items-center gap-3 text-blue-100 hover:text-white transition-colors text-xs group">
                                    <span class="w-8.5 h-8.5 rounded-xl bg-white/10 group-hover:bg-white/20 flex items-center justify-center transition-colors shrink-0">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                                    </span>
                                    <span class="font-semibold">github.com/akhunzakp</span>
                                </a>
                            <?php endif; ?>

                            <a href="https://maps.app.goo.gl/NdFKTGZJx1uSRAPcA" target="_blank" class="flex items-center gap-3 text-blue-100 hover:text-white transition-colors text-xs group">
                                <span class="w-8.5 h-8.5 rounded-xl bg-white/10 group-hover:bg-white/20 flex items-center justify-center transition-colors shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </span>
                                <span class="font-semibold">Madiun, East Java, Indonesia</span>
                            </a>

                        </div>
                    </div>
                    <!-- <div class="flex items-center gap-2 pt-4 border-t border-white/10 mt-8">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-[10px] text-blue-100 font-bold tracking-wide uppercase">Aktif</span>
                    </div> -->
                </div>

                
                <div class="md:col-span-3 p-8">
                    <form onsubmit="event.preventDefault(); alert('Pesan Anda berhasil dikirim. Terima kasih!');" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 mb-1.5 uppercase tracking-wide" for="contact-name">Nama Anda</label>
                                <input type="text" id="contact-name" required placeholder="John Doe"
                                    class="w-full px-4 py-2.5 rounded-xl text-xs bg-slate-50 border border-slate-200 text-[#0F172A] focus:ring-2 focus:ring-[#2563EB]/25 focus:border-[#2563EB] outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 mb-1.5 uppercase tracking-wide" for="contact-email">Alamat Email</label>
                                <input type="email" id="contact-email" required placeholder="email@contoh.com"
                                    class="w-full px-4 py-2.5 rounded-xl text-xs bg-slate-50 border border-slate-200 text-[#0F172A] focus:ring-2 focus:ring-[#2563EB]/25 focus:border-[#2563EB] outline-none transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 mb-1.5 uppercase tracking-wide" for="contact-subject">Subjek</label>
                            <input type="text" id="contact-subject" placeholder="Tawaran Kerja / Pertanyaan Proyek"
                                class="w-full px-4 py-2.5 rounded-xl text-xs bg-slate-50 border border-slate-200 text-[#0F172A] focus:ring-2 focus:ring-[#2563EB]/25 focus:border-[#2563EB] outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 mb-1.5 uppercase tracking-wide" for="contact-message">Pesan Anda</label>
                            <textarea id="contact-message" rows="4" required placeholder="Tuliskan pesan detail Anda di sini..."
                                class="w-full px-4 py-2.5 rounded-xl text-xs bg-slate-50 border border-slate-200 text-[#0F172A] focus:ring-2 focus:ring-[#2563EB]/25 focus:border-[#2563EB] outline-none resize-none"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-xs font-semibold text-white bg-[#2563EB] hover:bg-[#1D4ED8] shadow-md shadow-blue-500/25 transition-all">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>

    
    <footer class="bg-white border-t border-slate-200/80 py-10 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                <p class="text-xs text-slate-400 font-medium">
                    &copy; <?php echo e(date('Y')); ?> <span class="font-semibold text-slate-600"><?php echo e($profile->name); ?></span>. Hak Cipta Dilindungi Undang-Undang.
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

    
    <script>
        // --- Mobile Menu Toggle ---
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu    = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        function closeMobileMenu() {
            mobileMenu.classList.add('hidden');
        }

        // --- Navbar shadow on scroll ---
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                navbar.classList.add('shadow-md', 'shadow-slate-200/40');
            } else {
                navbar.classList.remove('shadow-md', 'shadow-slate-200/40');
            }
        });

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
    </script>

</body>
</html>
<?php /**PATH /home/server/Reka/Orientasi-Magang/Putra/Web-Portofolio/resources/views/index.blade.php ENDPATH**/ ?>