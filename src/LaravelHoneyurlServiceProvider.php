<?php

namespace Ombimo\LaravelHoneyurl;

use Illuminate\Contracts\Http\Kernel;
use Ombimo\LaravelHoneyurl\Middleware\CheckHoneyurl;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelHoneyurlServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-honeyurl')
            ->hasConfigFile();
    }

    public function bootingPackage()
    {
        $enable = config('honeyurl.enable');

        if (!$this->app->runningInConsole() && $enable) {
            $kernel = $this->app[Kernel::class];
            $kernel->pushMiddleware(CheckHoneyurl::class);
        }
    }
}
