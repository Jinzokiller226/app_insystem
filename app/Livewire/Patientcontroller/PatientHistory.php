<?php

namespace App\Livewire\PatientController;
use Livewire\Attributes\Session;
use Livewire\Component;
use App\Models\PatientInfo;
use App\Models\Patientrecord;

class PatientHistory extends Component
{
    protected $historyData;
    public $dataFromSession;
    public $patientID;

    public $patientName;
    public $patientRecordCount;



    public function mount()
    {
        // Retrieve value from session
        
        $this->dataFromSession = session()->get('patient_data'); 
    
        if($this->dataFromSession > 0){
            $patient = PatientInfo::find($this->dataFromSession);
            $this->patientID = $patient->id;

            $this->patientName = $patient->patient_fname.' '.$patient->patient_mname.' '.$patient->patient_lname;
        }
        session()->forget('patient_data');
    }
    
    public function render()
    {
        if($this->dataFromSession > 0){
            $this->historyData = Patientrecord::all()->where('patient_id','=',$this->patientID);
            $this->patientRecordCount = Patientrecord::all()->where('patient_id','=',$this->patientID)->count();
            return view('livewire.patientinfo.patient-history',[
                'historyData' =>   $this->historyData
            ]);
        }else{

      
        return view('livewire.patientinfo.patient-history');
        }
    }
}
