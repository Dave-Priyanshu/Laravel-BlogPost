<!-- /var/www/html/laravel/Demo-app/resources/views/admin/dashboard.blade.php -->
<x-adminLayout>
    <div class="container mx-auto p-10 mt-10 max-w-7xl">
        <h1 class="text-4xl font-bold text-blue-800 mb-8 text-center">Welcome to the Admin Dashboard</h1>

        <div class="flex flex-wrap justify-center gap-6">
            <!-- Users Card -->
            <div class="bg-white rounded-lg shadow-lg p-6 w-72 text-center transition transform hover:scale-105 hover:shadow-xl">
                <a href="{{ route('admin.users') }}" class="text-blue-700 hover:text-blue-800">
                    <div class="icon text-blue-600 mb-4">
                        <i class="fas fa-users text-5xl"></i>
                    </div>
                    <span class="text-xl font-semibold">Users</span>
                    <p class="mt-2 text-gray-500">Manage all registered users</p>
                </a>
            </div>

            <!-- Posts Card -->
            <div class="bg-white rounded-lg shadow-lg p-6 w-72 text-center transition transform hover:scale-105 hover:shadow-xl">
                <a href="" class="text-blue-700 hover:text-blue-800">
                    <div class="icon text-blue-600 mb-4">
                        <i class="fas fa-pencil-alt text-5xl"></i>
                    </div>
                    <span class="text-xl font-semibold">Posts</span>
                    <p class="mt-2 text-gray-500">Create and manage posts</p>
                </a>
            </div>

            <!-- Analytics Card -->
            <div class="bg-white rounded-lg shadow-lg p-6 w-72 text-center transition transform hover:scale-105 hover:shadow-xl">
                <a href="" class="text-blue-700 hover:text-blue-800">
                    <div class="icon text-blue-600 mb-4">
                        <i class="fas fa-chart-line text-5xl"></i>
                    </div>
                    <span class="text-xl font-semibold">Analytics</span>
                    <p class="mt-2 text-gray-500">View site analytics</p>
                </a>
            </div>

            <!-- Settings Card -->
            <div class="bg-white rounded-lg shadow-lg p-6 w-72 text-center transition transform hover:scale-105 hover:shadow-xl">
                <a href="" class="text-blue-700 hover:text-blue-800">
                    <div class="icon text-blue-600 mb-4">
                        <i class="fas fa-cog text-5xl"></i>
                    </div>
                    <span class="text-xl font-semibold">Settings</span>
                    <p class="mt-2 text-gray-500">Configure your dashboard settings</p>
                </a>
            </div>
        </div>
    </div>
</x-adminLayout>
