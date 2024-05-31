import Sunburst from 'sunburst-chart'

// export default function SunburstObject(args) {
//     return {
//         data: args.data,
//         so: null,
//         name: args.name,
//         init: function () {
//             this.so = new Sunburst()
//                 .data(this.data)
//                 .size('size')
//                 .color('color')
//                 .radiusScaleExponent(1)(this.name)
//         }
//     }
// }

export function SunburstObject() {
    const myChart = Sunburst();

    myChart
        .data(window.filamentData.data)
        .size('size')
        .color('color')
        .radiusScaleExponent(1)
        (document.getElementById("myChart"));
}
// {
//     name: 'main',
//     color: 'magenta',
//     children: [{
//         name: 'a',
//         color: 'yellow',
//         size: 1
//     }, {
//         name: 'b',
//         color: 'red',
//         children: [{
//             name: 'ba',
//             color: 'orange',
//             size: 1
//         }, {
//             name: 'bb',
//             color: 'blue',
//             children: [{
//                 name: 'bba',
//                 color: 'green',
//                 size: 1
//             }, {
//                 name: 'bbb',
//                 color: 'pink',
//                 size: 1
//             }]
//         }]
//     }]
// }
