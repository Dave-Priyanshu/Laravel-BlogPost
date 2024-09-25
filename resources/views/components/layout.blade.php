<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


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

    <script>
        // Set form: x-data="formSubmit" @submit.prevent="submit" and button: x-ref="btn"
        document.addEventListener('alpine:init', () => {
            Alpine.data('formSubmit', () => ({
                submit() {
                    this.$refs.btn.disabled = true;
                    this.$refs.btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                    this.$refs.btn.classList.add('bg-indigo-400');
                    this.$refs.btn.innerHTML =
                        `<span class="absolute left-2 top-1/2 -translate-y-1/2 transform">
                        <i class="fa-solid fa-spinner animate-spin"></i>
                        </span>Please wait...`;

                    this.$el.submit()
                }
            }))
        })
    </script>
    
</body>
</html>