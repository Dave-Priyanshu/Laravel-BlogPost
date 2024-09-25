@props(['post', 'full' => false, 'fullSize'=> false])

<div class="card bg-white shadow-lg rounded-lg overflow-hidden transition duration-300 ease-in-out hover:shadow-xl ">
    
    {{-- Cover photo --}}
    <div class="w-full {{ $fullSize ? 'h-auto': 'h-64' }} mt-4 flex justify-center items-center">
        @if ($post->image)
            <img src="{{ asset('storage/'.$post->image) }}" alt="Post Image" 
                class="{{ $fullSize ? 'w-50 h-50 px-2':'h-full w-auto ' }} object-contain">
        @else    
            <img src="{{ asset('storage/posts_images/default.png') }}" alt="Default Image" 
                 class="{{ $fullSize?'w-50 h-50 px-2': ' h-full w-auto max-w-full' }} object-contain">
        @endif
    </div>

    {{-- Content --}}
    <div class="p-6">
        {{-- Title --}}
        <h2 class="font-bold text-2xl text-gray-900 mb-3 hover:text-blue-600 transition-colors duration-200">{{ $post->title }}</h2>
        
        {{-- Author & Date --}}
        <div class="flex items-center text-sm text-gray-500 mb-4">
            <span class="mr-2">Posted {{ $post->created_at->diffForHumans() }}</span>
            <i class="fas fa-user-circle text-blue-500 text-lg mr-1"></i> 
            <a href="{{ route('posts.user', $post->user) }}" class="text-blue-500 font-medium hover:underline">{{ $post->user->username }}</a>
        </div>

        {{-- Body --}}
        <div class="text-gray-700 leading-relaxed">
            @if ($full)
                <p>{{ $post->body }}</p>
            @else
                <p>{{ Str::words($post->body, 15) }}</p>
                {{-- Read More Button --}}
                <a href="{{ route('posts.show', $post) }}" class="inline-block mt-4 text-sm text-blue-500 hover:text-blue-700 font-semibold">
                    Read More →
                </a>
            @endif
        </div>
        
        {{-- Additional content --}}
        <div class="flex items-center justify-end gap-4 mt-6">
            {{ $slot }}
        </div>    
    </div>
</div>