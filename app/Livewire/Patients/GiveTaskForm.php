<?php

namespace App\Livewire\Patients;

use App\Models\Home_scenario;
use Livewire\Component;
use App\Models\User;
use App\Models\Scenario;
use Auth;
use Livewire\Attributes\On;

class GiveTaskForm extends Component
{
    public $showModal = false;
    public $userId;
    public $patient_id;
    public $selected_scenario;
    // protected $listeners = ['give_task' => 'open_modal'];
    #[On('give_task')]
    public function open_modal(User $patient)
    {
        $this->reset();
        $this->resetErrorBag();
        $this->patient_id = $patient->id;
        $this->showModal = true;

    }
    public function assignTask()
    {
        // Здесь вы можете добавить логику для назначения задания пациенту

        $selected_scenario = $this->selected_scenario;
        // Patient::find($patientId)->assignTask($this->selectedTask);
        $patient_id = $this->patient_id;
        $data = Scenario::where('specialist_id', Auth::id())->get();

        if ($data):
            Home_scenario::firstOrCreate(
                [
                    'patient_id' => $patient_id,
                    'scenario_id' => $selected_scenario,
                ],
                []
            );

            $this->reset();
            $this->resetErrorBag();
        else:

            $this->status = 'Такого пользователя не существует или он не является пациентом.';
        endif;
        // После назначения задания вы можете закрыть модальное окно

        $this->reset();
        $this->resetErrorBag();
    }
    public function cancel()
    {

        $this->reset();
        $this->resetErrorBag();

    }
    public function render()
    {
        $userId = Auth::id();
        $scenarios = User::where('id', $userId)->first()->scenarios;
        if ($scenarios->first()) {
            $this->selected_scenario = $scenarios->first()->id;
        }

        //dd($scenarios);
        return view('livewire.patients.give-task-form', compact('scenarios'));
    }
}
