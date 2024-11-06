<?php

namespace App\Http\Controllers;

use App\Models\PageView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        // 1. Get total pages
        $totalViews = PageView::count();

        // 2. Get unique visitors
        $uniqueVisitors = PageView::distinct('session_id')->count('session_id');

        // 3. Get the top 10 pages by view count
        $topPages = PageView::select('page', DB::raw('count(*) as views'))
            ->groupBy('page')
            ->orderByDesc('views')
            ->limit(10)
            ->get();

        // Example data for performance metrics
        $avgResponseTime = 150; // milliseconds
        $serverUptime = 99.9; // percentage

        // Pass the data to the view
        return view('analytics.index', compact('totalViews', 'uniqueVisitors', 'topPages', 'avgResponseTime', 'serverUptime'));
    }


    public function showAnalyticsDashboard()
    {
        // Example data for performance metrics
        $avgResponseTime = 150; // milliseconds
        $serverUptime = 99.9; // percentage

        // Example data for page views and unique visitors
        $totalViews = 2000;
        $uniqueVisitors = 1500;

        // Example data for top pages
        $topPages = [
            (object) ['page' => '/home', 'views' => 800],
            (object) ['page' => '/about', 'views' => 500],
            (object) ['page' => '/contact', 'views' => 300],
        ];

        // Pass the data to the view
        return view('admin.analytics', compact('avgResponseTime', 'serverUptime', 'totalViews', 'uniqueVisitors', 'topPages'));
    }
    public function getRealTimeData()
{
    // Example of dynamic data fetching
    $totalViews = PageView::count();
    $uniqueVisitors = PageView::distinct('session_id')->count('session_id');
    $topPages = PageView::select('page', DB::raw('count(*) as views'))
        ->groupBy('page')
        ->orderByDesc('views')
        ->limit(10)
        ->get();

    // Optionally add any performance metrics like avgResponseTime and serverUptime here

    return response()->json([
        'totalViews' => $totalViews,
        'uniqueVisitors' => $uniqueVisitors,
        'topPages' => $topPages
    ]);
}


}
