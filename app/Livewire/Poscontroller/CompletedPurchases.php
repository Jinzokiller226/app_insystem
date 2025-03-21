<?php

namespace App\Livewire\Poscontroller;

use Livewire\Component;
use App\Models\PosLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class CompletedPurchases extends Component
{
    use WithPagination,WithoutUrlPagination;
    protected $salesData;
    public $search;
    public $perPageCompleted;

    
    public function resetTable(){
        foreach(auth()->user()->roles as $roles){
            if($roles->is_admin == 1){
                $this->salesData  = PosLog::where('pos_status','1')
               
                ->search($this->search)
                ->paginate($this->perPageCompleted);
            }else{
                $this->salesData  = PosLog::where('pos_status','1')
                ->where('pos_logs.branch_id',$roles->branch_id)
                ->search($this->search)
                ->paginate($this->perPageCompleted);
            }
        }
    }
    public function render()
    {
        foreach(auth()->user()->roles as $roles){
            if($roles->is_admin == 1){
                $this->salesData  = PosLog::where('pos_status','1')
               
                ->search($this->search)
                ->paginate($this->perPageCompleted);
            }else{
                $this->salesData  = PosLog::where('pos_status','1')
                ->where('pos_logs.branch_id',$roles->branch_id)
                ->search($this->search)
                ->paginate($this->perPageCompleted);
            }
        }

        return view('livewire.pos.completed-purchases',[
            'salesData' =>   $this->salesData
        ]);
    }
}
