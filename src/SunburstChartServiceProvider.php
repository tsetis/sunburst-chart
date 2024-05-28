<?php

namespace Tsetis\SunburstChart;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tsetis\SunburstChart\Commands\SunburstChartCommand;
use Tsetis\SunburstChart\Testing\TestsSunburstChart;

class SunburstChartServiceProvider extends PackageServiceProvider
{
    public static string $name = 'sunburst-chart';

    public static string $viewNamespace = 'sunburst-chart';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name);
    }

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        // Testing
        Testable::mixin(new TestsSunburstChart());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'tsetis/sunburst-chart';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('sunburst-chart', __DIR__ . '/../resources/dist/components/sunburst-chart.js'),
            Css::make('sunburst-chart-styles', __DIR__ . '/../resources/dist/sunburst-chart.css'),
            Js::make('sunburst-chart-scripts', __DIR__ . '/../resources/dist/sunburst-chart.js'),
        ];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_sunburst-chart_table',
        ];
    }
}
