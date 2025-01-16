<?php

namespace App\Livewire\Poscontroller;

use Livewire\Component;
use App\Models\PosLog;
use App\Models\PatientInfo;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class PendingPosView extends Component
{
    use WithPagination,WithoutUrlPagination;
    protected $posData;
    public $search;
    public $perPage;

    public $current_status;
   


    public function delete($item){
        PosLog::find($item)->delete();
        $this->dispatch('success', message: 'Pending Purchase Deleted!');
        $this->refreshTable();

    }

    public function getIDfromItem($item){
        
       $posDatabyID = PosLog::find($item);
       $posDatabyID->pos_status = 1;
       $posDatabyID->user_id = auth()->user()->id;
       $posDatabyID->save();

       //deduc item

        $product1 = Product::find($posDatabyID->lens_product_id);
        $product1->product_quantity = ($product1->product_quantity) - 1;
        $product1->save();

        $product2 = Product::find($posDatabyID->frame_product_id);
        $product2->product_quantity = ($product2->product_quantity) - 1;
        $product2->save();

        $this->dispatch('success', message: 'Mark As Complete (This item will be remove)');
        $this->refreshTable();


       
        
    }
    

    public function refreshTable(){

       
        $this->reset();
      
        $this->resetTable();
        // dd($this->posData);
    }
    public function resetTable(){
        foreach(auth()->user()->roles as $roles){
            if($roles->is_admin == 1){
                $this->posData  = PosLog::where('pos_status','0')
                ->search($this->search)
                ->paginate($this->perPage,pageName:'PendingPos');
            }else{
                $this->posData  = PosLog::where('pos_status','0')
                ->where('pos_logs.branch_id',$roles->branch_id)
                ->search($this->search)
                ->paginate($this->perPage,pageName:'PendingPos');
            }
        }
    }
    public function render()
    {
        foreach(auth()->user()->roles as $roles){
            if($roles->is_admin == 1){
                $this->posData  = PosLog::where('pos_status','0')
               
                ->search($this->search)
                ->paginate($this->perPage,pageName:'PendingPos');
            }else{
                $this->posData  = PosLog::where('pos_status','0')
                ->where('pos_logs.branch_id',$roles->branch_id)
                ->search($this->search)
                ->paginate($this->perPage,pageName:'PendingPos');
            }
        }


     
        return view('livewire.pos.pending-pos-view',[
            'posData' =>   $this->posData
        ]);
    }
}
