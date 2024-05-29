<?php

namespace App\Livewire\Exercises;

use App\Models\Exercise;
use Livewire\Component;
use DB;
class ExercisesList extends Component
{
    public $search;
    public $perPage = 10;
    public $exercises;

    public function mount(Exercise $exercise) {
        $this->exercises = Exercise::all();
    }
    public function performSearch()
    {
        // Логика выполнения поиска

        // Пример: получение результатов поиска из базы данных
        $this->exercises = Exercise::where('name', 'like', '%'.$this->search.'%')
            ->get();
 
        // Действия с результатами поиска
    }
    public function render()
    {
        return view('livewire.exercises.exercises-list', [

            'exercises' => $this->exercises,

        ]);
    }
}
