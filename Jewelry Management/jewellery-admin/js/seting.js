document.addEventListener('DOMContentLoaded', function() {
    // Static data
    const totalSales = 12345.67;
    const totalOrders = 789;
    
    // Update summary statistics
    document.getElementById('total-sales').textContent = `$${totalSales.toFixed(2)}`;
    document.getElementById('total-orders').textContent = totalOrders;

    // Static chart data
    const chartData = {
        labels: ['2024-01-01', '2024-02-01', '2024-03-01', '2024-04-01', '2024-05-01'], // Dates or other labels
        datasets: [{
            label: 'Daily Sales',
            data: [1200, 1500, 1800, 1300, 1700], // Corresponding data
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderWidth: 2,
            fill: true
        }]
    };

    // Render the chart
    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'line', // or 'bar', 'pie', etc.
        data: chartData,
        options: {
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Sales'
                    }
                }
            }
        }
    });
});
