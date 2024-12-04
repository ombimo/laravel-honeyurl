<?php

namespace Ombimo\LaravelHoneyurl\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ombimo\LaravelHoneyurl\LaravelHoneyurlServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Ombimo\\LaravelHoneyurl\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelHoneyurlServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-honeyurl_table.php.stub';
        $migration->up();
        */
    }
}
