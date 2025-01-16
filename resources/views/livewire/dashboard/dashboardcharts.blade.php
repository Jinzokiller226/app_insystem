
<div>
   
<canvas id="salesChart"></canvas>

        
</div>
@push('scripts')
<script>
      document.addEventListener('livewire:load', function () {
        const salesData = @this.salesData;
        
        const dates = salesData.map(item => item.date);
        const totals = salesData.map(item => item.total_sales);

        const ctx = document.getElementById('salesChart').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Sales Over Time',
                    data: totals,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'category',
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Total Sales'
                        }
                    }
                }
            }
        });
    });
    </script>
    @endpush  


