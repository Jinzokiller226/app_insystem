<?php

namespace App\Livewire\Patientcontroller;

use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Component;
use App\Models\Patientinfo;
use App\Models\DoctorInfo;
use App\Models\Oculusdexter;
use App\Models\Oculussinister;

use Livewire\Attributes\Session;
use App\Models\Branch;
use App\Models\Patientrecord;

use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
class PatientInfoView extends Component
{
    use WithPagination,WithoutUrlPagination;
    public $perPage = 10;
    
    protected  $data;
    public $historyData;
    public $isAddOpen = false;
    public $isEditOpen = false;
    public $UpdateDiagnosis = false;
    public $patient_id;
    public $patient_fname;
    public $patient_mname = "";
    public $patient_lname;
    public $patient_fullName = "";

    public $patient_address;
    public $patient_contact_number;
    public $patient_age;
    public $patient_gender;
    public $branch_id;
    public $user_id;
    public $od_enable = false;
    public $os_enable = false;

    // OD FIELDS
    public $od_sphere;
    public $od_cylinder;
    public $od_axis;
    public $od_add;
    public $od_va;
    // OD FIELD END
    // OS FIELDS
    public $os_sphere;
    public $os_cylinder;
    public $os_axis;
    public $os_add;
    public $os_va;
    // OS FIELD END
    public $pr_notes;
    public $pr_pd;
    public $doctor_id = 0;


    // Combo box fields
    public $branches;
    public $doctors;

   // Searching
    public $search;

    
    public $dataFromSession;

    public $patientName;
    public $patientRecordCount;
    // Session for History
    #[Session] 
    public $session_patient_id;


    
    public function UpdateData($item){
        $this->reset();
        $this->refreshTable();
        $this->isEditOpen = true;
        $this->patient_id = $item;
        
        $patient = PatientInfo::find($item);
        $this->patient_fname = $patient->patient_fname;
        $this->patient_mname = $patient->patient_mname;
        $this->patient_lname = $patient->patient_lname;
        $this->patient_address = $patient->patient_address;
        $this->patient_contact_number = $patient->patient_contact_number;
        $this->patient_age = $patient->patient_age;
        $this->patient_gender = $patient->patient_gender;
        $this->branch_id = $patient->branch_id;
    

    }
    public function infoDiagnosis($item){

        $this->UpdateDiagnosis = true;
        $patient = PatientInfo::find($item);
        $this->patient_id = $item;

        $this->patient_fullName = $patient->patient_fname.' '.$patient->patient_mname.' '.$patient->patient_lname.' ';        
    }

    public function viewHistory($itemID){
        $this->historyData = null;
        $this->dataFromSession = 0;
       $this->dataFromSession = $itemID;
        $this->showData();
        
    }
    public function showData(){
           
      
        $patient = PatientInfo::find($this->dataFromSession);
        $this->patientID = $patient->id;

        $this->patientName = $patient->patient_fname.' '.$patient->patient_mname.' '.$patient->patient_lname;
        $this->historyData = Patientrecord::all()->where('patient_id',$this->dataFromSession);
        
        $this->patientRecordCount = Patientrecord::all()->where('patient_id','=',$this->dataFromSession)->count();
       
      
    }

    public function registerDiagnosis(){
        if(!$this->UpdateDiagnosis){
            return;
        }else{
            
            $validated_os;
            $validated_od;

            $getlatestOD = 0;
            $getlatestOS = 0;

                        if($this->os_enable == true){
                            $validated_os = $this->validate([
                            'os_sphere' => ['required', 'int', 'max:255'],
                            'os_cylinder' => ['required', 'int', 'max:255'],
                            'os_axis' => ['required', 'int', 'max:255'],
                            'os_add' => ['required', 'int', 'max:255'],
                            'os_va' => ['required', 'int', 'max:255'],
                            ]);
                            $validated_os['patient_id'] = $this->patient_id;                
                            event(new Registered($patient = Oculussinister::create($validated_os)));
                            $getlatestOS = $patient->id;

                    

                        }

                        if($this->od_enable == true){
                            $validated_od = $this->validate([
                            'od_sphere' => ['required', 'int', 'max:255'],
                            'od_cylinder' => ['required', 'int', 'max:255'],
                            'od_axis' => ['required', 'int', 'max:255'],
                            'od_add' => ['required', 'int', 'max:255'],
                            'od_va' => ['required', 'int', 'max:255'],
                            ]);
                            $validated_od['patient_id'] = $this->patient_id;                
                            event(new Registered($patient = Oculusdexter::create($validated_od)));
                            $getlatestOD = $patient->id;
                        }

                        $this->insertPR($getlatestOS,$getlatestOD);
                        
                        $this->refreshTable();
                        $this->dispatch('success', message: 'Patient Diagnosis Updated Successfully');
                     
                       

        }

    }

