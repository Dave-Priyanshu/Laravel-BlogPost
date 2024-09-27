
<x-adminLayout>
    <h1 class="text-2xl font-bold mb-4">All User List</h1>

    <!-- DataTable -->
    <table id="usersTable" class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 text-left">Username</th>
                <th class="py-2 px-4 text-left">Email</th>
                <th class="py-2 px-4 text-left">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="py-2 px-4">{{ $user->username }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4">{{ $user->created_at->format('M d, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @push('scripts')
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>
@endpush

</x-adminLayout>
