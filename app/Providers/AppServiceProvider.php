<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use PhpOffice\PhpWord\Settings;

class AppServiceProvider extends ServiceProvider
{
    // /
    //  * Register any application services.
    //  */
    public function register(): void
    {
        //
    }

    // /
    //  * Bootstrap any application services.
    //  */
    public function boot(): void
    {
        Settings::setDefaultFontName('Pyidaungsu'); 
        Settings::setOutputEscapingEnabled(outputEscapingEnabled: true);
        Settings::setDefaultFontSize(13);
        ini_set('memory_limit','2048M');

        Model::unguard();
    }
}