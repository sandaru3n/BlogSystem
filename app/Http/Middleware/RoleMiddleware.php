class RoleMiddleware
{
    public function handle($request, Closure $next, $role) {
        if (!auth()->check() || !auth()->user()->hasRole($role)) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}