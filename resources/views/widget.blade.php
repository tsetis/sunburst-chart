<x-filament-widgets::widget>
    <x-filament::section>
        <div
            x-ignore
            ax-load
            ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('sunburst-chart', 'tsetis/sunburst-chart') }}">

        </div>
        <div
            id="myChart">

        </div>
    </x-filament::section>
</x-filament-widgets::widget>
