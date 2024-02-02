<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Sprint;

class GlobalActivities
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $sprint = Sprint::slug($request->slug)
            ->with('issues.statuses')
            ->first();

        //view()->share('globalActivities', $sprint->activities());

        return $next($request);
    }
}
