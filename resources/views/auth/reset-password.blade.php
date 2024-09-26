<x-layout>
    <h1 class="text-2xl font-bold text-center border-b pb-2 my-6">Reset your password</h1>    

    <div class="mx-auto max-w-screen-sm p-6 bg-white rounded-lg shadow-lg">

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
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


            {{-- Submit button --}}
            <div class="mb-4">
                <button  type="submit" class="w-full bg-blue-600 text-white font-semibold rounded-md py-2 hover:bg-blue-700 transition duration-200">Reset Password</button>
            </div>

        </form>
    </div>
</x-layout>

