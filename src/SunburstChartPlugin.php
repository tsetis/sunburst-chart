<?php

namespace Tsetis\SunburstChart;

use Filament\Contracts\Plugin;
use Filament\Panel;

class SunburstChartPlugin implements Plugin
{
    public SunburstChart $sunburst;

    public function getId(): string
    {
        return 'sunburst-chart';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->widgets([
                $this->sunburst::class
            ]);
    }

    public function boot(Panel $panel): void
    {
    }

    public function __construct($data)
    {
        $this->sunburst = new SunburstChart();
        $this->sunburst->setData($data);
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
