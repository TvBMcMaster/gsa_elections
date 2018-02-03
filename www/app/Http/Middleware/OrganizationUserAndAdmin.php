<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Closure;

class OrganizationUserAndAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $org = $request->route('organization');

        if (is_null($org)){
            Log::warning("No Organization found in route!");
        }

        Log::info("Hit the Org User Admin Middleware for Org: ".$org->slug);

        if(!Auth::guard('admin')->check()){
            if (!Auth::guard('web')->check()){
                abort(401, "Unauthorized");
            } else {
                if (Auth::user()->organization_id != $org->id) {
                    Log::error("Access denied to organization: ".$org->slug);
                    abort(401, "Unauthorized");
                }
            }
        } else {
            Log::info('Admin Allowed');
        }

        return $next($request);
    }
}
