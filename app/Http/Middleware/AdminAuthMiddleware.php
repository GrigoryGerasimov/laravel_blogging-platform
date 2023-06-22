<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Exceptions\Admin\{ForbiddenException, UnauthorizedException};
use Closure;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $admin = Role::where(['name' => 'admin'])->first();
            if (is_null($admin)) {
                throw new \Exception('Admin role not present on platform');
            }

            if (is_null(auth()->user())) {
                throw new UnauthorizedException('User not authorized. Access denied');
            }

            if (auth()->user()->roles->doesntContain($admin)) {
                throw new ForbiddenException('User doesn\'t have admin permissions. Access forbidden');
            }

            return $next($request);
        } catch (UnauthorizedException $e) {
            Log::error($e->getMessage(), $e->getTrace());

            abort(401);
        } catch (ForbiddenException $e) {
            Log::error($e->getMessage(), $e->getTrace());

            abort(403);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());

            abort(505);
        }
    }
}
