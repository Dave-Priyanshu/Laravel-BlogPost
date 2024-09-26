<x-layout>
    <h1 class="text-2xl font-bold text-center border-b pb-2 my-6">Request a password reset email</h1>    

    {{-- session msg --}}
    @if (session('status'))
        <x-flashMsg msg="{{ session('status') }}"  />
    @endif

    <div class="mx-auto max-w-screen-sm p-6 bg-white rounded-lg shadow-lg">

        <form action="{{ route('password.request') }}" method="POST" x-data="formSubmit" @submit.prevent="submit">
            @csrf
            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" name="email" value="{{ old('email')}}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" placeholder="Enter your email" >
                @error('email')
                    <p class="error"> {{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button x-ref="btn" type="submit" class="w-full bg-blue-600 text-white font-semibold rounded-md py-2 hover:bg-blue-700 transition duration-200">Submit</button>
            </div>
        </form>
    </div>
</x-layout>


