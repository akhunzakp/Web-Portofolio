@extends('layouts.layout')

@section('title', $profile->name . ' | ' . $profile->title)

@section('content')
<!-- Hero Section -->
<section id="about" class="py-20 lg:py-32 overflow-hidden relative">
    <!-- Visual background glow elements -->
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-blue-500/10 dark:bg-blue-400/5 rounded-full blur-3xl -z-10"></div>
    <div class="absolute top-1/3 left-1/3 w-[300px] h-[300px] bg-purple-500/10 dark:bg-purple-400/5 rounded-full blur-3xl -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-12 items-center">
            <!-- Left Info Column -->
            <div class="text-center lg:text-left lg:col-span-7">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 mb-6">
                    <span class="w-2 h-2 rounded-full bg-blue-600 dark:bg-blue-400 animate-pulse"></span>
                    Available for Front-End & UI/UX Roles
                </span>
                
                <h1 class="text-4xl tracking-tight font-extrabold text-slate-900 dark:text-white sm:text-5xl md:text-6xl">
                    <span class="block">Hi, I'm</span>
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-light-accent to-blue-600 dark:from-dark-accent dark:to-cyan-400">
                        Yuma Akhunza
                    </span>
                </h1>
                
                <p class="mt-3 text-lg font-semibold text-slate-700 dark:text-slate-200 sm:text-xl">
                    {{ $profile->title }}
                </p>
                
                <p class="mt-6 text-base text-slate-500 dark:text-slate-400 leading-relaxed sm:text-lg max-w-2xl mx-auto lg:mx-0">
                    {{ $profile->bio }}
                </p>
                
                <!-- CTA & Socials -->
                <div class="mt-10 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="{{ asset($profile->cv_path) }}" download class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-semibold rounded-xl shadow-lg shadow-blue-500/20 dark:shadow-none text-white bg-light-accent dark:bg-dark-accent hover:opacity-95 transition-all duration-200 transform hover:-translate-y-0.5">
                        <svg class="-ml-1 mr-2.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download CV
                    </a>
                    
                    <a href="#contact" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 border border-slate-300 dark:border-slate-700 text-base font-semibold rounded-xl text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-all duration-200 transform hover:-translate-y-0.5">
                        Contact Me
                    </a>
                </div>
                
                <!-- Social Icons -->
                <div class="mt-10 flex justify-center lg:justify-start space-x-6">
                    @if(isset($profile->social_links['github']))
                        <a href="{{ $profile->social_links['github'] }}" target="_blank" class="text-slate-400 hover:text-light-accent dark:hover:text-dark-accent transition-colors duration-200">
                            <span class="sr-only">GitHub</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                    @if(isset($profile->social_links['linkedin']))
                        <a href="{{ $profile->social_links['linkedin'] }}" target="_blank" class="text-slate-400 hover:text-light-accent dark:hover:text-dark-accent transition-colors duration-200">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                    @if(isset($profile->social_links['twitter']))
                        <a href="{{ $profile->social_links['twitter'] }}" target="_blank" class="text-slate-400 hover:text-light-accent dark:hover:text-dark-accent transition-colors duration-200">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
            
            <!-- Right Avatar Column -->
            <div class="mt-12 lg:mt-0 lg:col-span-5 flex justify-center">
                <div class="relative w-64 h-64 sm:w-80 sm:h-80 md:w-96 md:h-96">
                    <!-- Dynamic Geometric BG Glow -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-light-accent to-purple-500 rounded-3xl rotate-6 opacity-35 blur-2xl animate-pulse"></div>
                    <div class="absolute inset-0 bg-gradient-to-bl from-blue-400 to-indigo-600 rounded-3xl -rotate-3 opacity-25 blur-lg"></div>
                    
                    <!-- Profile Card Container -->
                    <div class="relative w-full h-full rounded-3xl overflow-hidden border border-slate-200/50 dark:border-slate-800/50 shadow-2xl bg-light-card dark:bg-dark-card flex items-center justify-center p-3">
                        @if(file_exists(public_path($profile->photo_path)))
                            <img src="{{ asset($profile->photo_path) }}" alt="{{ $profile->name }}" class="w-full h-full object-cover rounded-2xl">
                        @else
                            <!-- Fallback UI Card -->
                            <div class="w-full h-full rounded-2xl bg-gradient-to-br from-slate-100 to-slate-200 dark:from-slate-800/50 dark:to-slate-900/50 flex flex-col items-center justify-center text-center p-6 border border-slate-200 dark:border-slate-700">
                                <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-full bg-gradient-to-tr from-light-accent to-blue-500 text-white flex items-center justify-center text-3xl sm:text-4xl font-bold shadow-lg mb-4">
                                    YP
                                </div>
                                <h3 class="font-extrabold text-slate-800 dark:text-white text-xl">{{ $profile->name }}</h3>
                                <p class="text-sm font-semibold text-light-accent dark:text-dark-accent mt-1">UI/UX & Front-End</p>
                                
                                <!-- Modern Floating Leadership Badge -->
                                <span class="mt-5 inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold bg-amber-500/10 text-amber-600 dark:bg-amber-400/10 dark:text-amber-300 border border-amber-500/20">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Vice Chairman @ DPM Polinema
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-20 bg-white/50 dark:bg-slate-900/30 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white sm:text-4xl">
                Technical Expertise Matrix
            </h2>
            <p class="mt-4 text-lg text-slate-500 dark:text-slate-400">
                A structured overview of core competencies built around standard frameworks and tools.
            </p>
        </div>
        
        <!-- Skills Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $categories = [
                    'frontend' => [
                        'title' => 'Front-End Development', 
                        'desc' => 'High-fidelity UI implementation and modular state management workflows.',
                        'color' => 'from-blue-500 to-indigo-600',
                        'bg' => 'group-hover:border-blue-500/30 dark:group-hover:border-blue-500/20'
                    ],
                    'backend' => [
                        'title' => 'Back-End & DB Systems', 
                        'desc' => 'Robust MVC services, relational databases, and data processing automation.',
                        'color' => 'from-indigo-600 to-light-accent',
                        'bg' => 'group-hover:border-indigo-500/30 dark:group-hover:border-indigo-500/20'
                    ],
                    'design_tools' => [
                        'title' => 'Design Systems & Workflows', 
                        'desc' => 'Interactive UI design systems, vectors, and collaboration management.',
                        'color' => 'from-pink-500 to-purple-600',
                        'bg' => 'group-hover:border-pink-500/30 dark:group-hover:border-pink-500/20'
                    ]
                ];
            @endphp

            @foreach($categories as $key => $meta)
                <div class="group bg-light-card dark:bg-dark-card rounded-3xl p-8 border border-slate-100 dark:border-slate-800 shadow-md hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 flex flex-col justify-between {{ $meta['bg'] }}">
                    <div>
                        <div class="flex items-center gap-3.5 mb-5">
                            <div class="w-3.5 h-8 rounded-full bg-gradient-to-b {{ $meta['color'] }}"></div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white">{{ $meta['title'] }}</h3>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-8 leading-relaxed">
                            {{ $meta['desc'] }}
                        </p>
                        
                        <!-- Capability Tag Cards -->
                        <div class="space-y-4">
                            @if(isset($skills[$key]) && $skills[$key]->count() > 0)
                                @foreach($skills[$key] as $skill)
                                    @php
                                        // Parse 'Name (Capability Tag)'
                                        preg_match('/([^(]+)\s*\(([^)]+)\)/', $skill->name, $matches);
                                        $skillName = isset($matches[1]) ? trim($matches[1]) : $skill->name;
                                        $capability = isset($matches[2]) ? trim($matches[2]) : 'Core capability';
                                    @endphp
                                    <div class="bg-slate-50/50 dark:bg-slate-800/40 rounded-2xl p-4 border border-slate-100/80 dark:border-slate-800/80 flex items-start gap-3">
                                        <div class="mt-1 w-2.5 h-2.5 rounded-full bg-gradient-to-r {{ $meta['color'] }}"></div>
                                        <div>
                                            <h4 class="text-sm font-bold text-slate-800 dark:text-slate-200">{{ $skillName }}</h4>
                                            <span class="text-xs text-slate-400 dark:text-slate-500 font-medium block mt-0.5">{{ $capability }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-sm text-slate-400 dark:text-slate-500 italic">No skills registered yet.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white sm:text-4xl">
                Featured Engineering Projects
            </h2>
            <p class="mt-4 text-lg text-slate-500 dark:text-slate-400">
                A selection of high-impact software, computer vision tools, and analytical structures.
            </p>
        </div>
        
        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <!-- Project Card -->
                <div class="group bg-light-card dark:bg-dark-card rounded-3xl overflow-hidden border border-slate-100 dark:border-slate-800 shadow-md hover:-translate-y-1.5 hover:shadow-2xl transition-all duration-300 flex flex-col h-full {{ $project->is_featured ? 'md:col-span-2 lg:col-span-2 ring-2 ring-light-accent dark:ring-dark-accent/40' : '' }}">
                    
                    <!-- Banner Image Container -->
                    <div class="relative overflow-hidden aspect-video bg-gradient-to-br from-slate-100 to-slate-200 dark:from-slate-800 dark:to-slate-900 flex items-center justify-center">
                        @if(file_exists(public_path($project->image_path)))
                            <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <!-- Fallback UI Banner with dynamic titles and badges -->
                            <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 flex flex-col items-center justify-center p-6 text-center border-b border-slate-800">
                                <div class="w-12 h-12 rounded-xl bg-indigo-500/20 text-indigo-300 flex items-center justify-center mb-3">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                </div>
                                <span class="text-xs uppercase tracking-widest text-indigo-400 font-bold mb-1">Production Release</span>
                                <h4 class="text-md sm:text-lg font-bold text-slate-100 line-clamp-1 px-4">{{ $project->title }}</h4>
                            </div>
                        @endif
                        
                        <!-- Featured Badge -->
                        @if($project->is_featured)
                            <div class="absolute top-4 left-4 z-10">
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold bg-light-accent dark:bg-dark-accent text-white shadow-md">
                                    ★ Featured Build
                                </span>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6 sm:p-8 flex flex-col flex-grow">
                        <!-- Tech Badges (Elegant Accent Blue Theme) -->
                        <div class="flex flex-wrap gap-2 mb-5">
                            @foreach($project->tech_stack as $tech)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-200">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                        
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-light-accent dark:group-hover:text-dark-accent transition-colors duration-200">
                            {{ $project->title }}
                        </h3>
                        
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-6 flex-grow">
                            {{ $project->description }}
                        </p>
                        
                        <!-- Links -->
                        <div class="flex items-center justify-between border-t border-slate-100 dark:border-slate-800 pt-5 mt-auto">
                            <div class="flex gap-5">
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" class="text-sm font-semibold text-slate-600 hover:text-light-accent dark:text-slate-400 dark:hover:text-dark-accent flex items-center gap-1.5 transition-colors duration-200">
                                        <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                        </svg>
                                        View on GitHub
                                    </a>
                                @endif
                                @if($project->project_url)
                                    <a href="{{ $project->project_url }}" target="_blank" class="text-sm font-semibold text-slate-600 hover:text-light-accent dark:text-slate-400 dark:hover:text-dark-accent flex items-center gap-1.5 transition-colors duration-200">
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                        Live Demo
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-white/50 dark:bg-slate-900/30 border-t border-slate-200/50 dark:border-slate-800/50 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white sm:text-4xl">
                    Get In Touch
                </h2>
                <p class="mt-4 text-lg text-slate-500 dark:text-slate-400">
                    Have an exciting project or design requirement? Drop a message, and let's construct it.
                </p>
            </div>
            
            <div class="bg-light-card dark:bg-dark-card rounded-3xl shadow-xl overflow-hidden border border-slate-100 dark:border-slate-800 p-8 sm:p-12 md:grid md:grid-cols-12 md:gap-8">
                <!-- Left panel: details -->
                <div class="md:col-span-5 mb-8 md:mb-0 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Direct Contact</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm mb-6">Drop a direct email or join a discussion on LinkedIn.</p>
                        
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-blue-900/40 text-light-accent dark:text-dark-accent flex items-center justify-center flex-shrink-0">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-slate-700 dark:text-slate-300 truncate">{{ $profile->contact_email }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 border-t border-slate-100 dark:border-slate-800 pt-6">
                        <span class="text-xs uppercase tracking-wider text-slate-400 font-bold block mb-2">Time Zone</span>
                        <p class="text-sm font-medium text-slate-700 dark:text-slate-300">Malang, ID / West Indonesian Time (GMT+7)</p>
                    </div>
                </div>
                
                <!-- Right panel: Quick form -->
                <div class="md:col-span-7 border-t border-slate-100 dark:border-slate-800 pt-8 md:pt-0 md:border-t-0 md:border-l md:pl-8">
                    <form action="#" class="space-y-4" onsubmit="event.preventDefault(); alert('Thank you! This is a demo form placeholder.');">
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Your Name</label>
                            <input type="text" id="name" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-light-accent dark:focus:ring-dark-accent focus:border-transparent outline-none text-sm transition-all duration-200">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Email Address</label>
                            <input type="email" id="email" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-light-accent dark:focus:ring-dark-accent focus:border-transparent outline-none text-sm transition-all duration-200">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Message</label>
                            <textarea id="message" rows="4" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-light-accent dark:focus:ring-dark-accent focus:border-transparent outline-none text-sm transition-all duration-200"></textarea>
                        </div>
                        <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-semibold rounded-xl shadow-md text-white bg-light-accent dark:bg-dark-accent hover:opacity-90 transition-all duration-200">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
