<!-- /var/www/html/laravel/Demo-app/resources/views/admin/posts.blade.php -->
<x-adminLayout>
    <div class="container mx-auto p-10 max-w-6xl">
        <h1 class="text-3xl font-bold text-blue-800 mb-6">Posts Page</h1>
        
        <div class="overflow-x-auto rounded-lg shadow-md">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-3 px-4 border-b">User ID</th>
                        <th class="py-3 px-4 border-b">Post ID</th>
                        <th class="py-3 px-4 border-b">Title</th>
                        <th class="py-3 px-4 border-b">Body</th>
                        <th class="py-3 px-4 border-b">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="py-2 px-4 border-b">{{ $post->user_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $post->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                            <td class="py-2 px-4 border-b">{{ Str::limit($post->body, 100) }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                @if($post->image)
                                    <img src="{{ asset('posts_images/' . $post->image) }}" alt="{{ $post->title }}" class="w-20 h-auto mx-auto">
                                @else
                                    No Image
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-adminLayout>
