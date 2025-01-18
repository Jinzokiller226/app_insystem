<?php

namespace App\Livewire\Dashboardcontroller;

use Livewire\Component;
use App\Models\PosLog;
use Illuminate\Support\Facades\DB;

class Dashboardcharts extends Component
{
    
    public $salesData;
    public $pendingProductSales;
    public $PendingDateRange;
    public $userBranchId;
  
    public function pendingChart(){
        
            if($this->userBranchId == 0){
                $poslog = PosLog::query();
                $poslog->select('id')
                ->whereRaw('pos_status = 0')
                ->whereRaw('DATE(created_at) > DATE_SUB(NOW(), INTERVAL '.$this->PendingDateRange.' DAY)');
                
                // dd($poslog->get()->count());

                $this->pendingProductSales = $poslog->get()->count();
          
                // dd( $this->salesData->get());

            
            
                
            }
      
       
        
        // dd( $this->pendingProductSales);
        // Fetch the sales data from the database, e.g., total sales per day
       

    // Prepare the labels and data for the chart
        
        
    }
    
    public function mount(){
        foreach(auth()->user()->roles as $roles){
            if($roles->is_admin == 1){
                $this->userBranchId = '0';
            }else{
                $this->userBranchId = $roles->branch_id;

            }
        }
        $this->PendingDateRange = 7; //default Date Range
        $this->pendingChart();


                // dd($this->data);
    }
    public function render()
    {
        return view('livewire.dashboard.dashboardcharts');
    }
}
