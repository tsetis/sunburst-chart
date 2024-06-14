import Sunburst from 'sunburst-chart'
import * as d3 from 'd3'

export function SunburstObject(data, customs) {
    const myChart = Sunburst();

    const color = d3.scaleOrdinal(d3.schemePaired);
    //Chart data instantiation
    myChart
        .data(data)
        .size('size')
        .color('color')
        //Each ring has its own color
        .color((d, parent) => color(parent ? parent.data.name : null));

    //Chart customization:
    //Parameters given from the php widget class
    if ((customs != null)) {
        if ((Object.keys(customs).length != 0)) {
            for (const [key, value] of Object.entries(customs)) {
                myChart[key](value)
            };
        }
    }

    myChart
        .tooltipTitle(function (d, node) {

            console.log(node);
            let tooltipData = toTitleCase(node.data.name) + ": <i>"+node.data.size+'</i>';

            let currentNode = node;
            let parentName;
            let count = 0;
            do {
                if ((currentNode.parent != null)) {

                    parentName = currentNode.parent.data.name;

                    if (currentNode.parent.parent !=null) {
                        tooltipData = parentName + " > " + tooltipData;
                    }

                    currentNode = currentNode.parent;

                    console.log(currentNode);

                    if (count > 50) {
                        console.log("Error: infinite loop");
                        break;
                    }
                } else {

                    break;
                }
                count++;
            } while (true);

            return toTitleCase(tooltipData);
        })

    //Final instantiation:
    myChart(document.getElementById("myChart"));

    //Some extra size styling:
    svgElement = document.getElementsByClassName("sunburst-viz").firstChild;
    svgElement.setAttribute('viewBox', "0 0 100 100");
    svgElement.setAttribute("preserveAspectRatio", "xMidYMid meet");

    gElement = document.getElementByClassName("sunburst-viz").children[0].children[0];
    gElement.setAttribute("class", "g-chart-content");

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
