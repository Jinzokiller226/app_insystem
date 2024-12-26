<?php

namespace App\Livewire\Doctorcontroller;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Models\DoctorInfo;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;

class DoctorManagement extends Component
{
    protected $data;
    public $doctor_id;
    public $doctor_fname;
    public $doctor_mname;
    public $doctor_lname;
    public $isAddDoctor = false;
    public $isEditDoctor = false;
    public $branch_id;
    public $branches;
    public $perPage = 10;
    public $search;
    public $countdata;

    public function deleteDoctor($id)
    {
        DoctorInfo::find($id)->delete();
        $this->dispatch('success', message: 'Doctor Added Successfully');  
        $this->reset();
        $this->refreshTable();

    }

    public function selectedDoctor($id){
      
        $this->isEditDoctor = true;
        $this->branches = Branch::all();
        $this->doctor_id = $id;
        $getData = DoctorInfo::find($this->doctor_id);
        $this->doctor_fname = $getData->doctor_fname;
        $this->doctor_mname = $getData->doctor_mname;
        $this->doctor_lname = $getData->doctor_lname;
        $this->branch_id = $getData->branch_id;

    }
    public function updateDoctor(){
        if(!$this->isEditDoctor){
            return;
        }else{
            $doctor = DoctorInfo::find($this->doctor_id);
            $validated = $this->validate([
                'doctor_fname' => ['required', 'string', 'max:255'],
                'doctor_mname' => ['required', 'string', 'max:255'],
                'doctor_lname' => ['required', 'string', 'max:255'],
            ]);
            $doctor->doctor_fname = $this->doctor_fname. "";
            $doctor->doctor_mname = $this->doctor_mname. "";
            $doctor->doctor_lname = $this->doctor_lname. "";
            $doctor->branch_id =  $this->branch_id;
            $doctor->user_id = auth()->user()->id;
            $doctor->save();
            $this->reset();
            $this->refreshTable();
            $this->dispatch('success', message: 'Doctor Added Successfully');  
        }
    }
    public function register(){
        if(!$this->isAddDoctor){
            return;
        }
        else{
            $validated = $this->validate([
                'doctor_fname' => ['required', 'string', 'max:255'],
                'doctor_mname' => ['required', 'string', 'max:255'],
                'doctor_lname' => ['required', 'string', 'max:255'],
            ]);
            $validated['branch_id'] = $this->branch_id;
            $validated['user_id'] = auth()->user()->id;

            event(new Registered($patient = DoctorInfo::create($validated)));
            $this->reset();
            $this->dispatch('success', message: 'Doctor Added Successfully');  
        }

        $this->reset();
        $this->refreshTable();

    }
    public function refreshTable(){
        $this->branches = Branch::all();

        $this->isAddDoctor = false;
        $this->isEditDoctor = false;
        $this->data = DoctorInfo::search($this->search)->paginate($this->perPage,pageName: 'Doctor');
        $this->countdata = $this->data->count();
    }
    public function render()
    {
        $this->branches = Branch::all();
        $this->data = DoctorInfo::search($this->search)->paginate($this->perPage,pageName: 'Doctor');
        $this->countdata = $this->data->count();
        
        return view('livewire.doctor.doctor-management',[
            'data' =>   $this->data
        ]);
    }
}
