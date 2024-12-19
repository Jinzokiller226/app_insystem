<?php

namespace App\Livewire\Poscontroller;

use App\Models\PatientInfo;
use App\Models\PosLog;
use App\Models\DoctorInfo;
use App\Models\Oculusdexter;
use App\Models\Oculussinister;
use App\Models\Branch;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Component;

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
    public $pos_typeofPurchase;
    public $pos_od_enable = false;
    public $pos_os_enable = false;
    
    public function getIDforPos($item){
        $this->refreshTable();
        $this->isAddPosModal = true;
        $this->patient_id = $item;
        
        $patient = PatientInfo::find($item);
        $this->patientNameforModal = $patient->patient_lname . ', ' . $patient->patient_fname . ' ';
        

    }

    public function refreshTable()
    {
        $this->reset();

        $this->isAddPosModal = false;
        $this->resetTable();
        

    }

    public function resetTable(){
        $this->patientData = Patientinfo::search($this->search)->paginate($this->perPage,pageName: 'Patients');
       $this->branches = Branch::all();

     
        
        

    }
    public function render()
    {
       
        
        $this->patientData = Patientinfo::search($this->search)->paginate($this->perPage,pageName: 'Patients');
        return view('livewire.pos.pos-view',[
            'data' =>   $this->patientData
        ]);
    }
}
