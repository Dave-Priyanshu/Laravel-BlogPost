<x-layout>
    <h1 class="title text-3xl font-bold  text-gray-800 mb-8">
        Welcome, {{ auth()->user()->username }}! You have created {{ $posts->total() }} posts.
    </h1>
    

    {{-- Create Post Form --}}
    <div class="card mb-8 bg-white shadow-md rounded-lg p-6">
        <h2 class="font-bold text-2xl text-gray-800 mb-6 border-b pb-2">Create a New Post</h2>

        {{-- session msg --}}
        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}"  />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete')}}" bg="bg-red-500"/>
        @endif

        {{-- create post form --}}
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Post Title --}}
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                <input type="text" name="title" value="{{ old('title') }}" 
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 transition duration-200 ease-in-out" 
                       placeholder="Enter the post title" 
                       >
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-6">
                <label for="body" class="block text-sm font-medium text-gray-700">Post Body</label>
                <textarea name="body" rows="5" 
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 transition duration-200 ease-in-out" 
                          placeholder="Write your post content here" >{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Image --}}
            <div class="mb-4">
                <label for="image">Cover Photo</label>
                <input type="file" name="image" id="image">
                
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            

            {{-- Submit Button --}}
            <button type="submit" 
                    class="btn w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-400">
                Create Post
            </button>
        </form>
    </div>

    {{-- Users Posts --}}
    <h2 class="font-bold text-2xl text-gray-800 mb-6 border-b pb-4">Your Recent Posts</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post">
                {{-- Update post button --}}
<a href="{{ route('posts.edit', $post) }}" class="inline-block bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 text-sm rounded-md shadow-lg hover:shadow-xl transition-transform transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
    Edit
</a>

{{-- Delete post button --}}
<form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="inline-block bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 text-sm rounded-md shadow-lg hover:shadow-xl transition-transform transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-red-400">
        Delete
    </button>
</form>

            </x-postCard>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</x-layout>
