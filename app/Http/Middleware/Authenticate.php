<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            // Check if the request is for admin routes
            if ($request->is('admin/*')) {
                return route('admin.login');
            }
            
            // For regular routes, redirect to home since we don't have user authentication
            return route('home');
        }
        
        return null;
    }
}