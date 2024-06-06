<?php

namespace Tsetis\SunburstChart\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class SunburstChartCommand extends Command
{
    public $signature = 'make:sunburst-chart {name}';

    public $description = 'Create a new Sunburst Chart Widget';

    public function handle(): void
    {
        $name = $this->argument('name');
        $namespace = 'App\\Filament\\Widgets';
        $className = Str::studly($name);

        //Finds the stub location in vendor tsetis/sunburst-chart folder
        $stubPath = base_path('/vendor/tsetis/sunburst-chart/stubs/sunburst.stub');
        $stub = file_get_contents($stubPath);

        $widgetClass = str_replace(
            ['{{ namespace }}', '{{ class }}'],
            [$namespace, $className],
            $stub
        );

        //Finds and checks whether the created stub class exists already or not
        $path = app_path('Filament/Widgets/' . $className . '.php');

        if (file_exists($path)) {
            $this->error('Widget already exists!');
        }

        (new Filesystem)->ensureDirectoryExists(app_path('Filament/Widgets'));
        file_put_contents($path, $widgetClass);

        $this->info('Widget Created successfully');
    }
}
