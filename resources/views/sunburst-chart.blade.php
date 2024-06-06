<x-filament-widgets::widget>
    <x-filament::section>
    <div
        id="section-div"
        x-ignore
        ax-load
        ax-load-src="{{\Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('sunburst-js-script', 'tsetis/sunburst-chart')}}"
        x-data="SunburstObject(@js($chartParameters['data']))"

        {{-- x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('sunburst-css-script', 'tsetis/sunburst-chart'))]" --}}

        style="display:flex; flex-direction:column;"
        >
        <p
            class="title">
            {{ $chartParameters['title'] }}
        </p>

        <div
            id="myChart">
        </di>
        <p class="description" style="order: 1;">
            {{$chartParameters['description']}}
        </p>
    </div>
    </x-filament::section>
</x-filament-widgets::widget>
