<x-layout>
    <a href="{{ route('dashboard') }}" class="block mb-4 text-xs text-blue-500 ">
        &larr; Go back to your dashboard
    </a>
    
    <div class="card mb-8 bg-white shadow-lg rounded-lg p-6">
        <h2 class="font-bold text-2xl text-gray-800 mb-6 border-b pb-2">Update Your Post</h2>
        
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Post Title --}}
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}" 
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3 transition duration-200 ease-in-out" 
                       placeholder="Enter the post title" 
                       required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-6">
                <label for="body" class="block text-sm font-medium text-gray-700">Post Body</label>
                <textarea name="body" rows="5" 
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3 transition duration-200 ease-in-out" 
                          placeholder="Write your post content here" required>{{ $post->body }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" 
                    class="btn w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500">
                Update Post
            </button>
        </form>
    </div>
</x-layout>
