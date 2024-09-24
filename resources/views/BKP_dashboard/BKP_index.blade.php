@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Customer Dashboard</h1>

    <div class="row mb-4">
        <div class="col-md-12">
            <h2>Today's Sales Summary</h2>
        </div>
    </div>

    <div class="row mb-4">
        <!-- Today's Sales Summary -->
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">Today's Sales Summary</div>
                <div class="card-body d-flex justify-content-around">
                    <!-- Total Sales Box -->
                    <div class="card text-white bg-primary small-box">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Sales</h5>
                            <p class="card-text">$2000</p>
                        </div>
                    </div>

                    <!-- Total Collection Box -->
                    <div class="card text-white bg-success small-box">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Collection</h5>
                            <p class="card-text">$1800</p>
                        </div>
                    </div>

                    <!-- Total Orders Box -->
                    <div class="card text-white bg-warning small-box">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text">150</p>
                        </div>
                    </div>

                    <!-- Products Sold Box -->
                    <div class="card text-white bg-info small-box">
                        <div class="card-body text-center">
                            <h5 class="card-title">Products Sold</h5>
                            <p class="card-text">300</p>
                        </div>
                    </div>

                    <!-- New Customers Box -->
                    <div class="card text-white bg-danger small-box">
                        <div class="card-body text-center">
                            <h5 class="card-title">New Customers</h5>
                            <p class="card-text">20</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Insights -->
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">Customer Insights</div>
                <div class="card-body">
                    <canvas id="customerInsightsChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- New Row for Total Sales, Customer Visited, Target vs Actual -->
    <div class="row mb-4">
        <!-- Total Sales Bar Graph -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Total Sales</div>
                <div class="card-body">
                    <canvas id="totalSalesChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Customer Visited Wave Graph -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Customer Visited</div>
                <div class="card-body">
                    <canvas id="customerVisitedChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Target vs Actual Result Bar Graph -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Target vs Actual Result</div>
                <div class="card-body">
                    <canvas id="targetVsActualChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Selling Product -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Best Selling Products</div>
                <div class="card-body">
                    <canvas id="bestSellingProductsChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Today's Orders Table -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Today's Orders</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order#</th>
                                <th>Customer</th>
                                <th>City</th>
                                <th>Total Products</th>
                                <th>Order Amount</th>
                                <th>Status</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->city }}</td>
                                <td>{{ $order->total_products }}</td>
                                <td>${{ number_format($order->order_amount, 2) }}</td>
                                <td>
                                    <span class="badge {{ $order->status_class }}">{{ $order->status }}</span>
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar {{ $order->progress_class }}" role="progressbar" style="width: {{ $order->progress }}%;" aria-valuenow="{{ $order->progress }}" aria-valuemin="0" aria-valuemax="100">{{ $order->progress }}%</div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Customer Insights Line Chart
        const customerInsightsCtx = document.getElementById('customerInsightsChart').getContext('2d');
        const customerInsightsChart = new Chart(customerInsightsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Customer Insights',
                    data: [0, 100, 200, 150, 300, 400, 200, 300, 250, 350, 300, 200],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                }],
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'black'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        max: 400,
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'black'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                },
                responsive: true,
                maintainAspectRatio: false,
            },
        });

        // Total Sales Bar Graph
        const totalSalesCtx = document.getElementById('totalSalesChart').getContext('2d');
        const totalSalesChart = new Chart(totalSalesCtx, {
            type: 'bar',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Sales',
                    data: [500, 700, 800, 600],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
            },
        });

        // Customer Visited Wave Graph
        const customerVisitedCtx = document.getElementById('customerVisitedChart').getContext('2d');
        const customerVisitedChart = new Chart(customerVisitedCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Customer Visited',
                    data: [30, 50, 70, 90],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true,
                    tension: 0.4, // Creates the wave effect
                }],
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'black'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        max: 100,
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'black'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                },
                responsive: true,
                maintainAspectRatio: false,
            },
        });

        // Target vs Actual Result Bar Graph
        const targetVsActualCtx = document.getElementById('targetVsActualChart').getContext('2d');
        const targetVsActualChart = new Chart(targetVsActualCtx, {
            type: 'bar',
            data: {
                labels: ['Target', 'Actual'],
                datasets: [{
                    label: 'Sales',
                    data: [700, 800],
                    backgroundColor: ['rgba(75, 192, 192, 0.7)', 'rgba(255, 159, 64, 0.7)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)'],
                    borderWidth: 1,
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
            },
        });

        // Best Selling Products Dot-Line Graph
        const bestSellingProductsCtx = document.getElementById('bestSellingProductsChart').getContext('2d');
        const bestSellingProductsChart = new Chart(bestSellingProductsCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [
                    {
                        label: 'Product 1',
                        data: [30, 50, 70, 90],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        fill: false,
                        tension: 0.1,
                    },
                    {
                        label: 'Product 2',
                        data: [20, 30, 50, 80],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        fill: false,
                        tension: 0.1,
                    },
                    {
                        label: 'Product 3',
                        data: [10, 20, 40, 60],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false,
                        tension: 0.1,
                    },
                ],
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'black'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        max: 100,
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'black'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    },
                },
                responsive: true,
                maintainAspectRatio: false,
            },
        });
    </script>
</div>

<style>
    .small-box {
        width: 18%; /* Adjust width to fit nicely in the row */
        height: 80px; /* Adjust height */
        margin: 5px; /* Margin between boxes */
    }

    .small-box .card-title {
        font-size: 1rem; /* Adjust font size of card title */
    }

    .card-header {
        font-size: 1rem; /* Adjust font size of card header */
    }

    /* Make canvas responsive */
    canvas {
        max-width: 100%;
        height: auto;
    }

    /* Progress bar styling */
    .progress {
        height: 20px;
    }
</style>
@endsection
