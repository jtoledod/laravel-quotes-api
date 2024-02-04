<?php

namespace App\Http\Middleware;

use App\Exceptions\AppException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        if (!auth()->check()) throw AppException::unauthorized();

        $countRoles = count($roles);
        $user = $request->user();
        $userRoles = $user->roles;
        $allowAcces = false;

        for ($i = 0; $i < $countRoles; $i++) {
            if (in_array(strtoupper($roles[$i]), $userRoles)) {
                $allowAcces = true;
                break;
            }
        }

        if (!$allowAcces) throw AppException::unauthorized();

        return $next($request);
    }
}
