<?php

namespace Tsetis\SunburstChart;

use Filament\Widgets\Widget;
use Closure;
use Filament\Support\Concerns\CanBeLazy;
use Filament\Support\Concerns\EvaluatesClosures;

abstract class SunburstChart extends Widget
{
    use EvaluatesClosures;
    use CanBeLazy;

    public static string $view = "sunburst-chart::sunburst-chart";

    public array $chartParameters;

    public function mount()
    {
        $this->chartParameters = $this->setViewParameters();
    }

    abstract public function getData(): array;

    abstract public function getChartInfo(): string|Closure|array;


    public function setChartInfo(array|Closure|string $dataType = null)
    {
        //(1) When given a Closure
        //(2) when given a string(the dataType name)
        //(3) when given an array with title and description keys
        //(4) when given nothing cause that's life ~
        if (($this->evaluate($dataType) instanceof Closure)) {
            $tempArray = $dataType;
        } else if ((!is_null($dataType)) && (is_string($dataType))) {
            $tempArray = [
                'title' => "Multipie Chart: " . $dataType,
                'description' => "This is a demo multipie chart that displays " . $dataType . " and its children"
            ];
        } else if ((!is_null($dataType)) && (is_array($dataType))) {
            $tempArray = [
                'title' => $dataType['title'],
                'description' => $dataType['description']
            ];
        } else {
            $tempArray = [
                'title' => 'Sunburst Chart'
            ];
        }

        return $tempArray;
    }

    public function setViewParameters(): array
    {
        return array_merge(
            [
                'data' => $this->getData()
            ],
            $this->setChartInfo($this->getChartInfo())
        );
    }
}
