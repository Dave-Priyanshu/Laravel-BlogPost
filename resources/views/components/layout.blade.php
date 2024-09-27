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
        <nav class="flex justify-between items-center p-4">
            <!-- Home Link -->
            <a href="{{ route('posts.index')}}" class="nav-link text-white font-bold text-lg">Home</a>
    
            <!-- Authentication Links -->
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="">
                        @csrf
                        <button type="submit" class="text-white">Logout</button>
                    </form>
                @endauth
    
                @guest
                    <a href="{{ route('rules')}}" class="nav-link text-white">Rules</a>
                    <a href="{{ route('login')}}" class="nav-link text-white">Login</a>
                    <a href="{{ route('register')}}" class="nav-link text-white">Register</a>
                    <a href="{{ route('admin.users')}}" class="nav-link text-white">admin users</a>
                @endguest
            </div>
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