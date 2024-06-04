<?php

namespace Tsetis\SunburstChart\Commands;

use Illuminate\Console\Command;

class SunburstChartCommand extends Command
{
    public $signature = 'sunburst-chart';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
