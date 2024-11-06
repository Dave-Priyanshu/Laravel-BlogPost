<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->isMethod('get')){
            PageView::create([
                'page'=>$request->path(),
                'session_id'=>$request->getId(),
                'user_id' => auth()->id(),
                'referrer' => $request->header('referer'),
                'device_type' => $this->getDeviceType($request->header('User-Agent')),
            ]);
        }
        return $next($request);
    }
    private function getDeviceType($userAgent) {
        return strpos($userAgent, 'Mobile') !== false ? 'Mobile' : 'Desktop';
    }
}
