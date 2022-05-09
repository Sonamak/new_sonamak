function charts(container,tour,height,type) {
    $.ajax({
        'url': `admin-panal/chart/${tour}`,
        success: (e) => {
          let label = [];
          let value = [];
    
        for ( item in e ) {
        label.push(item);
        value.push(e[`${item}`]);
        }
    
        var options = {
            chart: {
            type: type ?? 'bar',
            height: height ?? 400,
            columnWidth: 10
            },
            
            colors: ["#38cab3"],
            series: [{
            name: 'sales',
            data: value
            }],
            dataLabels: {
            enabled: false,
            },
            plotOptions: {
            bar: {
                columnWidth: '2%',
            }
            },
            xaxis: {
            categories: label,
            axisBorder: {
                show: true,
                color: 'rgba(119, 119, 142, 0.05)',
                offsetX: 0,
                offsetY: 0,
                axisTicks: {
                show: true,
                borderType: 'solid',
                color: 'rgba(119, 119, 142, 0.05)',
                width: 6,
                offsetX: 0,
                offsetY: 0
                },
                labels: {
                    rotate: -90
                }
            },
            }
        }
    
        var chart = new ApexCharts(document.querySelector(`${container}`), options);
    
        chart.render();
    
        }
    })
}