<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

     <!-- DataTables CSS and JS -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
</head>

<body class="bg-gray-100 text-gray-900">

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-full lg:w-64 bg-blue-900 text-white lg:h-screen p-6">
            <nav>
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="text-lg font-semibold hover:bg-blue-700 p-3 block rounded">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{route('admin.users')}}" class="text-lg font-semibold hover:bg-blue-700 p-3 block rounded">Users</a>
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
            <main class="flex-1 bg-white rounded-lg shadow-lg p-6 mt-4 mb-4 mx-4">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-gray-200 bottom-0  text-center p-4 ">
                <p class="text-gray-600">&copy; 2024 Admin Dashboard. All rights reserved.</p>
            </footer>
        </div>
    </div>
    @stack('scripts')

</body>

</html>
