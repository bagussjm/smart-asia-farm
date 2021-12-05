$(document).ready(function(){
    const ctx = document.getElementById('ticket-sales-line-chart').getContext('2d');
    // let baseUrl = window.location.origin+'/smart-asia-farm/public/api';
    let baseUrl = window.location.origin+'/api';
    $.get( baseUrl+'/ticket-sales-chart', function( data ) {
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Januari', 'Februari', 'Maret',
                    'April', 'Mei', 'Juni',
                    'Juli','Agustus','September',
                    'Oktober','November','Desember'],
                datasets: [{
                    label: '# Penjualan per bulan',
                    data: data.data,
                    fill: false,
                    borderColor: 'rgb(255 230 49)',
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });

});
