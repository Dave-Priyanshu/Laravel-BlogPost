<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">

    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <aside class="w-full lg:w-64 bg-blue-900 text-white lg:h-screen p-6">
            <nav>
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="text-lg font-semibold hover:bg-blue-700 p-3 block rounded">Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="text-lg font-semibold hover:bg-blue-700 p-3 block rounded">Users</a>
                    </li>
                    <li>
                        <a href="#" class="text-lg font-semibold hover:bg-blue-700 p-3 block rounded">Settings</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main content area -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-3xl font-semibold text-gray-800">Dashboard</h1>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    Logout
                </button>
            </header>

            <!-- Main Content -->
            <main class="flex-1 bg-white rounded-lg shadow-lg p-6 mt-4 mx-4">
                <section class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Welcome to the Admin Panel</h2>
                    <p class="text-gray-600">This is where you can manage your application.</p>
                </section>

                <!-- Dynamic content goes here -->
                <section>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Card example -->
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold text-gray-700">Users</h3>
                            <p class="text-gray-500">Manage user accounts and permissions.</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold text-gray-700">Settings</h3>
                            <p class="text-gray-500">Update application settings and preferences.</p>
                        </div>
                    </div>
                </section>
            </main>

            <!-- Footer -->
            <footer class="bg-gray-200 text-center p-4 mt-4">
                <p class="text-gray-600">&copy; 2024 Admin Dashboard. All rights reserved.</p>
            </footer>
        </div>
    </div>

</body>

</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">

    <div class="flex ">

        <!-- Sidebar -->
        <aside class="w-64 bg-slate-800 shadow-lg flex flex-col">
            <div class="flex items-center justify-center h-14 bg-slate-900">
                <h1 class="text-white text-2xl font-bold">Admin Panel</h1>
            </div>
            <nav class="flex-col px-2 py-4 space-y-2 overflow-y-auto">
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-slate-300 hover:bg-slate-700 hover:text-white rounded-md">
                    <i class="fa-solid fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="{{ route('posts.index') }}" class="flex items-center p-2 text-slate-300 hover:bg-slate-700 hover:text-white rounded-md">
                    <i class="fa-solid fa-newspaper mr-2"></i> Posts
                </a>
                <a href="{{ route('rules') }}" class="flex items-center p-2 text-slate-300 hover:bg-slate-700 hover:text-white rounded-md">
                    <i class="fa-solid fa-book mr-2"></i> Rules
                </a>
                <a href="#" class="flex items-center p-2 text-slate-300 hover:bg-slate-700 hover:text-white rounded-md">
                    <i class="fa-solid fa-cog mr-2"></i> Settings
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center p-2 text-slate-300 hover:bg-slate-700 hover:text-white rounded-md">
                        <i class="fa-solid fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-slate-800 shadow-lg">
                <nav class="flex justify-between items-center p-4">
                    <a href="{{ route('posts.index') }}" class="text-white font-bold text-lg">Home</a>
                    <div class="text-white font-bold">
                        Welcome, {{ Auth::user()->name ?? 'Admin' }}
                    </div>
                </nav>
            </header>

            <!-- Main Section -->
            <main class="flex-1 py-8 px-4 mx-auto max-w-screen-lg overflow-auto">
                <h2 class="text-2xl font-bold text-gray-700">Admin Dashboard</h2>
                <p class="mt-4 text-gray-600">Here you can manage posts, users, and settings.</p>
            </main>
        </div>
    </div>

    <script>
        // Form submission handling
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
</html> --}}
