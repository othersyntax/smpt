<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });

        Blade::directive('duit', function ($duit) {
            return "<?php echo number_format($duit, 2); ?>";
        });

        Blade::directive('tarikh', function ($tarikh) {
            return "<?php echo date('d/m/Y', strtotime($tarikh)); ?>";
        });
    }
}
