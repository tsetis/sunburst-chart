# This is my package sunburst-chart

## Prerequisites

This plugin works upon filament and it's core concepts. Some packages that need to be preinstalled are:

1. laravel/laravel
2. filament/filament

> Consider taking a look at [Laravel docs](https://laravel.com/docs/11.x/installation) and [Filament docs](https://filamentphp.com/docs/3.x/panels/installation) for more information.

## Installation

1. Clone the package into your project:

```bash
git clone https://github.com/tsetis/sunburst-chart.git
```

2. Move the **sunburst-chart** folder into the **vendor/tsetis** folder

3. Run the following command:

```bash
composer require tsetis/sunburst-chart="dev-main"
```

## Use

Run the following command to create a sunburst widget inside the **App\Filament\Widgets** folder with the _{widget-name}_ in CamelCase:

```bash
php artisan make:sunburst-chart {widget-name}
```

## Instructions

After running the aforementioned command a class that extends **SunburstChart** class will be created. That class comes with 2 necessary methods and an optional one:

### Nesessary Methods

1. #### getData():

    The getData method returns an `array` that contains that nesessary chart data. The **minimum attributes** that characterise each chart arc/node are `name` and `size` (except fo the root that does not need the size attribute).
    Except for the root, the rest of the nodes can optionally have a `children` attribute that correspondes to nested nodes (that is, extra chart rings/layers). Moreover, each node can also accept an optional `color` attribute.

    > If the user wishes to customize the chart's colors, every node of the chart must have a color attribute that accepts a color name (e.g. pink, red). Considering that some colors may not be rendered, the user should consult the [d3-color](https://d3js.org/d3-color) library that the project relies on. If not provided, each ring receives a random generated color.

    An example of an array with data:

    ```bash
        [
            "name" => "root",
            "color" => "red",
            "children" => [
                [
                    "name" => "a",
                    "color" => "gray",
                    "size" => 1
                ],
                [
                    "name" => "b",
                    "color" => "brown",
                    "size" => 1,
                    "children" => [
                        [
                            "name" => "ba",
                            "color" => "purple",
                            "size" => 1
                        ],
                        [
                            "name" => "bb",
                            "color" => "yellow",
                            "size" => 1,
                            "children" => [
                                [
                                    "name" => "bba",
                                    "color" => "orange",
                                    "size" => 1
                                ],
                                [
                                    "name" => "bbb",
                                    "color" => "green",
                                    "size" => 1,
                                ],
                                [
                                    "name" => "bbc",
                                    "color" => "blue",
                                    "size" => 1,
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ```

### Optional Methods

1. #### getInfo():

    The getInfo() method accepts 3 sets of arguments, either the `string` name of the Chart, either an array of keys title and description with `string` values each or a (default) `null` value.

    > **Scenarios:**
    >
    > 1. a default title and description are set with the given Chart name.
    > 2. the array with the given title and description values is set as is.
    > 3. a default title _Sunburst Chart_ with no description is set.

2. #### getCustomizationParameters():

    The getCustomizationParameters() returns an array that contains key-value pairs of _method_name_ and _value_. The methods provided are limited and correspond to the package of [vasturiano/sunburst-chart](https://www.npmjs.com/package/sunburst-chart/v/1.16.0). Respectively, the values each method receives are specific. When this method is used each method*name (\_array index*) is called with the given value (_array value_) as a parameter.
    If this method is not called, some methods and values are used by default for basic chart customization purposes.

    > Due to the complexity of each method, some may require more complex actions than the one described above. Therefore, it is highly suggested to consult the package of vasturiano for more information.

## Credits

-   [Stelios Tsetis](https://github.com/tsetis)
-   [Vasturiano](https://www.npmjs.com/package/sunburst-chart/v/1.16.0)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
