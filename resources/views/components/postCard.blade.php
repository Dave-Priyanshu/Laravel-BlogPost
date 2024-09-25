@props(['post', 'full' => false])

<div class="card bg-white shadow-md rounded-lg p-6 transition duration-300 ease-in-out hover:shadow-lg">
    {{-- Title --}}
    <h2 class="font-bold text-2xl text-gray-800 mb-2">{{ $post->title }}</h2>

    {{-- Author & Date --}}
    <div class="flex items-center text-xs text-gray-500 font-light mb-4">
        <span>Posted {{ $post->created_at->diffForHumans() }}</span>
        <i class="fas fa-user-circle ml-2 text-blue-500 text-lg"></i> 
        <a href="{{ route('posts.user', $post->user) }}" class="text-blue-500 font-medium ml-1">{{ $post->user->username }}</a> {{-- Removed extra margin --}}
    </div>

    {{-- Body --}}
    @if ($full)
        <div class="text-sm text-gray-700">
            <p>{{ $post->body }}</p>
        </div>    
    @else
        <div class="text-sm text-gray-700">
            <p>{{ Str::words($post->body, 15) }}</p>
            {{-- Read More Button --}}
            <a href="{{ route('posts.show', $post) }}" class="inline-block mt-4 text-sm text-blue-500 hover:text-blue-700 font-medium">
                Read More →
            </a>
        </div>
    @endif
    
    <div class="flex items-center justify-end gap-4 mt-6">
        {{ $slot }}
    </div>    
</div>
