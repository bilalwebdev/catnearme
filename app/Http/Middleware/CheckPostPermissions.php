<?php

namespace App\Http\Middleware;

use App\Models\Pet;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPostPermissions
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('home'); // Redirect guest users to the home page
        }

        // Pull the slug from the URI
        $petSlug = $request->route('pet');

        // Search the record in DB
        $record = Pet::where('slug', $petSlug)->first();

        // Record not found? Redirect to home
        if ($record === null) {
            return redirect()->route('home');
        }

        // User is not the owner? Redirect to home
        if ($record->user_id !== Auth::id()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
