// (function ($) {
//     "use strict";

//     var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');
//     var bordercolor = getComputedStyle(document.body).getPropertyValue('--bordercolor');
//     var bodycolor = getComputedStyle(document.body).getPropertyValue('--bodycolor');


//     var options = {
//         responsive: true,
//         legend: {
//             position: 'top',
//             labels: {
//                 fontColor: bodycolor
//             }
//         },
//         scales: {
//             xAxes: [{
//                     display: true,
//                     gridLines: {
//                         display: true,
//                         color: bordercolor,
//                         zeroLineColor: bordercolor
//                     },
//                     ticks: {
//                         fontColor: bodycolor,

//                     },
//                 }],
//             yAxes: [{
//                     display: true,
//                     gridLines: {
//                         display: true,
//                         color: bordercolor,
//                         zeroLineColor: bordercolor
//                     },
//                     ticks: {
//                         fontColor: bodycolor,

//                     }
//                 }]
//         }
//     };

//     window.chartColors = {
//         red: 'rgb(30, 61, 115)',
//         orange: 'rgb(23, 162, 184)',
//         yellow: 'rgb(30, 224, 172)',
//         green: 'rgb(75, 192, 192)',
//         blue: 'rgb(54, 162, 235)',
//         purple: 'rgb(153, 102, 255)',
//         grey: 'rgb(201, 203, 207)'
//     };
//     var color = Chart.helpers.color;
// /////////////////////////////////////////// Sampah Organik ///////////////////////////////////////////////////
//     var barChartDataMingguanOrganik = {
//         labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
//         datasets: [{
//                 label: 'Tinggi Sampah',
//                 backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
//                 borderColor: window.chartColors.red,
//                 borderWidth: 1,
//                 data: [35, 60, 10, 30, 25, 90, 70]

//             }, {
//                 label: 'Gas Metana',
//                 backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
//                 borderColor: window.chartColors.blue,
//                 borderWidth: 1,
//                 data: [70, 55, 90, 10, 25, 70, 40]
//             }]

//     };

//     var barChartDataBulananOrganik = {
//         labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
//         datasets: [{
//                 label: 'Tinggi Sampah',
//                 backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
//                 borderColor: window.chartColors.red,
//                 borderWidth: 1,
//                 data: [35, 60, 10, 30, 25, 90, 70, 20, 30, 23, 34, 11]

//             }, {
//                 label: 'Gas Metana',
//                 backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
//                 borderColor: window.chartColors.blue,
//                 borderWidth: 1,
//                 data: [70, 55, 90, 90, 25, 70, 40, 22, 35, 45, 11, 30]
//             }]

//     };

//     var grafik_mingguan_organik = document.getElementById("grafik-mingguan-organik");
//     if (grafik_mingguan_organik) {
//         var ctx = document.getElementById('grafik-mingguan-organik').getContext('2d');
//         window.myBar = new Chart(ctx, {
//             type: 'bar',
//             maintainAspectRatio: false,
//             responsive: true,
//             data: barChartDataMingguanOrganik,
//             options
//         });


//     }

//     var grafik_bulanan_organik = document.getElementById("grafik-bulanan-organik");
//     if (grafik_bulanan_organik) {
//         var ctx = document.getElementById('grafik-bulanan-organik').getContext('2d');
//         window.myBar = new Chart(ctx, {
//             type: 'bar',
//             maintainAspectRatio: false,
//             responsive: true,
//             data: barChartDataBulananOrganik,
//             options
//         });


//     }


// /////////////////////////////////////////// Sampah Non Organik ///////////////////////////////////////////////////
// var barChartDataMingguanAnorganik = {
//     labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
//     datasets: [{
//             label: 'Tinggi Sampah',
//             backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
//             borderColor: window.chartColors.red,
//             borderWidth: 1,
//             data: [35, 60, 10, 30, 25, 90, 70]

//         }, {
//             label: 'Gas Metana',
//             backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
//             borderColor: window.chartColors.blue,
//             borderWidth: 1,
//             data: [70, 55, 90, 10, 25, 70, 40]
//         }]

// };

// var barChartDataBulananAnorganik = {
//     labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
//     datasets: [{
//             label: 'Tinggi Sampah',
//             backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
//             borderColor: window.chartColors.red,
//             borderWidth: 1,
//             data: [35, 60, 10, 30, 25, 90, 70, 20, 30, 23, 34, 11]

//         }, {
//             label: 'Gas Metana',
//             backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
//             borderColor: window.chartColors.blue,
//             borderWidth: 1,
//             data: [70, 55, 90, 90, 25, 70, 40, 22, 35, 45, 11, 30]
//         }]

// };

// var grafik_mingguan_anorganik = document.getElementById("grafik-mingguan-anorganik");
// if (grafik_mingguan_anorganik) {
//     var ctx = document.getElementById('grafik-mingguan-anorganik').getContext('2d');
//     window.myBar = new Chart(ctx, {
//         type: 'bar',
//         maintainAspectRatio: false,
//         responsive: true,
//         data: barChartDataMingguanAnorganik,
//         options
//     });


// }

// var grafik_bulanan_anorganik = document.getElementById("grafik-bulanan-anorganik");
// if (grafik_bulanan_anorganik) {
//     var ctx = document.getElementById('grafik-bulanan-anorganik').getContext('2d');
//     window.myBar = new Chart(ctx, {
//         type: 'bar',
//         maintainAspectRatio: false,
//         responsive: true,
//         data: barChartDataBulananAnorganik,
//         options
//     });


// }



// })(jQuery);
