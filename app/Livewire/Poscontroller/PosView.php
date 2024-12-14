<?php

namespace App\Livewire\Poscontroller;

use App\Models\PatientInfo;
use App\Models\PosLog;
use App\Models\DoctorInfo;
use App\Models\Oculusdexter;
use App\Models\Oculussinister;
use App\Models\Branch;
use App\Models\Product;

use Livewire\Component;

class PosView extends Component
{
    protected $patientData;
    public $perPage;
    public $search;
    public $isAddPosModal = false;
    public $branches;

    public function refreshTable()
    {
        $this->reset();

        $this->patientData = false;
        $this->resetTable();
        

    }

    public function resetTable(){
        $this->patientData = false;
        $this->patientData = Patientinfo::paginate($this->perPage,pageName: 'Patients');
       $this->branches = Branch::all();

     
        
        

    }
    public function render()
    {
        $this->patientData = Patientinfo::search($this->search)->paginate($this->perPage);;

        return view('livewire.pos.pos-view',[
            'data' =>   $this->patientData
        ]);
    }
}
