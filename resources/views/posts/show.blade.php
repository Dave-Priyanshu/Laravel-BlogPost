<x-layout>
        <x-postCard :post="$post" full fullSize/>
        <div class="mt-4">
            <a href="{{ route('posts.index') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200">
                Back to Posts
            </a>
        </div>
</x-layout>