<?php

namespace App\Livewire\Patientcontroller;

use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Component;
use App\Models\Patientinfo;
use App\Models\DoctorInfo;
use App\Models\Oculusdexter;
use App\Models\Oculussinister;
use App\Models\Patientrecord;
use Livewire\Attributes\Session;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
class PatientInfoView extends Component
{
    use WithPagination,WithoutUrlPagination;
    public $perPage = 10;
    
    protected  $data;
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

    // Combo box fields
    public $branches;
    public $doctors;

   // Searching
    public $search;


    // Session for History
    #[Session] 
    public $session_patient_id;

    public function UpdateData($item){
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
        $this->refreshTable();
        $this->UpdateDiagnosis = true;
        $this->patient_id = $item;
        $patient = PatientInfo::find($item);
       
        $this->patient_fullName = $patient->patient_fname.' '.$patient->patient_mname.' '.$patient->patient_lname.' ';
        $get_patientRecord = Patientrecord::where('id',$item)->orderByDesc('id')->limit(1)->get();

            foreach($get_patientRecord as $record){
                    $this->pr_notes = $record->pr_notes;
                    $this->pr_pd = $record->pr_pd;

            }

        $get_od = Oculusdexter::where('id',$item)->orderByDesc('created_at')->limit(1)->get();
        $countOD = OculusDexter::where('id',$item)->count();

        $get_os = Oculussinister::where('id',$item)->orderByDesc('created_at')->limit(1)->get();
        $countOS = Oculussinister::where('id',$item)->count();
        if($countOD > 0){
                foreach($get_od as $odData){
                    $this->od_enable = true;
                    $this->od_sphere = $odData->od_sphere;
                    $this->od_cylinder = $odData->od_cylinder;
                    $this->od_axis = $odData->od_axis;
                    $this->od_add = $odData->od_add;
                    $this->od_va = $odData->od_va;
                }
        }
        if($countOS > 0){
            foreach($get_os as $osData){
                $this->os_enable = true;
                $this->os_sphere = $osData->os_sphere;
                $this->os_cylinder = $osData->os_cylinder;
                $this->os_axis = $osData->os_axis;
                $this->os_add = $osData->os_add;
                $this->os_va = $osData->os_va;
            }
           
        }
        
        

        
    }

    public function viewHistory($itemID){
       session()->put('patient_data',$itemID);
       $this->redirect(route('patientinfosystem', absolute: false), navigate: true);
        
        
        
    }

    public function addOD_data($patientID){
        
    }

    public function addOS_data($patientID){
        
    }

    public function UpdateDiagnosis(){
        if(!$this->UpdateDiagnosis){
            return;
        }else{
            
        }
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
            $validated['branch_id'] = $this->branch_id;
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

        $this->isAddOpen = false;
        $this->isEditOpen = false;
        $this->UpdateDiagnosis = false;

        $this->resetTable();
        

    }

    public function resetTable(){
        $this->isAddOpen = false;
        $this->isEditOpen = false;
        $this->UpdateDiagnosis = false;
        $this->data = Patientinfo::paginate(10,pageName: 'Patients');
       $this->branches = Branch::all();
        $this->doctors = DoctorInfo::all();


     
        
        

    }
    public function mount(){
  
        $this->data = Patientinfo::paginate(10,pageName: 'Patients');
        $this->branches = Branch::all();
         $this->doctors = DoctorInfo::all();

    }

    public function render()
    {
      
        
       
       
        $this->data = Patientinfo::search($this->search)->paginate($this->perPage);
        return view('livewire.patientinfo.patient-info-view',[
            'data' =>   $this->data
        ]);
    }
}
