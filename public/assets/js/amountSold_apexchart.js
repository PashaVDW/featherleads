class KTExampleAreaChart {
    static init() {
        // Data passed from the Blade view
        let salesData = window.salesData;
        let categories = window.categories;

        const options = {
            series: [{
                name: 'Sales',
                data: salesData
            }],
            chart: {
                height: 250,
                type: 'area',
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: ['var(--tw-primary)']
            },
            xaxis: {
                categories: categories,
                axisBorder: {
                    show: false,
                },
                maxTicks: 12,
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: 'var(--tw-gray-500)',
                        fontSize: '12px'
                    }
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: 'var(--tw-primary)',
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: false,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                min: 0,
                max: Math.max(1500),
                tickAmount: 5,
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: 'var(--tw-gray-500)',
                        fontSize: '12px'
                    },
                    formatter: (value) => {
                        return `€${value}`;
                    }
                }
            },
            tooltip: {
                enabled: true,
                custom({series, seriesIndex, dataPointIndex, w}) {
                    const number = series[seriesIndex][dataPointIndex];
                    const monthName = categories[dataPointIndex];

                    const formatter = new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'EUR',
                    });

                    const formattedNumber = formatter.format(number);

                    return `
<div class="flex flex-col gap-2 p-3.5">
 <div class="font-medium text-2sm text-gray-600">
  ${monthName}, 2024 Sales
 </div>
 <div class="flex items-center gap-1.5">
  <div class="font-semibold text-md text-gray-900">
   ${formattedNumber}
  </div>
  <span class="badge badge-outline badge-success badge-xs">
   +24%
  </span>
 </div>
</div>`;
                }
            },
            markers: {
                size: 0,
                colors: 'var(--tw-primary-light)',
                strokeColors: 'var(--tw-primary)',
                strokeWidth: 4,
                strokeOpacity: 1,
                strokeDashArray: 0,
                fillOpacity: 1,
                discrete: [],
                shape: "circle",
                radius: 2,
                offsetX: 0,
                offsetY: 0,
                onClick: undefined,
                onDblClick: undefined,
                showNullDataPoints: true,
                hover: {
                    size: 8,
                    sizeOffset: 0
                }
            },
            fill: {
                gradient: {
                    enabled: true,
                    opacityFrom: 0.25,
                    opacityTo: 0
                }
            },
            grid: {
                borderColor: 'var(--tw-gray-200)',
                strokeDashArray: 5,
                clipMarkers: false,
                yaxis: {
                    lines: {
                        show: true
                    }
                },
                xaxis: {
                    lines: {
                        show: false
                    }
                },
            },
        };

        const element = document.querySelector('#area_chart');
        if (!element) return;

        const chart = new ApexCharts(element, options);
        chart.render();
    }
}

KTDom.ready(() => {
    KTExampleAreaChart.init();
});
