
<div>
   
    <div class="grid grid-cols-2 gap-4 h-auto "  >
   
      <!-- Each <div> is a single column.
      Place some content inside to see the effect. -->
      <div class="grid grid-cols-2 gap-2 h-auto  " wire:poll.20000ms = "DashboardData">
      <div class="rounded-xl items-center shadow-xl  " style="background-color:#f0abfc;">
                  <div class="flex py-4 px-4 border rounded-t-xl rounded-b-full">
                       <h3 class="text-lg font-semibold   text-black " style=" text-decoration-thickness: 4px;">
                          Pending Purchases
                         
                          
                      </h3>
                      <button type="button"   class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto  dark:hover:bg-gray-600 dark:hover:text-white" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="black" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                            </svg>

                          <span class="sr-only">Close modal</span>
                      </button>

                  </div>

                 <div class="flex py-4 px-6" >
                       <h3 class="text-3xl font-bold " >
                        
                          @if($PendingTodayCount <= 0)
                          {{'No Entry Today'}}
                          @else
                          {{$PendingTodayCount}}
                          @endif
                          
                      </h3>

                      
                  </div>
                  <div class="flex py-2 px-6">
                      <h3 class="text-sm font-bold " >
                          @if($PendingTodayCount <= 0)
                              {{'No Entry Today'}}

                          @else
                            <!-- {{$pencentCountByDateRange}}% ({{$PendingDateRange}} Days) -->
                          @endif
                         
                          
                      </h3>
                  </div>
          
          </div>
          <div class=" bg-green-300 rounded-xl items-center shadow-xl  ">
                  <div class="flex py-4 px-4 border rounded-t-xl rounded-b-full">
                       <h3 class="text-lg font-semibold   text-black " style=" text-decoration-thickness: 4px;">
                          Stocks on Hand
                         
                          
                      </h3>
                      <button type="button"   class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto  dark:hover:bg-gray-600 dark:hover:text-white" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="black" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                            </svg>

                          <span class="sr-only">Close modal</span>
                      </button>

                  </div>

                 <div class="flex py-4 px-4">
                       <h3 class="text-2xl font-bold " >
                          {{$StockOnHandCount}} Units
                         
                          
                      </h3>

                      
                  </div>
                  <!-- <div class="flex py-4 px-4">
                      <h3 class="text-sm font-bold " >
                          Percent(7 days)
                         
                          
                      </h3>
                  </div> -->
          
          </div>
          <div class=" bg-orange-100 rounded-xl items-center shadow-xl  ">
                  <div class="flex py-4 px-4 border rounded-t-xl rounded-b-full">
                       <h3 class="text-lg font-semibold   text-black " style=" text-decoration-thickness: 4px;">
                         Patient
                         
                          
                      </h3>
                      <button type="button"   class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto  dark:hover:bg-gray-600 dark:hover:text-white" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="black" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                            </svg>

                          <span class="sr-only">Close modal</span>
                      </button>

                  </div>

                 <div class="flex py-4 px-4">
                       <h3 class="text-2xl font-bold " >
                          {{$PatientCount}}
                         
                          
                      </h3>

                      
                  </div>
                  <div class="flex py-4 px-4">
                      <h3 class="text-sm font-bold " >
                          <!-- Percent(7 days) -->
                         
                          
                      </h3>
                  </div>
          
          </div>
          <div class=" rounded-xl items-center shadow-xl  " style="background-color: #bae6fd;">
                  <div class="flex py-4 px-4 border rounded-t-xl rounded-b-full">
                       <h3 class="text-lg font-semibold   text-black " style=" text-decoration-thickness: 4px;">
                         Completed Purchases
                         
                          
                      </h3>
                      <button type="button"   class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto  dark:hover:bg-gray-600 dark:hover:text-white" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="black" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                            </svg>

                          <span class="sr-only">Close modal</span>
                      </button>

                  </div>

                 <div class="flex py-4 px-4">
                       <h3 class="text-2xl font-bold " >
                          {{$CompletePurchasesCount}}
                         
                          
                      </h3>

                      
                  </div>
                  <div class="flex py-4 px-4">
                      <h3 class="text-sm font-bold " >
                          <!-- Percent(7 days) -->
                         
                          
                      </h3>
                  </div>
          
          </div>
        <!-- first Div -->
        

      </div>

      <div class="bg-gray-200 rounded-xl shadow-xl">
            <div class="w-full h-full py-2 px-2">
                    <h1 class="py-4 font-bold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Total Profit: {{$totalProfit}}
                    </h1>
                <canvas id="liveChart" wire:ignore> </canvas>
            </div>
               <script>
                   let chart;
        const ctx = document.getElementById('liveChart').getContext('2d');
        
        function initChart(data) {
            // console.log(data);
            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.label,
                    datasets: [{
                        label: 'Profit' ,
                        data: data.amount,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 0 // Disable animation for smoother updates
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Initialize chart when component loads
        document.addEventListener('livewire:initialized', () => {
            initChart(@this.salesData);

            // Set up automatic refresh every second
            setInterval(() => {
                @this.refreshChart();
            }, 10000);

            // Listen for data updates
            @this.on('chartDataUpdated', () => {
                
                let Dataset = @this.salesData;
           
                chart.data.labels = Dataset.label;
                chart.data.datasets[0].data =  Dataset.amount;
               
                chart.update('none'); // Update without animation
            });
        });
               </script>
      </div>
    
    </div>
   
</div>



