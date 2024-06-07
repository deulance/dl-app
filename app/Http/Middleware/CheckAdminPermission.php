<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminPermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        $per = str_replace('"','',$permission);

        if (auth()->guard('admin')->check() && ( auth()->guard('admin')->user()->hasPermission($per) || auth()->guard('admin')->user()->hasPermission('full access') ) ) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.'.$per.' '.auth()->guard('admin')->user()->hasPermission($per)  );
    }
}
