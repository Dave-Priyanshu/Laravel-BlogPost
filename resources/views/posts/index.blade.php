<x-layout>
    <h1 class="title text-3xl font-bold text-gray-800 mb-8">Latest Posts</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($posts as $post)

            <div class="card bg-white shadow-md rounded-lg p-6 transition duration-300 ease-in-out hover:shadow-lg hover:scale-105">
                {{-- Title --}}
                <h2 class="font-bold text-2xl text-gray-800 mb-2">{{ $post->title }}</h2>

                {{-- Author & Date --}}
                <div class="text-xs text-gray-500 font-light mb-4">
                    <span>Posted {{ $post->created_at->diffForHumans() }}</span>
                    <a href="" class="text-blue-500 font-medium ml-2">USERNAME</a>
                </div>

                {{-- Body --}}
                <div class="text-sm text-gray-700">
                    <p>{{ Str::words($post->body, 15) }}</p>
                </div>

                {{-- Read More Button --}}
                <a href="{{ route('posts.show', $post->id) }}" class="inline-block mt-4 text-sm text-blue-500 hover:text-blue-700 font-medium">
                    Read More →
                </a>
            </div>

        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</x-layout>
