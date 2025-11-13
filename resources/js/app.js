import './bootstrap';
import Chart from 'chart.js/auto';

// LINE CHART
const ctxLine = document.getElementById('lineChart')?.getContext('2d');

if(ctxLine){
    const gradient = ctxLine.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, "rgba(136,164,68,0.35)");
    gradient.addColorStop(1, "rgba(136,164,68,0)");

    new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [{
                data: [10, 15, 27, 32, 40, 45],
                borderColor: '#88A444',
                borderWidth: 3.8,
                fill: true,
                backgroundColor: gradient,
                tension: 0.55,
                pointRadius: 0,
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: '#E2ECD2', font: { size: 12 } }
                },
                y: {
                    grid: { color: 'rgba(255,255,255,0.05)' },
                    ticks: { color: '#E2ECD2', font: { size: 12 } }
                }
            }
        }
    });
}

// PIE CHART
const ctxPie = document.getElementById('pieChart')?.getContext('2d');

if(ctxPie){
    new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: ['Poultry','Produce','Dairy','Other'],
            datasets: [{
                data: [40, 28, 18, 14],
                backgroundColor: ['#88A444','#5A7A2E','#BFB58A','#E6E1C8'],
                hoverOffset: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { color: '#E2ECD2', font: { size: 12 } } }
            }
        }
    });
}
