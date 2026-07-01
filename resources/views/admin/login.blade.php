<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Portfolio</title>
    
    <script>
        (function() {
            var stored = localStorage.getItem('theme');
            var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (stored === 'dark' || (!stored && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, .font-heading { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 min-h-screen flex items-center justify-center p-4 transition-colors duration-300">

    <div class="w-full max-w-md bg-white dark:bg-slate-800 rounded-3xl border border-slate-200/50 dark:border-slate-700/50 shadow-2xl p-8 relative overflow-hidden">
        {{-- Background gradients --}}
        <div class="absolute -top-32 -left-32 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-8 relative z-10">
            <span class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 dark:from-blue-500 dark:to-indigo-500 flex items-center justify-center text-white font-heading font-extrabold text-xl shadow-lg shadow-blue-500/20 mx-auto mb-4">P</span>
            <h1 class="text-2xl font-bold tracking-tight">Admin Portal</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1.5">Sign in to manage your portfolio architecture</p>
        </div>

        @if(session('error'))
            <div class="mb-5 p-3.5 rounded-xl text-xs font-semibold bg-rose-50 dark:bg-rose-950/20 text-rose-600 dark:text-rose-400 border border-rose-100 dark:border-rose-900/30">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->has('login_error'))
            <div class="mb-5 p-3.5 rounded-xl text-xs font-semibold bg-rose-50 dark:bg-rose-950/20 text-rose-600 dark:text-rose-400 border border-rose-100 dark:border-rose-900/30">
                {{ $errors->first('login_error') }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-5 relative z-10">
            @csrf
            <div>
                <label for="username" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wider">Username</label>
                <input type="text" id="username" name="username" required value="{{ old('username') }}" placeholder="admin"
                    class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none transition-all duration-200">
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wider">Password</label>
                <input type="password" id="password" name="password" required placeholder="••••••••"
                    class="w-full px-4 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 outline-none transition-all duration-200">
            </div>

            <button type="submit"
                class="w-full flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 shadow-lg shadow-blue-500/25 dark:shadow-none transition-all duration-200 transform hover:-translate-y-0.5 active:translate-y-0">
                Log In
            </button>
        </form>

        <div class="mt-8 text-center relative z-10">
            <a href="{{ url('/') }}" class="text-xs font-semibold text-slate-400 hover:text-blue-500 dark:hover:text-blue-400 transition-colors">
                ← Back to public website
            </a>
        </div>
    </div>

</body>
</html>
