<?php

namespace App\Livewire\Scenarios;

use App\Models\Exercise;
use App\Models\Scenario;
use Livewire\Component;

class ScenarioCompleetingList extends Component
{
    public $scenario;

    public function mount($scenario_id = null)
    {
        $this->scenario = Scenario::find($scenario_id); // lock
    }

    public function render()
    {
        return view('livewire.scenarios.scenario-compleeting-list', [

            'exercises' =>  $this->scenario->scenario_exercises()->ordered()->get()

        ]);
    }
}
