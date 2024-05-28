<?php

namespace Tsetis\SunburstChart;

use Filament\Widgets\Widget;

class SunburstChart extends Widget
{
    public static string $view = "sunburst-chart::widget";

    protected static array $data = [];

    public function getData(): array
    {
        $this->data = [
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

        return $this->data;
    }
}
