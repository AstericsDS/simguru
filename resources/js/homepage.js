import ApexCharts from "apexcharts";

var options = {
    chart: {
        type: "donut",
    },
    series: [30, 40, 35, 50],
    labels: ["gedung", "gedung2", "gedung3", "gedung4"],
};

var chart = new ApexCharts(document.querySelector("#homepagechart"), options);

chart.render();