    public function insertPR($lastOS,$lastOD){
        $validated['pr_notes'] = $this->pr_notes;        
        $validated['pr_pd'] = $this->pr_pd;       
        $validated['doctor_id'] = $this->doctor_id;   
        $validated['patient_id'] = $this->patient_id;        
        $validated['user_id'] = auth()->user()->id;  
        $validated['os_id'] = $lastOS;   
        $validated['od_id'] = $lastOD;   
             
     
        event(new Registered($pr = Patientrecord::create($validated)));


      

   
    }
    public function UpdatePatient(){
       
        if($this->isEditOpen == false){
            return;
        }else{
            // Save Data Here
            $patient = PatientInfo::find($this->patient_id);
            $validated = $this->validate([
                'patient_fname' => ['required', 'string', 'max:255'],
                'patient_lname' => ['required', 'string', 'max:255'],
                'patient_address' => ['required', 'string', 'max:255'],
                'patient_contact_number' => ['required', 'string', 'max:255'],
                'patient_age' => ['required', 'int', 'max:255'],
                'patient_gender' => ['required', 'string', 'max:255'],      
            ]);
            $patient->patient_fname = $this->patient_fname. "";
            $patient->patient_mname = $this->patient_mname. "";
            $patient->patient_lname = $this->patient_lname. "";
            $patient->patient_address = $this->patient_address;
            $patient->patient_contact_number = $this->patient_contact_number;
            $patient->patient_age = $this->patient_age;
            $patient->patient_gender = $this->patient_gender;
            $patient->branch_id =  $this->branch_id;
            $patient->user_id = auth()->user()->id;
            $patient->save();

            $this->reset();
            $this->dispatch('success', message: 'Patient Updated Successfully');
            $this->refreshTable();
        }
    }
    public function register(){
        if (!$this->isAddOpen) {
            
            return;
        }else{
            $validated = $this->validate([
                'patient_fname' => ['required', 'string', 'max:255'],
                'patient_lname' => ['required', 'string', 'max:255'],
                'patient_address' => ['required', 'string', 'max:255'],
                'patient_contact_number' => ['required', 'string', 'max:255'],
                'patient_age' => ['required', 'int', 'max:255'],
                'patient_gender' => ['required', 'string', 'max:255'],      
            ]);
           $validated['patient_mname'] = $this->patient_mname. "";
           foreach(auth()->user()->roles as $getRole){
            
            if($getRole->is_admin == 1){
                 $validated['branch_id'] = $this->branch_id;
            }else{
             
                $validated['branch_id'] = $getRole->branch_id;
            }
           }
            
            $validated['user_id'] = auth()->user()->id;
            
            
            event(new Registered($patient = Patientinfo::create($validated)));
            
            $this->reset();
            $this->dispatch('success', message: 'Patient Added Successfully');

          
          
        }
        
        $this->resetTable();


    }
    public function refreshTable()
    {
        $this->reset();   
       
         $this->resetTable();
        

    }

    public function resetTable(){
        $this->isAddOpen = false;
        $this->isEditOpen = false;
        $this->UpdateDiagnosis = false;
        $this->data = Patientinfo::paginate(10,pageName: 'Patients');
       $this->branches = Branch::all();



     
        
        

    }
    public function mount(){
  
        $this->data = Patientinfo::paginate(10,pageName: 'Patients');
        $this->branches = Branch::all();
        

    }

    public function render()
    {
      
        
       
        
        $this->doctors = DoctorInfo::all();  
        foreach(auth()->user()->roles as $roles){
            if($roles->is_admin == 1){
                $this->data = Patientinfo::search($this->search)->paginate($this->perPage);
            }else{
                $this->data = Patientinfo::where('branch_id',$roles->branch_id)->search($this->search)->paginate($this->perPage);
            }
        }

      
        return view('livewire.patientinfo.patient-info-view',[
            'data' =>   $this->data
        ]);
    }
}
