<?php

namespace App\Livewire\Dashboardcontroller;

use Livewire\Component;
use App\Models\PosLog;
use Illuminate\Support\Facades\DB;
class Dashboardcharts extends Component
{
    public $labels = [];
    public $data = [];
    public $salesData;

    public function mount(){
                // Fetch the sales data from the database, e.g., total sales per day
                $this->salesData = DB::table('pos_logs')
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(pos_addamount) as total_sales'))
                ->groupBy(DB::raw('DATE(created_at)'))
                ->orderBy('date', 'asc')
                ->get();
    
            // Prepare the labels and data for the chart
                $this->labels =  $this->salesData->pluck('date')->toArray();
                $this->data =  $this->salesData->pluck('total_sales')->toArray();

                // dd($this->data);
    }
    public function render()
    {
        return view('livewire.dashboard.dashboardcharts');
    }
}
