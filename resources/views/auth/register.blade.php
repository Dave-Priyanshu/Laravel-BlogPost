<x-layout>
    <h1 class="text-2xl font-bold text-center border-b pb-2 my-6">Register a New Account</h1>    

    <div class="mx-auto max-w-screen-sm p-6 bg-white rounded-lg shadow-lg">

        <form action="{{ route('register')}}" method="POST" x-data="formSubmit" @submit.prevent="submit">
            @csrf

            {{-- Username --}}
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" value="{{ old('username')}}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" placeholder="Enter your username" >
                @error('username')
                    <p class="error"> {{$message}}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" name="email" value="{{ old('email')}}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" placeholder="Enter your email" >
                @error('email')
                    <p class="error"> {{$message}}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" placeholder="Enter your password" >
                <div id="password-strength" class="mt-1 text-sm"></div>
                @error('password')
                    <p class="error"> {{$message}}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" placeholder="Re-enter your password" >
            </div>

            {{-- Show/Hide Password Feature
            <div class="flex items-center mb-4">
                <input type="checkbox" id="show-password" class="mr-2">
                <label for="show-password" class="text-sm">Show Password</label>
            </div> --}}

            {{-- subscribe checkbox --}}
            <div class="flex items-center mb-4">
                <input type="checkbox" name="subscribe" id="subscribe" class="toggle-checkbox mr-2" >
                <label for="subscribe" class="text-sm">Subscribe to our newsletter</label>
            </div>

            {{-- Submit button --}}
            <div class="mb-4">
                <button x-ref="btn" type="submit" class="w-full bg-blue-600 text-white font-semibold rounded-md py-2 hover:bg-blue-700 transition duration-200">Register</button>
            </div>

            {{-- Social Media Login Options --}}
            <div class="flex justify-center space-x-4 mt-4">
                <a href="{{ route('googlelogin') }}" class="bg-red-600 text-white rounded-md px-4 py-2 hover:bg-red-700 transition duration-200">Register with Google</a>
                {{-- <a href="#" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-200">Register with Facebook</a> --}}
            </div>

            <div class="text-sm text-center mt-4">
                <p>Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here</a>.</p>
            </div>
        </form>
    </div>
</x-layout>

<script>
    // Show/Hide Password Logic
    document.getElementById('show-password').addEventListener('change', function() {
        const passwordInputs = document.querySelectorAll('input[type="password"], input[type="text"]');
        passwordInputs.forEach(input => {
            input.type = this.checked ? 'text' : 'password';
        });
    });

    // Password Strength Indicator Logic
    const passwordInput = document.getElementById('password');
    const passwordStrength = document.getElementById('password-strength');

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 'Weak';
        let color = 'text-red-700';

        if (password.length > 8 && /[\W_]/.test(password) && /[A-Z]/.test(password) && /[0-9]/.test(password)) {
            strength = 'Strong';
            color = 'text-green-500';
        } else if (password.length >= 6) {
            strength = 'Medium';
            color = 'text-yellow-500';
        }

        passwordStrength.textContent = `Password Strength: ${strength}`;
        passwordStrength.className = `mt-1 text-sm ${color}`;
    });
</script>
