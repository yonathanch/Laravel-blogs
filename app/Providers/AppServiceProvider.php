<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
        //mengharuskan memakai eagerloading , jika eagerloadingnya dihapus dan balik lagi lazyloading maka website tidak berjalan/error
        Model::preventLazyLoading();

        // jika ingin mengedit pagination menggunakan bootstrap 5 maka begini setupnya dan lakukan instalisasi bootstrap 5 tapi default pagination kita memakai tailwind
        // Paginator::useBootstrapFive();
    }
}
