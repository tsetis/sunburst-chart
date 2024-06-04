<?php

namespace Tsetis\SunburstChart;

use Filament\Widgets\Widget;
use Closure;
use Filament\Support\Concerns\CanBeLazy;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Widgets\WidgetConfiguration;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SunburstChart extends Widget
{
    use EvaluatesClosures;
    use CanBeLazy;

    public static string $view = "sunburst-chart::sunburst-chart";

    public array|Closure $chartParameters  = [];

    public static function make(?array $chartParameters = null): WidgetConfiguration
    {
        return app(WidgetConfiguration::class, [
            'widget' => static::class,
            'chartParameters' => $chartParameters
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return $this->evaluate($this->chartParameters);
    }

    public function render(): View
    {
        return view(static::$view, $this->getViewData());
    }
}
