<?php

namespace App\Livewire\Patients;

use App\Models\Patient_specialist;
use Livewire\Component;
use App\Models\User;
use Auth;

class PatientList extends Component
{
    public $patient_specialist;

    // public function mount()
    // {
    //     $userId = Auth::id();
    //     $this->patient_specialist = Patient_specialist::where('specialist_id', $userId)->first();
    // }

    public function render()
    {
        $userId = Auth::id();
        $patients = User::where('id', $userId)->first()->patients;
        return view('livewire.patients.patient-list', ['patients' => $patients]);
    }
}
