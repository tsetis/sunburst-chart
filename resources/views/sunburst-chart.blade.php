<x-filament-widgets::widget>
    <x-filament::section>
    <div
        id="section-div"
        x-ignore
        ax-load
        ax-load-src="{{\Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('sunburst-js-script', 'tsetis/sunburst-chart')}}"
        x-data="SunburstObject(@js($chartParameters['data']))"

        {{-- x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('sunburst-css-script', 'tsetis/sunburst-chart'))]" --}}

        style="">
        <header>
            <h1
                class="text-base font-semibold leading-6 text-gray-950 dark:text-white">
                {{ $chartParameters['title'] }}
            </h1>

            <p
                class="overflow-hidden break-words text-sm
                        text-gray-500 dark:text-gray-400">
                {{$chartParameters['description']}}
            </p>
        </header>
        <div
            id="myChart"
            class="">
        </di>
    </div>
    </x-filament::section>
</x-filament-widgets::widget>
