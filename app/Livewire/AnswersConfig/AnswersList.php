<?php

namespace App\Livewire\AnswersConfig;

use App\Models\Exercise;
use App\Models\Answer;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ExerciseType;
use Auth;

class AnswersList extends Component
{
    use WithFileUploads;
    public $rows = [];
    public $name;
    public $description;
    public $task_voiceover_file = '';

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
        // $this->rows = array_values($this->rows);
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
        $this->task_voiceover_file = $this->task_voiceover_file->store('public');
        

        $data = Exercise::Create([
            'name' => $name,
            'description' => $description,
            'exercise_type_id' => ExerciseType::where('name', 'Тестирование')->first()->id,
            'task_voiceover_path' => $this->task_voiceover_file,
        ]);

        foreach ($this->rows as $row) {
            $answer = new Answer();

            $answer->answer = $row['answer'];
            if ($row['file1']) {
                $picture_file = $row['file1']->store('public');

                $answer->picture_path = $picture_file;
            }
            if ($row['file2']) {
                $audio_file = $row['file2']->store('public');

                $answer->audio_path = $audio_file;
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
