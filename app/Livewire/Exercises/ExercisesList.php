<?php

namespace App\Livewire\Exercises;

use App\Models\Exercise;
use Livewire\Component;

class ExercisesList extends Component
{
    public function render()
    {
        $exercises = Exercise::all();
        // dd($exercises);

        return view('livewire.exercises.exercises-list', compact('exercises'));
    }
}
