<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Alex Rivera | Lead Full-Stack Engineer')</title>
    
    <!-- Google Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Anti-Flash Theme Switcher Script -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || 
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light-bg text-light-text dark:bg-dark-bg dark:text-dark-text font-sans antialiased transition-colors duration-300 min-h-screen flex flex-col">
    
    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-light-card/85 dark:bg-dark-card/85 backdrop-blur-md border-b border-slate-200/50 dark:border-slate-800/50 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="#" class="text-xl font-bold tracking-tight text-light-accent dark:text-dark-accent flex items-center gap-2">
                        <span class="bg-gradient-to-r from-light-accent to-blue-500 dark:from-dark-accent dark:to-cyan-400 text-white w-8 h-8 rounded-lg flex items-center justify-center font-extrabold shadow-md">
                            {{ isset($profile) ? collect(explode(' ', $profile->name))->map(fn($n) => $n[0])->first() : 'Y' }}
                        </span>
                        <span>
                            @if(isset($profile))
                                @php
                                    $names = explode(' ', $profile->name);
                                    $firstName = $names[0] ?? 'Yuma';
                                    $secondName = $names[1] ?? 'Akhunza';
                                @endphp
                                {{ $firstName }}<span class="text-slate-400 dark:text-slate-500">.</span>{{ $secondName }}
                            @else
                                Yuma<span class="text-slate-400 dark:text-slate-500">.</span>Akhunza
                            @endif
                        </span>
                    </a>
                </div>
                
                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex space-x-8 items-center">
                    <a href="#about" class="text-sm font-medium hover:text-light-accent dark:hover:text-dark-accent transition-colors duration-200">About</a>
                    <a href="#skills" class="text-sm font-medium hover:text-light-accent dark:hover:text-dark-accent transition-colors duration-200">Skills</a>
                    <a href="#projects" class="text-sm font-medium hover:text-light-accent dark:hover:text-dark-accent transition-colors duration-200">Projects</a>
                    <a href="#contact" class="text-sm font-medium hover:text-light-accent dark:hover:text-dark-accent transition-colors duration-200">Contact</a>
                    
                    <!-- Theme Toggle Switcher -->
                    <button id="theme-toggle" class="p-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:ring-2 hover:ring-slate-300 dark:hover:ring-slate-700 transition-all duration-200" aria-label="Toggle theme">
                        <!-- Sun Icon (for dark mode) -->
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                        </svg>
                        <!-- Moon Icon (for light mode) -->
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                </nav>
                
                <!-- Mobile menu button & theme switcher -->
                <div class="flex items-center md:hidden gap-2">
                    <!-- Theme Switcher for Mobile -->
                    <button id="theme-toggle-mobile" class="p-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 transition-all duration-200" aria-label="Toggle theme">
                        <svg id="theme-toggle-light-icon-mob" class="hidden w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                        </svg>
                        <svg id="theme-toggle-dark-icon-mob" class="hidden w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                    
                    <button id="mobile-menu-button" class="p-2 rounded-md text-slate-500 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white focus:outline-none" aria-label="Open main menu">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="menu-icon-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path id="menu-icon-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu, show/hide based on menu state. -->
        <div id="mobile-menu" class="hidden md:hidden bg-light-card dark:bg-dark-card border-t border-slate-200/50 dark:border-slate-800/50 transition-colors duration-300">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 text-center">
                <a href="#about" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-slate-100 dark:hover:bg-slate-800">About</a>
                <a href="#skills" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-slate-100 dark:hover:bg-slate-800">Skills</a>
                <a href="#projects" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-slate-100 dark:hover:bg-slate-800">Projects</a>
                <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-slate-100 dark:hover:bg-slate-800">Contact</a>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-light-card dark:bg-dark-card border-t border-slate-200/50 dark:border-slate-800/50 py-8 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-sm text-slate-500 dark:text-slate-400">
                    &copy; {{ date('Y') }} {{ isset($profile) ? $profile->name : 'Yuma Akhunza' }}. All rights reserved. Built with Laravel 11 and Tailwind CSS.
                </div>
                <div class="flex space-x-6">
                    <a href="#about" class="text-sm text-slate-500 hover:text-light-accent dark:hover:text-dark-accent">About</a>
                    <a href="#skills" class="text-sm text-slate-500 hover:text-light-accent dark:hover:text-dark-accent">Skills</a>
                    <a href="#projects" class="text-sm text-slate-500 hover:text-light-accent dark:hover:text-dark-accent">Projects</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Toggle Theme implementation -->
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleMobileBtn = document.getElementById('theme-toggle-mobile');
        
        const lightIcons = [
            document.getElementById('theme-toggle-light-icon'),
            document.getElementById('theme-toggle-light-icon-mob')
        ];
        const darkIcons = [
            document.getElementById('theme-toggle-dark-icon'),
            document.getElementById('theme-toggle-dark-icon-mob')
        ];
        
        // Function to update icon visibility based on dark class
        function updateThemeIcons() {
            const isDark = document.documentElement.classList.contains('dark');
            lightIcons.forEach(icon => {
                if (icon) {
                    if (isDark) icon.classList.remove('hidden');
                    else icon.classList.add('hidden');
                }
            });
            darkIcons.forEach(icon => {
                if (icon) {
                    if (isDark) icon.classList.add('hidden');
                    else icon.classList.remove('hidden');
                }
            });
        }
        
        // Initial setup
        updateThemeIcons();
        
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
            updateThemeIcons();
        }
        
        if (themeToggleBtn) themeToggleBtn.addEventListener('click', toggleTheme);
        if (themeToggleMobileBtn) themeToggleMobileBtn.addEventListener('click', toggleTheme);
        
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIconOpen = document.getElementById('menu-icon-open');
        const menuIconClose = document.getElementById('menu-icon-close');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                menuIconOpen.classList.toggle('hidden');
                menuIconClose.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
