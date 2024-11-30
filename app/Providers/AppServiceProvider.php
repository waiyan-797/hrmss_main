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
        Settings::setDefaultFontName('Pyidaungsu'); // Replace 'Arial' with your desired font
        
        Model::unguard();
    }
}