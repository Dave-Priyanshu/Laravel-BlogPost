@props(['post'])

<div class="card bg-white shadow-md rounded-lg p-6 transition duration-300 ease-in-out hover:shadow-lg hover:scale-105">
    {{-- Title --}}
    <h2 class="font-bold text-2xl text-gray-800 mb-2">{{ $post->title }}</h2>

    {{-- Author & Date --}}
    <div class="text-xs text-gray-500 font-light mb-4">
        <span>Posted {{ $post->created_at->diffForHumans() }}</span>
        <a href="{{ route('posts.user', $post->user)}}" class="text-blue-500 font-medium ml-2">{{$post->user->username}}</a>
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