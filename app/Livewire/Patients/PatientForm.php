<?php

namespace App\Livewire\Patients;

use Livewire\Component;
use App\Models\Patient_specialist;

class PatientForm extends Component
{
    
    public $showModal;
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
        Patient_specialist::create([
            'patient_id' => $patient_id,
            'specialist_id' => $specialist_id,
        ]);
        $this->resetErrorBag();
        $this->reset(); 
    } 


    public function render()
    {
        return view('livewire.patients.patient-form');
    }
}
