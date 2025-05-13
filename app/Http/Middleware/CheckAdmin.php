<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->user()->isAdmin())
        {
            return response()->json(['message' => 'You are not authorized to access this page'], 403);
        }

        return $next($request);
    }
}
