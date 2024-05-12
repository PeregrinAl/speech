<?php

namespace App\Livewire\Patients;

use App\Models\Patient_specialist;
use Livewire\Component;
use App\Models\User;
use Auth;

class PatientList extends Component
{
    public $patient_specialist;

    protected $listeners = ['patients_list_updated' => 'update'];

    public function update() {
        $this->reset(); 
        $this->resetErrorBag();
    }

    public function render()
    {
        $userId = Auth::id();
        $patients = User::where('id', $userId)->first()->patients;
        return view('livewire.patients.patient-list', ['patients' => $patients]);
    }
}
