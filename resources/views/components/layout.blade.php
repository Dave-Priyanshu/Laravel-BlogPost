<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg">
        <nav>
            <a href="{{ route('home')}}" class="nav-link">Home</a>

            @auth
            <div class="relative grid place-items-center" x-data="{ open: false }">
                {{-- Dropdown menu button --}}
                <button @click="open = !open" type="button" class="round-btn">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </button>

                {{-- Dropdown menu --}}
                <div x-show="open" @click.outside="open = false" class="dropdown">
                    <p class="username">{{ auth()->user()->username }}</p>
                    <a href="#" class="block hover:bg-slate-100">DashBoard</a>
                    <a href="#" class="block hover:bg-slate-100">Profile</a>
                    <a href="#" class="block hover:bg-slate-100">Logout</a>
                </div>
            </div>
        @endauth
            
            @guest
            <div class="flex items-center gap-4">
                <a href="#" class="nav-link">Login</a>
                <a href="{{ route('register')}}" class="nav-link">Register</a>
            </div>
            @endguest
        </nav>
    </header>

    <main class="py-8 px-4 mx-auto max-w-screen-lg">
        {{-- @yield('main') (# used only with a @section() which contains the
        same name as given in the @yield in our case is 'main'  ) --}}
        {{ $slot }}
    </main>
    
</body>
</html>