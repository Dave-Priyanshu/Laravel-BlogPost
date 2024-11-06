<x-adminLayout>
    <x-slot name="title">Analytics Dashboard</x-slot>

    <div class="p-6">
        <!-- Page Title -->
        <h1 class="text-4xl font-extrabold text-gray-800 mb-8">Analytics Dashboard</h1>

        <!-- Total Page Views Section -->
        <div class="bg-white shadow-lg rounded-lg p-8 mb-6 border-l-4 border-blue-600 hover:shadow-xl transition-all duration-300">
            <p class="text-2xl font-semibold text-gray-700">
                <span class="text-lg text-blue-600">Total Page Views:</span> {{ $totalViews }}
            </p>
        </div>

        <!-- Unique Visitors Section -->
        <div class="bg-white shadow-lg rounded-lg p-8 mb-6 border-l-4 border-green-600 hover:shadow-xl transition-all duration-300">
            <p class="text-2xl font-semibold text-gray-700">
                <span class="text-lg text-green-600">Unique Visitors:</span> {{ $uniqueVisitors }}
            </p>
        </div>

        <!-- Top Pages Section -->
        <div class="bg-white shadow-lg rounded-lg p-8 mb-6 border-l-4 border-purple-600 hover:shadow-xl transition-all duration-300">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Top Pages</h2>
            <table id="topPagesTable" class="min-w-full table-auto bg-gray-50 rounded-lg overflow-hidden">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left text-lg font-medium">Page</th>
                        <th class="py-3 px-6 text-left text-lg font-medium">Views</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($topPages as $page)
                        <tr class="hover:bg-gray-100 transition-all duration-200">
                            <td class="py-3 px-6">{{ $page->page }}</td>
                            <td class="py-3 px-6">{{ $page->views }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            // Initialize DataTables for the Top Pages table
            $(document).ready(function() {
                $('#topPagesTable').DataTable({
                    paging: true,
                    ordering: true,
                    searching: true,
                    pageLength: 5, // Default number of rows to show
                });
            });
        </script>
    @endpush
</x-adminLayout>
