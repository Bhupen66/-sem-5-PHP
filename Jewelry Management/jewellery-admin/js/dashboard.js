document.addEventListener('DOMContentLoaded', function() {
    // Fetch summary data
    fetch('summary.php')
        .then(response => response.json())
        .then(data => {
            // Update summary statistics
            document.getElementById('total-sales').textContent = `$${parseFloat(data.total_sales).toFixed(2)}`;
            document.getElementById('total-orders').textContent = data.total_orders;

            // Render the chart
            const ctx = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx, {
                type: 'line', // or 'bar', 'pie', etc.
                data: {
                    labels: data.chart_data.dates,
                    datasets: [{
                        label: 'Daily Sales',
                        data: data.chart_data.totals,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
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
        })
        .catch(error => console.error('Error fetching data:', error));
});
