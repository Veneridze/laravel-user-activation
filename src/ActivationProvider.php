<?php
namespace Veneridze\LaravelUserActivation;


use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Veneridze\LaravelUserActivation\Console\Command\ActivateUser;
use Veneridze\LaravelUserActivation\Console\Command\DeactivateUser;

class ActivationProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-user-activation')
            ->hasConfigFile()
            ->hasMigration('add_user_activation_keys')
            //->hasRoute('activation')
            ->hasConsoleCommands([
                ActivateUser::class,
                DeactivateUser::class
            ])
            ->publishesServiceProvider('ActivationProvider')
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->copyAndRegisterServiceProviderInApp();
            });
    }

    public function packageBooted(): void
    {
        //$mediaClass = config('media-library.media_model', Media::class);

        //$mediaClass::observe(new MediaObserver);
    }

    public function packageRegistered(): void
    {
        //$this->app->bind(WidthCalculator::class, config('media-library.responsive_images.width_calculator'));
        //$this->app->bind(TinyPlaceholderGenerator::class, config('media-library.responsive_images.tiny_placeholder_generator'));
//
        //$this->app->scoped(MediaRepository::class, function () {
        //    $mediaClass = config('media-library.media_model');
//
        //    return new MediaRepository(new $mediaClass);
        //});
    }
}
