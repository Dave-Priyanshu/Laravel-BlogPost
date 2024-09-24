<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use GuzzleHttp\Client;

// class DashboardController extends Controller
// {
//     public function BKPindex()
//     {
//         // Create a Guzzle client
//         $client = new Client();
        
//         // Fetch customer data from JSONPlaceholder API
//         $response = $client->get('https://jsonplaceholder.typicode.com/users');
//         $customers = json_decode($response->getBody(), true);

//         // Dummy data for demonstration
//         $orderData = [
//             'orders' => [100, 120, 130, 90, 110],
//             'payments' => [95, 115, 125, 85, 105],
//         ];

//         $customerSegmentation = [
//             'segments' => ['Regular', 'Occasional', 'New'],
//             'counts' => [30, 50, 20],
//         ];

//         // Sample orders data for the table
//         $orders = [
//             (object)[
//                 'id' => 1,
//                 'customer_name' => 'John Doe',
//                 'city' => 'New York',
//                 'total_products' => 3,
//                 'order_amount' => 150.00,
//                 'status' => 'Delivered',
//                 'status_class' => 'bg-success',
//                 'progress_class' => 'bg-success',
//                 'progress' => 100,
//             ],
//             (object)[
//                 'id' => 2,
//                 'customer_name' => 'Jane Smith',
//                 'city' => 'Los Angeles',
//                 'total_products' => 5,
//                 'order_amount' => 200.00,
//                 'status' => 'In Process',
//                 'status_class' => 'bg-info',
//                 'progress_class' => 'bg-info',
//                 'progress' => 50,
//             ],
//             (object)[
//                 'id' => 3,
//                 'customer_name' => 'Mike Johnson',
//                 'city' => 'Chicago',
//                 'total_products' => 1,
//                 'order_amount' => 50.00,
//                 'status' => 'Cancelled',
//                 'status_class' => 'bg-danger',
//                 'progress_class' => 'bg-danger',
//                 'progress' => 0,
//             ],
//         ];

//         return view('dashboard.index', compact('customers', 'orderData', 'customerSegmentation', 'orders'));
//     }
// }
