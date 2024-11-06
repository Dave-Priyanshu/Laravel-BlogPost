<x-adminLayout>
    <x-slot name="title">Analytics Dashboard</x-slot>

    <div class="p-6">
        <!-- Page Title -->
        <h1 class="text-4xl font-extrabold text-gray-800 mb-8">Analytics Dashboard</h1>

        <!-- Dark Mode Toggle -->
        <div class="mb-6">
            <button id="darkModeToggle" class="px-4 py-2 bg-gray-800 text-white rounded-lg">
                Toggle Dark Mode
            </button>
        </div>

        <!-- Performance Metrics Section -->
        <div class="bg-white shadow-lg rounded-lg p-8 mb-6 border-l-4 border-yellow-600 hover:shadow-xl transition-all duration-300">
            <h2 class="text-2xl font-semibold text-gray-700">Performance Metrics</h2>
            <div class="mt-4">
                <p class="text-xl">Average Response Time: {{ $avgResponseTime }} ms</p>
                <p class="text-xl">Server Uptime: {{ $serverUptime }}%</p>
            </div>
        </div>

        <!-- Total Page Views Section -->
        <div class="bg-white shadow-lg rounded-lg p-8 mb-6 border-l-4 border-blue-600 hover:shadow-xl transition-all duration-300">
            <p class="text-2xl font-semibold text-gray-700">
                <span class="text-lg text-blue-600">Total Page Views:</span> {{ $totalViews }}
            </p>
            <!-- Page Views Chart -->
            <div class="mt-6">
                <canvas id="pageViewsChart"></canvas>
            </div>
        </div>

        <!-- Unique Visitors Section -->
        <div class="bg-white shadow-lg rounded-lg p-8 mb-6 border-l-4 border-green-600 hover:shadow-xl transition-all duration-300">
            <p class="text-2xl font-semibold text-gray-700">
                <span class="text-lg text-green-600">Unique Visitors:</span> {{ $uniqueVisitors }}
            </p>
            <!-- Unique Visitors Chart -->
            <div class="mt-6">
                <canvas id="uniqueVisitorsChart"></canvas>
            </div>
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
        <!-- Include Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Example of updating the chart data dynamically
            let pageViewsData = [10, 20, 30, 40, 50]; // Example data
            let uniqueVisitorsData = [5, 10, 15, 20, 25]; // Example data
            const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May']; // Chart labels

            // Page Views Chart
            var ctx1 = document.getElementById('pageViewsChart').getContext('2d');
            var pageViewsChart = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Page Views',
                        data: pageViewsData,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false,
                        tension: 0.1,
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return `Views: ${tooltipItem.raw}`;
                                }
                            }
                        }
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            enabled: true,
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Unique Visitors Chart
            var ctx2 = document.getElementById('uniqueVisitorsChart').getContext('2d');
            var uniqueVisitorsChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Unique Visitors',
                        data: uniqueVisitorsData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return `Visitors: ${tooltipItem.raw}`;
                                }
                            }
                        }
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            enabled: true,
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Initialize DataTables for the Top Pages table
            $(document).ready(function() {
                $('#topPagesTable').DataTable({
                    paging: true,
                    ordering: true,
                    searching: true,
                    pageLength: 5,
                });
            });

            // Dark Mode Toggle
            document.getElementById('darkModeToggle').addEventListener('click', function() {
                document.body.classList.toggle('bg-gray-900');
                document.body.classList.toggle('text-white');
                document.querySelectorAll('.bg-white').forEach(element => element.classList.toggle('bg-gray-800'));
                document.querySelectorAll('.text-gray-700').forEach(element => element.classList.toggle('text-gray-300'));
            });

            // Simulate real-time updates
            setInterval(function() {
                fetch('/admin/analytics/data')
                    .then(response => response.json())
                    .then(data => {
                        // Update total views
                        document.querySelector("#totalViews").innerText = data.totalViews;

                        // Update unique visitors
                        document.querySelector("#uniqueVisitors").innerText = data.uniqueVisitors;

                        // Update top pages table
                        let tableBody = document.querySelector("#topPagesTable tbody");
                        tableBody.innerHTML = ''; // Clear the existing table rows
                        data.topPages.forEach(page => {
                            let row = document.createElement('tr');
                            row.innerHTML = `
                                <td class="py-3 px-6">${page.page}</td>
                                <td class="py-3 px-6">${page.views}</td>
                            `;
                            tableBody.appendChild(row);
                        });

                        // Update charts (example for Page Views chart)
                        pageViewsData.push(data.totalViews);
                        pageViewsData.shift(); // Remove the oldest value to maintain array length
                        pageViewsChart.update();

                        uniqueVisitorsData.push(data.uniqueVisitors);
                        uniqueVisitorsData.shift();
                        uniqueVisitorsChart.update();
                    });
            }, 5000); // Update every 5 seconds
        </script>
    @endpush
</x-adminLayout>
