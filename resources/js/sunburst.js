import Sunburst from 'sunburst-chart'

export function SunburstObject(data) {
    const myChart = Sunburst();

    console.log(data);
    myChart
        .data(data)
        .size('size')
        .color('color')
        .radiusScaleExponent(1)
        (document.getElementById("myChart"));
}
