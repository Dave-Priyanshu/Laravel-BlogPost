<x-adminLayout>
    <div class="container mx-auto p-10 max-w-6xl">
        <h1 class="text-3xl font-bold text-blue-800 mb-6">Posts Page</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" id="success-message" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" id="error-message" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        
        <div class="overflow-x-auto rounded-lg shadow-md">
            <table id="postsTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead>
                    <tr class="text-white bg-blue-500">
                        <th class="py-3 px-4 border-b">User ID</th>
                        <th class="py-3 px-4 border-b">User Name</th>
                        <th class="py-3 px-4 border-b">Post ID</th>
                        <th class="py-3 px-4 border-b">Title</th>
                        <th class="py-3 px-4 border-b">Body</th>
                        <th class="py-3 px-4 border-b">Image</th>
                        <th class="py-3 px-4 border-b">Created At</th>
                        <th class="py-3 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="py-2 px-4 border-b">{{ $post->user_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $post->user->username }}</td>
                            <td class="py-2 px-4 border-b">{{ $post->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                            <td class="py-2 px-4 border-b">{{ Str::limit($post->body, 100) }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                @if($post->image)
                                    <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" class="w-20 h-auto mx-auto">
                                @else               
                                    No Image 
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">
                                {{ $post->created_at ? $post->created_at->format('M d, Y') : 'No Date' }}
                            </td>
                            <td class="py-2 px-4 border-b">
                                <form action="{{ route('admin.posts.destroy',$post->id) }}" method="POST" style="display:inline;onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#postsTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [5, 10, 25, 50, 100], // Custom page length options
                "language": {
                    "lengthMenu": "Display _MENU_ records per page",
                    "zeroRecords": "No matching records found",
                    "info": "Showing page _PAGE_ of _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            });
            // Auto-hide success and error messages
            setTimeout(function() {
                $('#success-message, #error-message').fadeOut('slow');
            }, 3000); // 3000 milliseconds = 5 seconds
        });
        
    </script>
    @endpush
</x-adminLayout>
