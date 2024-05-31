<?php

namespace Tsetis\SunburstChart;

use Filament\Widgets\Widget;

class SunburstChart extends Widget
{
    public static string $view = "sunburst-chart::sunburst-chart";

    protected array $data = [];

    public function __construct()
    {
        $this->data = $this->data = [
            'name' => 'testing data',
            'color' => 'green',
            'children' => [
                [
                    'name' => 'a',
                    'color' => 'red',
                    'size' => 1
                ],
                [
                    'name' => 'b',
                    'color' => 'purple',
                    'size' => 1,
                    'children' => [
                        [
                            'name' => 'ba',
                            'color' => 'green',
                            'size' => 1
                        ],
                        [
                            'name' => 'bb',
                            'color' => 'yellow',
                            'size' => 1,
                            'children' => [
                                [
                                    'name' => 'bba',
                                    'color' => 'orange',
                                    'size' => 1
                                ],
                                [
                                    'name' => 'bbb',
                                    'color' => 'brown',
                                    'size' => 1
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
    public function getData(): array
    {
        return $this->evaluate($this->data);
    }

    public function evaluate(array | \Closure $value)
    {
        if ($value instanceof \Closure) {
            return app()->call($value, []);
        }

        return $value;
    }

    public function setData(array $newData): void
    {
        $nData = $this->evaluate($newData);

        $this->data = $nData;
    }
}
