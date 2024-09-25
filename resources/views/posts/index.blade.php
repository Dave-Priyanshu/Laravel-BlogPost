<x-layout>
    <h1 class="title text-3xl font-bold text-gray-800 border-b-2 pb-3 mb-8">Latest Posts</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post"/>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</x-layout>
