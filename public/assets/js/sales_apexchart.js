class KTExamplePieChart {
    static init() {
        const data = [sold, toGoValue];
        const labels = ['Sold', 'To go'];
        const colors = ['var(--tw-primary)', 'var(--tw-brand)'];

        const options = {
            series: data,
            labels: labels,
            colors: colors,
            fill: {
                colors: colors,
            },
            chart: {
                type: 'donut',
            },
            stroke: {
                show: true,
                width: 2, // Set the width of the border
                colors: 'var(--tw-light)' // Set the color of the border
            },
            dataLabels: {
                enabled: false,
            },
            plotOptions: {
                pie: {
                    expandOnClick: false,
                }
            },
            legend: {
                offsetY: -5,
                offsetX: -10,
                fontSize: '14px', // Set the font size
                fontWeight: '500', // Set the font weight
                labels: {
                    colors: 'var(--tw-gray-700)', // Set the font color for the legend text
                    useSeriesColors: false // Optional: Set to true to use series colors for legend text
                },
                markers: {
                    width: 8,
                    height: 8
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        const element = document.querySelector('#pie_chart');
        if (!element) return;

        const chart = new ApexCharts(element, options);
        chart.render();
    }
}

KTDom.ready(() => {
    KTExamplePieChart.init();
});
