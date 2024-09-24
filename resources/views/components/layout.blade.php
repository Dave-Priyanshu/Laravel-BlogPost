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
<body class=" bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg">
        <nav>
            <a href="{{ route('posts.index')}}" class="nav-link">Home</a>

            @auth
            <div class="relative grid place-items-center" x-data="{ open: false }">
                {{-- Dropdown menu button --}}
                <button @click="open = !open" type="button" class="round-btn">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </button>

                {{-- Dropdown menu --}}
                <div x-show="open" @click.outside="open = false" class="dropdown bg-white shadow-lg rounded-lg p-2 absolute right-0 z-10">
                    <p class="username font-semibold text-gray-800">{{ auth()->user()->username }}</p>
                    
                    {{-- Dashboard Link --}}
                    <a href="{{ route('dashboard') }}" class="block hover:bg-slate-100 px-4 py-2 rounded">Dashboard</a>

                    {{-- Profile Link --}}
                    <a href="#" class="block hover:bg-slate-100 px-4 py-2 rounded">Profile</a>

                    {{-- Logout Form --}}
                    <form action="{{ route('logout') }}" method="POST" class="">
                        @csrf
                        <button type="submit" class="block text-left hover:bg-slate-100 px-4 py-2 rounded w-full">Logout</button>
                    </form>
                </div>
            </div>
        @endauth
            
            @guest
            <div class="flex items-center gap-4">
                <a href="{{ route('login')}}" class="nav-link">Login</a>
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