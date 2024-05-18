<?php

namespace App\Livewire\Exercises;

use Livewire\Component;

class ExercisesForm extends Component
{
    public $showModal = false;

    public function open_modal() {

        $this->reset(); 
        $this->resetErrorBag();

        $this->showModal = true;
    } 

    public function cancel() {

        $this->reset(); 
        $this->resetErrorBag();

    } 
    
    public function render()
    {
        return view('livewire.exercises.exercises-form');
    }
}
