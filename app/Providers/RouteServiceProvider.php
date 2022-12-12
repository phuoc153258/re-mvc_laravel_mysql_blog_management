<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web', 'language')->group(function () {
                Route::prefix('admin')
                    ->group(function () {
                        Route::prefix('blogs')->group(base_path('routes/web/admin/blog.php'));

                        Route::prefix('permissions')->group(base_path('routes/web/admin/role.php'));

                        Route::prefix('roles')->group(base_path('routes/web/admin/permission.php'));

                        Route::prefix('users')->group(base_path('routes/web/admin/user.php'));
                    });

                Route::prefix('users')
                    ->group(base_path('routes/web/user/user.php'));

                Route::prefix('blogs')
                    ->group(base_path('routes/web/user/blog.php'));

                Route::prefix('auth')
                    ->group(base_path('routes/web/base/auth.php'));
            });

            Route::middleware('api', 'language')->prefix('api')->group(function () {
                Route::middleware('auth:sanctum')->group(function () {

                    Route::prefix('/admin')->middleware('role:admin')->group(function () {

                        Route::prefix('blogs')->group(base_path('routes/api/admin/blog.php'));

                        Route::prefix('permissions')->group(base_path('routes/api/admin/permission.php'));

                        Route::prefix('roles')->group(base_path('routes/api/admin/role.php'));

                        Route::prefix('users')->group(base_path('routes/api/admin/user.php'));
                    });

                    Route::prefix('users/me')->group(base_path('routes/api/user/user.php'));

                    Route::prefix('blogs')->group(base_path('routes/api/user/blog.php'));

                    Route::prefix('mails')->group(base_path('routes/api/base/mail.php'));

                    Route::prefix('files')->group(base_path('routes/api/base/file.php'));
                });

                Route::prefix('auth')->group(base_path('routes/api/base/auth.php'));
            });
        });
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
