<?php

namespace App\Livewire\Patientcontroller;

use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Component;
use App\Models\Patientinfo;
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
    public $patient_address;
    public $patient_contact_number;
    public $patient_age;
    public $patient_gender;
    public $branch_id;
    public $user_id;
    public $pos_od_enable = false;
    public $pos_os_enable = false;
    // Combo box fields
    public $branches;
   // Searching
    public $search;

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

        // Get patient ID for view
        
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

     
        
        

    }
    public function mount(){
  
        $this->data = Patientinfo::paginate(10,pageName: 'Patients');
        $this->branches = Branch::all();
        

    }

    public function render()
    {
      
        
       
       
        $this->data = Patientinfo::search($this->search)->paginate($this->perPage);
        return view('livewire.patientinfo.patient-info-view',[
            'data' =>   $this->data
        ]);
    }
}
