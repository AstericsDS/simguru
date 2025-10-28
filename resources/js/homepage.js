import ApexCharts from "apexcharts";


window.addEventListener("graph", (count) => {
    let CampusCount;
    let BuildingCount;
    let RoomCount;
    console.log(count);
    CampusCount = count.detail.kampus;
    BuildingCount = count.detail.gedung;
    RoomCount = count.detail.ruang;

    var options = {
        chart: {
            type: "donut",
        },
        series: [CampusCount, BuildingCount, RoomCount],
        labels: ["Kampus", "Gedung", "Ruang"],
    };

    var chart = new ApexCharts(
        document.querySelector("#homepagechart"),
        options
    );

    chart.render();
});
