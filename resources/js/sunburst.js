import Sunburst from 'sunburst-chart'

export function SunburstObject(data, customs) {
    const myChart = Sunburst();

    console.log(customs);
    console.log(data);

    myChart
        .data(data)
        .size('size')
        .color('color');

    if ((Object.keys(customs).length != 0)) {
        for (const [key, value] of Object.entries(customs)) {
            myChart[key](value)};
        console.log("inside if");
    }
    myChart
    (document.getElementById("myChart"));
        // .excludeRoot(true)
        // .radiusScaleExponent(1)
        // .labelOrientation('auto')
        // .showLabels(true)
}
