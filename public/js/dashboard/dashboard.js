$(document).ready(function() {
    var ctx = document.getElementById('myChart');
    var pieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [
                {
                    data: [finishedOrder, activeOrder, waitingOrder],
                    backgroundColor: [
                        '#21ba45',
                        '#2185d0',
                        '#fbbd08',
                    ]
                }
            ],
            labels: [
                'Pesanan Selesai',
                'Pesanan Aktif',
                'Pesanan Menunggu'
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Statistik Pesanan Anda',
                fontSize: 20
            }
        }
    });
});