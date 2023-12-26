<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccessTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $lastAccessTime = $request->session()->get('last_access_time');
        $currentTime = now();

        if (!$lastAccessTime || $currentTime->diffInMinutes($lastAccessTime) >= 1) {
            $request->session()->put('last_access_time', $currentTime);
            return $next($request);
        }

        // Jika belum lewat 1 menit, beri respons sesuai kebutuhan Anda
        return response()->json(['message' => 'Anda hanya bisa mengakses setiap 1 menit sekali'], 429);
    }
}
