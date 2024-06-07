import Sunburst from 'sunburst-chart'

export function SunburstObject(data) {
    const myChart = Sunburst();

    myChart
        .data(data)
        .size('size')
        .color('color')
        .excludeRoot(true)
        .radiusScaleExponent(1)
        .labelOrientation('auto')
        .showLabels(true)
        (document.getElementById("myChart"));
}
