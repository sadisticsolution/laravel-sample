<?php

namespace App\Providers;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\ServiceProvider;

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
        $this->registerValidationRules();
    }

    private function registerValidationRules()
    {
        $path = $this->app->basePath('app/Validations');
        $files = scandir($path);

        // Remove directory traversal and parent object
        $files = array_filter($files, function ($file) {
            if (in_array($file, ['.', '..', 'AbstractValidation.php']))
                return false;

            return (bool)preg_match('/.+\.php$/', $file);
        });

        // Convert file names to class names
        $classes = array_map(function ($file) {
            preg_match('/(.+)\.php$/', $file, $matches);

            return $matches[1];
        }, $files);

        // Call register on each validation class
        $factory = $this->app->make(Factory::class);
        foreach ($classes as $class) {
            $method = "\App\Validations\\{$class}::register";

            call_user_func($method, $factory);
        }
    }
}
