<?php

namespace App\Livewire\Poscontroller;

use App\Models\PatientInfo;
use App\Models\PosLog;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Patientrecord;
use App\Models\Oculussinister;
use App\Models\Oculusdexter;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class PosView extends Component
{
    use WithPagination,WithoutUrlPagination;

    protected $patientData;
    public $perPage = 10;
    public $search;
    public $isAddPosModal = false;
    public $branches;
    public $createPosByPatient;
    public $patient_id;
    public $patientNameforModal = "";
    public $pr_count;


    

    // Create POS Variables
    public $pos_typeofPurchase;
    public $lensProduct_id;
    public $frameProduct_id;
    public $doctor_id;
    public $notes;
    public $pd;
    public $lenslist;
    public $framelist;


    // Data Per Patient

    public $patientrecord;
    public $os_data,$od_data;
    

    public function getIDforPos($item){
        $this->refreshTable();
       
        $this->patient_id = $item;
        
        $patient = PatientInfo::find($item);
        $this->patientNameforModal = $patient->patient_lname . ', ' . $patient->patient_fname . ' ';
        $this->patientrecord = Patientrecord::where('patient_id',$patient->id)->orderbyDesc('created_at')->limit(1)->get();
        $this->pr_count = $this->patientrecord->count();
        // dd($this->pr_count);

        $os_id = 0;
        $od_id = 0;

        foreach($this->patientrecord as $lastrecord){
            $os_id = $lastrecord->os_id;
            $od_id = $lastrecord->od_id;
        }
        if($os_id <= 0 || $od_id <= 0){
            $this->os_data  = Oculussinister::find($os_id);
            $this->od_data = Oculusdexter::find($od_id);
        }else{
            $this->os_data  = 0;
            $this->od_data = 0;
        }
       
        $this->isAddPosModal = true;
        
            

    }
    public function savePos(){
        if(!$this->isAddPosModal){
            return;
        }else{
            //Insert Data to poslogs must be always pending
        }
    }
    public function refreshTable()
    {
        $this->reset();

        $this->isAddPosModal = false;
        $this->resetTable();
        

    }

    public function resetTable(){
        foreach(auth()->user()->roles as $roles){
            if($roles->is_admin == 1){
                 $this->patientData = Patientinfo::search($this->search)->paginate($this->perPage,pageName: 'Patients');
            }else{
                
                $this->patientData = Patientinfo::where('branch_id',$roles->branch_id)->search($this->search)->paginate($this->perPage,pageName: 'Patients');
            }
        }
       $this->branches = Branch::all();
        $productlens = Product::query();
        $productlens ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.category_name')
                ->whereRaw('LOWER(categories.category_name) like ?', ['%' . strtolower('Lens') . '%'])
                ->distinct()
                ->get();
        
        $this->lenslist = $productlens->get();
        $productframe = Product::query();
        $productframe->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.category_name')
        ->whereRaw('LOWER(categories.category_name) like ?', ['%' . strtolower('Frames') . '%'])
        ->distinct()
        ->get();

        $this->framelist = $productframe->get();

      

    }
    public function render()
    {
       

        foreach(auth()->user()->roles as $roles){
            if($roles->is_admin == 1){
                $this->patientData = Patientinfo::search($this->search)->paginate($this->perPage,pageName: 'Patients');
            }else{
                $this->patientData = Patientinfo::where('branch_id',$roles->branch_id)->search($this->search)->paginate($this->perPage,pageName: 'Patients');
            }
           
        }
        
          
      
       
        return view('livewire.pos.pos-view',[
            'data' =>   $this->patientData
        ]);
    }
}
