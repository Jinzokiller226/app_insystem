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
use Illuminate\Auth\Events\Registered;
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
    public $pos_invoice_id;

    public $pos_typeofPurchase;
    public $lensProduct_id = 0;
    public $frameProduct_id = 0;
    public $doctor_id;
    public $notes;
    public $pd;
    public $lenslist;
    public $framelist;
    public $totalPrice = 0;
    public $pos_dp = 0;
    public $pr_id = 0;
    public $branch_id;



    // Data Per Patient

    public $patientrecord;
    public $os_data,$od_data;
    
    public function updated($property){
        
            $lens = Product::find($this->lensProduct_id);
            $frames = Product::find($this->frameProduct_id);
            $this->totalPrice = ($lens->product_price ?? 0)  + ($frames->product_price ?? 0) ;
    }

    public function getIDforPos($item){
        $this->refreshTable();
       
       
        
        $patient = PatientInfo::find($item);
        $this->patientNameforModal = $patient->patient_lname . ', ' . $patient->patient_fname . ' ';
        $this->branch_id = $patient->branch_id;
        $this->patient_id = $patient->id;
        
        $this->patientrecord = Patientrecord::where('patient_id',$patient->id)->orderbyDesc('created_at')->limit(1)->get();
        $this->pr_count = $this->patientrecord->count();
        // dd($this->pr_count);

        $os_id = 0;
        $od_id = 0;

        foreach($this->patientrecord as $lastrecord){
            $os_id = $lastrecord->os_id;
            $od_id = $lastrecord->od_id;
            $this->pr_id = $lastrecord->id;

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
            $validated;
            
            if($this->pos_typeofPurchase == "DP"){
                $validated = $this->validate([
                    'pos_invoice_id' => ['required','string','max:255'],
                    'pos_typeofPurchase' => ['required', 'string', 'max:255'],
                    'lensProduct_id' => ['required', 'string', 'max:255'],
                    'frameProduct_id' => ['required', 'string', 'max:255'],
                    'pos_dp' => ['required', 'int'],
                ]);
                
                
                $validated['pos_balance'] = ($this->totalPrice) - ($this->pos_dp) ;
                $validated['pos_deposit'] = $this->pos_dp + 0;

                    
            }else{
                $validated = $this->validate([
                    'pos_invoice_id' => ['required','string','max:255'],
                    'pos_typeofPurchase' => ['required', 'string', 'max:255'],
                    'lensProduct_id' => ['required', 'string', 'max:255'],
                    'frameProduct_id' => ['required', 'string', 'max:255'],
                ]);
                $validated['pos_balance'] = 0 ;
                $validated['pos_deposit'] = $this->pos_dp + 0;
                

            }
           
            $validated['pos_invoice_id'] = $this->pos_invoice_id;
            $validated['lens_product_id'] = $this->lensProduct_id;
            $validated['frame_product_id'] = $this->frameProduct_id;
            $validated['pos_typeOfPurchase'] = $this->pos_typeofPurchase;
            $validated['branch_id'] = $this->branch_id;
            $validated['user_id'] = auth()->user()->id;
            $validated['pos_addamount'] = $this->totalPrice;
            $validated['pos_status'] = 0;
            $validated['pr_id'] = $this->pr_id;
            $validated['patient_id'] = $this->patient_id;  
          
           
            event(new Registered($pos = PosLog::create($validated)));
            
            $this->dispatch('success', message: 'Purchase Added Successfully as Pending');
            $this->refreshTable();

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
