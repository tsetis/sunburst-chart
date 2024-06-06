<?php

namespace Tsetis\SunburstChart;

use App\Services\SunburstInstantiationService;
use Filament\Widgets\Widget;
use Closure;
use Filament\Support\Concerns\CanBeLazy;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Widgets\WidgetConfiguration;
use Illuminate\Contracts\View\View;
use Livewire\Component;

abstract class SunburstChart extends Widget
{
    use EvaluatesClosures;
    use CanBeLazy;

    public static string $view = "sunburst-chart::sunburst-chart";

    public array $chartParameters  = [];

    public function mount()
    {
        $this->chartParameters = $this->getData();
    }

    abstract public function getData(): array;
}
