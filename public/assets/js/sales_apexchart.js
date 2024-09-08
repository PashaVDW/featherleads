class KTExamplePieChart {
    static init() {
        // Initial data (monthly by default)
        let data = [sold, toGoValue];
        const labels = ['Sold', 'Target Left'];
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
                width: 2,
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
                fontSize: '14px',
                fontWeight: '500',
                labels: {
                    colors: 'var(--tw-gray-700)',
                    useSeriesColors: false
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

        // Initialize the chart
        const chart = new ApexCharts(element, options);
        chart.render();

        // Sorting logic
        const sortOptions = ['daily', 'weekly', 'monthly'];
        let currentSortIndex = 0;

        // Data for different sort options
        const daysInMonth = 30; // or use the dynamic function if needed
        const dataSets = {
            daily: {
                sold: Math.round(sold / daysInMonth),
                toGoValue: Math.round(toGoValue / daysInMonth)
            },
            weekly: {
                sold: Math.round(sold / daysInMonth * 7),
                toGoValue: Math.round(toGoValue / daysInMonth * 7)
            },
            monthly: {
                sold: Math.round(sold),
                toGoValue: Math.round(toGoValue)
            }
        };

        // Function to update the chart data and the text
        function updateChartData() {
            const currentSort = sortOptions[currentSortIndex];
            const { sold, toGoValue } = dataSets[currentSort];

            // Update chart data
            chart.updateOptions({
                series: [sold, toGoValue]
            });

            // Update the view mode text
            const viewModeText = document.querySelector('#viewModeText');
            viewModeText.textContent = `You are currently viewing this in: ${capitalizeFirstLetter(currentSort)} mode`;

            // Cycle through sort options
            currentSortIndex = (currentSortIndex + 1) % sortOptions.length;
        }

        // Event listener for the sort button
        const sortButton = document.querySelector('button[data-tooltip="#sort"]');
        sortButton.addEventListener('click', () => {
            updateChartData();
        });

        // Helper function to capitalize the first letter
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    }
}

KTDom.ready(() => {
    KTExamplePieChart.init();
});
