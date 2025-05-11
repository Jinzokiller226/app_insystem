<?php

namespace App\Livewire\Dashboardcontroller;

use Livewire\Component;
use App\Models\PosLog;
use App\Models\Product;
use App\Models\PatientInfo;

use Illuminate\Support\Facades\DB;

class Dashboardcharts extends Component
{
    
    public $salesData;

    public $pendingProductSales;
    public $PendingDateRange;
    public $PendingTodayCount;
    public $pencentCountByDateRange;

    // public $ProfitOnCompleted = 0;
    // public $ProfitOnPending = 0;
    
    public $totalProfit = 0;


    public $StockOnHandCount;

    public $PatientCount;

    public $CompletePurchasesCount = 0;

    public $userBranchId;
  
    public function DashboardData(){
        
      
       $this->pendingDataPopulate();
       $this->StocksOnHand(); 
       $this->PatientsData();
        $this->CompletePurchase();
        $this->salesData = $this->getAllProfit();
       
        
    }
    public function refreshChart(){
        $this->salesData = $this->getAllProfit();
        $this->dispatch('chartDataUpdated', data: $this->salesData);
    }
    
    public function getAllProfit(){
        if($this->userBranchId == 0){
            // $productCompleted = PosLog::all();
            
            // foreach($productCompleted as $purchases){
            //     if($purchases->pos_status == 1){
            //         $this->ProfitOnCompleted =  $this->ProfitOnCompleted + ($purchases->pos_addamount);
            //     }else{
            //         $this->ProfitOnPending =  $this->ProfitOnPending + ($purchases->pos_addamount);  
            //     }
              
            // } 

            $posCompletedData = PosLog::where('pos_status',1)->get();
            $this->totalProfit = 0;
            foreach($posCompletedData as $allData){
                $this->totalProfit = $this->totalProfit + $allData->pos_addamount;
            }
            // dd($this->totalProfit);
            $salesData = DB::table('pos_logs');
            $salesData->select(DB::raw('DATE_FORMAT(created_at, "%b %d") as Date_profit'), DB::raw('SUM(pos_addamount) as Amount'))
            ->where('pos_status', 1)
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%b %d")'));
         
            return [
                'label' =>  $salesData->pluck('Date_profit'),
                'amount' => $salesData->pluck('Amount'),
                
            ];
            


          

        }else{
            $posCompletedData = PosLog::where('pos_status',1)
            ->where('branch_id',$this->userBranchId)
            ->get();
            $this->totalProfit = 0;
            foreach($posCompletedData as $allData){
                $this->totalProfit = $this->totalProfit + $allData->pos_addamount;
            }
            // dd($this->totalProfit);
            $salesData = DB::table('pos_logs');
            $salesData->select(DB::raw('DATE_FORMAT(created_at, "%b %d") as Date_profit'), DB::raw('SUM(pos_addamount) as Amount'))
            ->where('pos_status', 1)
            ->where('branch_id',$this->userBranchId)
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%b %d")'));
         
            return [
                'label' =>  $salesData->pluck('Date_profit'),
                'amount' => $salesData->pluck('Amount'),
                
            ];
        }
    }
    public function CompletePurchase(){
        if($this->userBranchId == 0){
            $this->CompletePurchasesCount = PosLog::where('pos_status',1)->get()->count();

        }else{
            $this->CompletePurchasesCount = PosLog::where('pos_status',1)
            ->where('branch_id',$this->userBranchId)
            ->get()->count();
        }
    }
    public function PatientsData(){
        if($this->userBranchId == 0){
            $this->PatientCount = PatientInfo::all()->count();
            
        }else{
            $this->PatientCount = PatientInfo::where('branch_id',$this->userBranchId)->get()->count();
        }

    }

    public function StocksOnHand(){
        if($this->userBranchId == 0){
            $product = Product::all();
            $productCount = 0;

            foreach($product as $perProduct){
                $productCount = $productCount + ($perProduct->product_quantity);

            }
            $this->StockOnHandCount = $productCount;

            // dd($productCount);

        }else{
            $product = Product::where('branch_id',$this->userBranchId)->get();
            $productCount = 0;
         
            foreach($product as $perProduct){
                $productCount = $productCount + ($perProduct->product_quantity);

            }
            $this->StockOnHandCount = $productCount;

        }
    }
    public function pendingDataPopulate(){
        
        if($this->userBranchId == 0){
            
            $poslog = PosLog::query();
            $poslog->select('id')
            ->whereRaw('pos_status = 0')
            ->whereRaw('DATE(created_at) > DATE_SUB(NOW(), INTERVAL '.$this->PendingDateRange.' DAY)');
            
            // dd($poslog->get()->count());

            $this->pendingProductSales = $poslog->get()->count();

            $RecordToday = PosLog::query();
            $RecordToday->select('*')
            ->whereRaw('pos_status = 0');
            // ->whereRaw('DATE_FORMAT(DATE(created_at),"%Y-%m-%d") LIKE ?',"%".date_format(now(),"Y-m-d")."%");

      
            $this->PendingTodayCount = $RecordToday->get()->count();
            if($this->PendingTodayCount > 0 || $this->pendingProductSales > 0){
                // $this->pencentCountByDateRange = (($this->PendingTodayCount) / $this->pendingProductSales) * 100; 
            }
           
        }else{
            
            $poslog = PosLog::query();
            $poslog->select('id')
            ->whereRaw('pos_status = 0')
            ->whereRaw('branch_id = '.$this->userBranchId)
            ->whereRaw('DATE(created_at) > DATE_SUB(NOW(), INTERVAL '.$this->PendingDateRange.' DAY)');
            
            // dd($poslog->get()->count());

            $this->pendingProductSales = $poslog->get()->count();

            $RecordToday = PosLog::query();
            $RecordToday->select('id')
            ->whereRaw('pos_status = 0')
            ->whereRaw('branch_id = '.$this->userBranchId)
            ->whereRaw('DATE(created_at) = DATE(NOW())');
            
      
            $this->PendingTodayCount = $RecordToday->get()->count();
            if($RecordToday && $this->pendingProductSales){
                $this->pencentCountByDateRange = round((($this->PendingTodayCount) / $this->pendingProductSales) * 100,2); 
            }
            
        }
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
        $this->DashboardData();
        // $this->salesData = $this->getAllProfit();
        

                // dd($this->data);
    }
    public function render()
    {
        return view('livewire.dashboard.dashboardcharts');
    }
}
