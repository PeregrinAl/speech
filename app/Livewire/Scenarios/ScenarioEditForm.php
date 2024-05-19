<?php

namespace App\Livewire\Scenarios;

use Livewire\Component;
use Livewire\Attributes\On;

class ScenarioEditForm extends Component
{
    
    public $showModal;
    public $is_training;
    public $time_available;
    public $name;
    
    #[On('edit_scenario')] 
    public function open_modal() {

        $this->reset(); 
        $this->resetErrorBag();

        $this->showModal = true;
    } 

    public function cancel() {

        $this->reset(); 
        $this->resetErrorBag();

    } 
    public function render()
    {
        return view('livewire.scenarios.scenario-edit-form');
    }
}
