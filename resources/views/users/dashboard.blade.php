<x-layout>
    <h1 class="title text-3xl font-bold text-gray-800 mb-8">Hello, {{ auth()->user()->username }}</h1>

    {{-- Create Post Form --}}
    <div class="card mb-8 bg-white shadow-md rounded-lg p-6">
        <h2 class="font-bold text-xl mb-4">Create a New Post</h2>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            {{-- Post Title --}}
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                <input type="text" name="title" value="{{ old('title') }}" 
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 transition duration-200 ease-in-out" 
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
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 transition duration-200 ease-in-out" 
                          placeholder="Write your post content here" required>{{ old('body') }}</textarea>
                @error('body')
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
</x-layout>
