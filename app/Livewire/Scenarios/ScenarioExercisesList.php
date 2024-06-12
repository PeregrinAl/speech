<?php

namespace App\Livewire\Scenarios;

use App\Models\ExerciseScenario;
use Livewire\Component;
use App\Models\Scenario;
use Livewire\Attributes\On;

class ScenarioExercisesList extends Component
{
    public $scenario;
    public function mount($scenario_id) {
        $this->scenario = Scenario::find($scenario_id);
    }
    public function delete_exercise_from_scenario($exercise_id) {
        $data = ExerciseScenario::where('id', $exercise_id)->delete();
        $this->render();
    }
    public function updateOrder(array $order)
    {
        //dd($order);
        ExerciseScenario::setNewOrder($order, 0, 'id');
        $this->render();
    }
    #[On('exercises_list_updated')]
    public function render()
    {
        return view('livewire.scenarios.scenario-exercises-list', [
            'exercises' => $this->scenario->scenario_exercises()->ordered()->get()
        ]);
    }
}
