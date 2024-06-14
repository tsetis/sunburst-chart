<?php

namespace Tsetis\SunburstChart;

use Filament\Widgets\Widget;
use Closure;
use Filament\Support\Concerns\CanBeLazy;
use Filament\Support\Concerns\EvaluatesClosures;
use Hamcrest\Arrays\IsArray;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;

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

    public function getInfo(): string|array|null
    {
        return null;
    }

    public function getCustomizationParameters(): array|null
    {
        return [
            'maxLevels' => 3,
            'excludeRoot' => true,
            'showTooltip' => true,
            'radiusScaleExponent' => 0.5,
        ];

        // [
        //     'minSliceAngle' => '[number]',
        //     'maxLevels' => '[number]',
        //     'excludeRoot' => '[boolean]',
        //     'centerRadius' => '[number]',
        //     'radiusScaleExponent' => '[number]',
        //     'sort' => '[fn]',
        //     'labelOrientation' => '[angular, radial or auto]',
        //     'showLabels' => '[boolean]',
        //     'showTooltip' => '[fn]',
        //     // ...
        // ];
    }

    public function setChartInfo(array|string $dataType = null)
    {
        //(1) when given a string(the dataType name)
        //(2) when given an array with title and description keys
        //(3) when given nothing cause that's life ~
        if ((!is_null($dataType)) && (is_string($dataType))) {
            $tempArray = [
                'title' => "Multipie Chart: " . $dataType,
                'description' => "This is a multipie chart that displays " . $dataType . " and its children"
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
        //Check is title and description parameters are valid
        $customs = $this->getCustomizationParameters();

        if ($this->checkCustomParameters($customs)) {
            $tempArray = $customs;
        } else {
            $tempArray = null;
        }

        return array_merge(
            array_merge(
                [
                    'data' => $this->getData()
                ],
                $this->setChartInfo($this->getInfo())
            ),
            [
                'customs' => $tempArray
            ]
        );
    }

    private function checkCustomParameters($customs): bool
    {

        if (!empty($customs) && (!str_contains(array_keys($customs)[0], "minSliceAngle"))) {
            return true;
        }
        return false;
    }
}
