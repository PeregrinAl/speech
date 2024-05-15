<?php

namespace App\Livewire\Patients;

use Livewire\Component;
use App\Models\Patient_specialist;

use App\Models\User;

class PatientForm extends Component
{
    public $showModal = false, $status;
    public $patient_id;
    public $specialist_id;

    public function open_modal() {

        $this->reset(); 
        $this->resetErrorBag();

        $this->showModal = true;
    } 

    public function cancel() {

        $this->reset(); 
        $this->resetErrorBag();

    } 

    public function add_patient() {
        $patient_id = $this->patient_id;
        $specialist_id = auth()->id();

        $data = User::where('id',$patient_id)->where('role','patient')->exists();

        if($data):
            Patient_specialist::firstOrCreate([
                'patient_id' => $patient_id,
                'specialist_id' => $specialist_id,
            ],
            []
            );
            $this->dispatch('patients_list_updated');

            $this->reset(); 
            $this->resetErrorBag();
        else:

            $this->status = 'Такого пользователя не существует или он не является пациентом.';
        endif;

    } 


    public function render()
    {
        return view('livewire.patients.patient-form');
    }
}
