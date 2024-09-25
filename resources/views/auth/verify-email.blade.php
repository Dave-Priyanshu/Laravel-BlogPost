<x-layout>
    <div class="flex  items-center justify-center min-h-[60vh] bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
            <h1 class="text-3xl font-semibold mb-4 text-gray-800 text-center">Verify Your Email</h1>

            <p class="text-gray-600 text-center mb-6">
                A verification email has been sent to your email address. Please check your inbox.
            </p>

            <p class="text-gray-600 text-center mb-4">Didn't receive the email?</p>

            <form action="{{ route('verification.send') }}" method="post" class="text-center">
                @csrf
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                    Resend Verification Email
                </button>
            </form>

            @if (session('message'))
                <p class="mt-4 text-green-600 text-center">
                    {{ session('message') }}
                </p>
            @endif
        </div>
    </div>
</x-layout>
