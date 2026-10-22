<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TrackPageVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->isMethod('GET') && $response->isSuccessful() && str_starts_with((string) $response->headers->get('Content-Type'), 'text/html')) {
            DB::table('page_visits')->insert([
                'user_id' => $request->user()?->getAuthIdentifier(),
                'visited_at' => now(),
            ]);
        }

        return $response;
    }
}
