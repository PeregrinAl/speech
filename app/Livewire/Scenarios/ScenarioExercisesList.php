<?php

namespace App\Livewire\Scenarios;

use Livewire\Component;
use App\Models\Scenario;
use Livewire\Attributes\On;

class ScenarioExercisesList extends Component
{
    public $scenario;
    public function mount($scenario_id) {
        $this->scenario = Scenario::find($scenario_id);
    }
    
    #[On('exercises_list_updated')]
    public function render()
    {
        
        return view('livewire.scenarios.scenario-exercises-list');
    }
}
