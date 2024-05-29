<?php

namespace App\Livewire\AnswersConfig;

use App\Models\Exercise;
use App\Models\Answer;
use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;

class AnswersList extends Component
{
    use WithFileUploads;
    public $rows = [];
    public $name;
    public $description;

    public function addRow()
    {
        $this->rows[] = [
            'answer' => '',
            'file1' => null,
            'file2' => null,
            'radio' => false,
        ];
    }

    public function removeRow($index)
    {
        unset($this->rows[$index]);
        $this->rows = array_values($this->rows);
    }
    public function add_exercise()
    {
        // Валидация данных
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $name = $this->name;
        $description = $this->description;
        $data = Exercise::Create([
            'name' => $name,
            'description' => $description,
        ]);
        foreach ($this->rows as $row) {
            $answer = new Answer();
            $answer->answer = $row['answer'];
            if ($row['file1']) {
                // $file = $row['file1']->file('answer_picture');
                $filename = $row['file1']->getClientOriginalName();
                $row['file1']->store('answer_exercises/answers/pictures');
                $answer->picture_path = $filename;
            }
            if ($row['file2']) {
                $filename = $row['file2']->getClientOriginalName();
                $row['file2']->store('answer_exercises/answers/audio');
                $answer->picture_path = $filename;
            }
            $answer->is_correct = filter_var($row['radio'], FILTER_VALIDATE_BOOLEAN);
            $answer->exercise_id = $data->id;
            $answer->save();
            $this->render();
        }
    }

    public function render()
    {
        return view('livewire.answers-config.answers-list');
    }
}
