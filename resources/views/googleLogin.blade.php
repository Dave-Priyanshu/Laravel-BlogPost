<x-layout>
    <div class="flex flex-col items-center justify-center h-screen bg-gray-100">
        <!-- Google Login Coming Soon Message -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Google Login Coming Soon!</h1>
            <p class="text-gray-600">We're working hard to bring you the Google login feature. Stay tuned for updates!</p>
        </div>

        <!-- Google Login Replica -->
        <div class="bg-white shadow-lg rounded-lg p-6 text-center z-10 relative max-w-2xl w-full border border-gray-300">
            <div class="flex">
                <!-- Left side: Instructions -->
                <div class="w-1/2 border-r border-gray-200 p-4">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Choose an account</h2>
                    <p class="text-sm text-gray-600">to continue to your Google Account</p>
                </div>

                <!-- Right side: Accounts list with images -->
                <div class="w-1/2 p-4">
                    <div class="flex items-center mb-4 hover:bg-gray-100 p-2 rounded-md transition">
                        <img src="{{ asset('assets/images/man.png') }}" class="rounded-full mr-3 w-10 h-10"> <!-- Adjusted size -->
                        <div>
                            <p class="text-sm text-gray-800">john.doe@example.com</p>
                            <p class="text-xs text-gray-500">Personal account</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4 hover:bg-gray-100 p-2 rounded-md transition">
                        <img src="{{ asset('assets/images/man2.png') }}" class="rounded-full mr-3 w-10 h-10"> <!-- Adjusted size -->
                        <div>
                            <p class="text-sm text-gray-800">jane.smith@work.com</p>
                            <p class="text-xs text-gray-500">Work account</p>
                        </div>
                    </div>

                    <!-- Security message -->
                    <p class="text-xs text-gray-500 mt-6">Not your device? Use a private window to sign in securely.</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
