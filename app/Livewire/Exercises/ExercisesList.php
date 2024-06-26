<?php

namespace App\Livewire\Exercises;

use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Exercise;
use Livewire\Component;
use App\Models\ExerciseScenario;
use DB;

class ExercisesList extends Component
{
    use WithPagination;
    public $search;
    public $perPage = 10;
    public $exercises;
    public $scenario_id;

    public function mount($scenario_id = null)
    {
        $this->exercises = Exercise::all();
        $this->scenario_id = $scenario_id; // lock
    }

    private function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Exercise ? $items : Exercise::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function updatedSearch($val)
    {
        $this->performSearch();
    }

    public function performSearch()
    {
        // Логика выполнения поиска

        // Пример: получение результатов поиска из базы данных
        $this->exercises = Exercise::where('name', 'like', '%' . $this->search . '%')
            ->get();

        // Действия с результатами поиска
    }


    public function add_into_scenario($exercise_id)
    {
        ExerciseScenario::Create(
            [
                'scenario_id' => $this->scenario_id,
                'exercise_id' => $exercise_id,
            ],
        );
        $this->dispatch('exercises_list_updated');
    }
    public function render()
    {
        return view('livewire.exercises.exercises-list', [

            'exercises' => $this->exercises

        ]);
    }
}
