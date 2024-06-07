<?php

namespace App\Livewire\Exercises;

use App\Models\Exercise;
use Livewire\Component;
use App\Models\ExerciseScenario;
use DB;
class ExercisesList extends Component
{
    public $search;
    public $perPage = 10;
    public $exercises;
    public $scenario_id;

    public function mount($scenario_id = null) {
        $this->exercises = Exercise::all();
        $this->scenario_id = $scenario_id; // lock
    }


    public function updatedSearch($val) {
        $this->performSearch();
    }

    public function performSearch()
    {
        // Логика выполнения поиска

        // Пример: получение результатов поиска из базы данных
        $this->exercises = Exercise::where('name', 'like', '%'.$this->search.'%')
            ->get();
 
        // Действия с результатами поиска
    }

    
    public function add_into_scenario($exercise_id) {
        ExerciseScenario::firstOrCreate([
            'scenario_id' => $this->scenario_id,
            'exercise_id' => $exercise_id,
        ],
        []
        );
        $this->dispatch('exercises_list_updated');
    }
    public function render()
    {
        return view('livewire.exercises.exercises-list', [

            'exercises' => $this->exercises,

        ]);
    }
}
