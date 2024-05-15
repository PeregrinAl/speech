<?php

namespace App\Livewire\Scenarios;

use App\Models\Scenario;
use Livewire\Component;

class ScenarioForm extends Component
{
    public $showModal;
    public $is_training;
    public $time_available;
    public function open_modal() {

        $this->reset(); 
        $this->resetErrorBag();

        $this->showModal = true;
    } 

    public function cancel() {

        $this->reset(); 
        $this->resetErrorBag();

    } 
    public function add_scenario() {
        $is_training = $this->is_training;
        $time_available = $this->time_available;
        $specialist_id = auth()->id();
        Scenario::create([
            'time_available' => $time_available,
            'specialist_id' => $specialist_id,
            'is_training' => $is_training? $is_training: false,
        ]);
        $this->dispatch('scenario_list_updated');

        $this->reset(); 
        $this->resetErrorBag();

    } 
    public function render()
    {
        return view('livewire.scenarios.scenario-form');
    }
}
