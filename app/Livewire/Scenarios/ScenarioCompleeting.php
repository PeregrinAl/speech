<?php

namespace App\Livewire\Scenarios;

use Livewire\Component;

class ScenarioCompleeting extends Component
{
    public $patient_id;
    public $scenario_id;
    
    public function render()
    {
        return view('livewire.scenarios.scenario-compleeting');
    }
}
