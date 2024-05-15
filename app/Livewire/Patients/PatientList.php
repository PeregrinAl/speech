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
        $this->render();
    }
    public function delete($deleting_id) {

        $data = Patient_specialist::where('specialist_id',Auth::id())->where('patient_id',$deleting_id)->delete();

        //var2

        /*$data = Auth::user()->with(["patients" => function($q) use ($deleting_id) {
            $q->where('Patient_specialists.patient_id', '=', $deleting_id);
        }])->get()->pluck('patients');
*/
        //dd($data);

        $this->dispatch('patients_list_updated');

    } 

    public function render()
    {
        $userId = Auth::id();
        $patients = User::where('id', $userId)->first()->patients;
        return view('livewire.patients.patient-list', compact('patients'));
    }
}
