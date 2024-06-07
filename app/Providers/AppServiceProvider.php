<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Blade::directive('can', function ($permission) {
            return "<?php if(auth()->guard('admin')->check() && auth()->guard('admin')->user()->hasAnyPermission($permission)): ?>";
        });
    
        Blade::directive('endcan', function () {
            return '<?php endif; ?>';
        });
    }
}
