<?php

namespace Zehntinel\LaravelLago;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Zehntinel\LaravelLago\Commands\LaravelLagoCommand;

class LaravelLagoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-lago')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-lago_table')
            ->hasCommand(LaravelLagoCommand::class);
    }
}
