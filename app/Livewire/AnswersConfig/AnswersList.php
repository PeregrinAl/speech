<?php

namespace App\Livewire\AnswersConfig;

use App\Models\Exercise;
use Livewire\Component;
use Auth;

class AnswersList extends Component
{
    public $rows = [];
    public $name;
    public $description;

    public function addRow()
    {
        $this->rows[] = [
            'text' => '',
            'file1' => null,
            'file2' => null,
            'radio' => '',
        ];
    }

    public function removeRow($index)
    {
        unset($this->rows[$index]);
        $this->rows = array_values($this->rows);
    }
    public function add_exercise() {
        $name = $this->name;
        $description = $this->description;
        $answers = $this->answers;
        $data = Exercise::firstOrCreate([
            'name' => $name,
            'description' => $description,
        ],
        []
        );
    }
    public function render()
    {
        return view('livewire.answers-config.answers-list');
    }
}
