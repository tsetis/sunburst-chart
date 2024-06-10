import Sunburst from 'sunburst-chart'

export function SunburstObject(data, customs) {
    const myChart = Sunburst();

    console.log(customs);
    console.log(data);

    //Chart data instantiation
    myChart
        .data(data)
        .size('size')
        .color('color');

    //Chart customization:
    //Parameters given from the widget
    if ((customs != null)) {
        if ((Object.keys(customs).length != 0)) {
            for (const [key, value] of Object.entries(customs)) {
                myChart[key](value)
            };
            console.log("inside if");
        }
    }

    myChart(document.getElementById("myChart"));

    myChart.onHover(function () {
        nodeName = myChart.name;
        nodeSize = myChart.size;

        return myChart.tooltipTitle() + tooltipTitle(toTitleCase(nodeName) + ": " + nodeSize);
    })

    function toTitleCase(str) {
        if (!str) {
            return '';
        }
        const strArr = str.split(' ').map((word) => {
            return word[0].toUpperCase() + word.substring(1).toLowerCase();
        });
        return strArr.join(' ');
    }


}
