// chart 2

var ctx2 = document.getElementById("chart-line").getContext("2d");

var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke1.addColorStop(1, "rgba(10, 28, 168, 0.4)");
gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.2)");
gradientStroke1.addColorStop(0, "rgba(10, 28, 168, 0)"); //blue colors

var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke2.addColorStop(1, "rgba(11, 209, 33, 0.4)");
gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.2)");
gradientStroke2.addColorStop(0, "rgba(11, 209, 33, 0)"); //purple colors

new Chart(ctx2, {
    type: "line",
    data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
            {
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#354fe6",
                borderWidth: 3,
                backgroundColor: gradientStroke1,
                fill: true,
                data: [300, 240, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6,
            },
            {
                label: "Websites",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#4ed961",
                borderWidth: 3,
                backgroundColor: gradientStroke2,
                fill: true,
                data: [350, 190, 240, 140, 290, 290, 340, 230, 400],
                maxBarThickness: 6,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            },
        },
        interaction: {
            intersect: false,
            mode: "index",
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                },
                ticks: {
                    display: true,
                    padding: 10,
                    color: "#b2b9bf",
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: "normal",
                        lineHeight: 2,
                    },
                },
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5],
                },
                ticks: {
                    display: true,
                    color: "#b2b9bf",
                    padding: 20,
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: "normal",
                        lineHeight: 2,
                    },
                },
            },
        },
    },
});

// end chart 2
