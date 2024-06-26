<?php

namespace App\Livewire\Exercises\Answers;

use Livewire\Component;
use App\Models\Exercise;
use App\Models\Answer;

class AnswersList extends Component
{
    public $user_id;
    public $exercise_id;

    // protected $listeners = ['home_scenario_list_updated' => 'update'];

    public function update() {
        $this->render();
    }

    public function render()
    {
        $exercise_id = $this->exercise_id;

        $answers = Answer::where('exercise_id', $exercise_id)->get();
        // dd($answers);
        return view('livewire.exercises.answers.answers-list', compact('answers'));
    }
}
