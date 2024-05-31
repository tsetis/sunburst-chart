<?php

namespace Tsetis\SunburstChart;

use Filament\Widgets\Widget;
use Closure;
use Filament\Support\Concerns\EvaluatesClosures;
use Illuminate\Contracts\View\View;

class SunburstChart extends Widget
{
    use EvaluatesClosures;

    public static string $view = "sunburst-chart::sunburst-chart";

    public array|Closure $data  = [];

    protected function getViewData(): array
    {
        return $this->evaluate($this->data);
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function render(): View
    {
        return view(static::$view, $this->getViewData());
    }
}
