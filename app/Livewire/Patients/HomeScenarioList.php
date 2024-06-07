<?php

namespace App\Livewire\Patients;

use App\Models\Home_scenario;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Auth;

class HomeScenarioList extends Component
{
    public $user_id;
    public $patient_id;

    protected $listeners = ['home_scenario_list_updated' => 'update'];

    public function update() {
        $this->render();
    }
    public function delete($deleting_id) {
       //  dd(Home_scenario::where('scenario_id', $deleting_id)->where('patient_id', $this->patient_id)->first());

        Home_scenario::where('scenario_id', $deleting_id)->where('patient_id', $this->patient_id)->first()->delete();
        $this->dispatch('home_scenarios_list_updated');

    } 
    public function edit_scenario($editing_id) {
        $this->dispatch('edit_scenario', $editing_id);
    } 
    #[On('home_scenario_list_updated')] 
    public function render()
    {
        $patient_id = $this->patient_id;
        // dd($patient_id);
        $scenarios = User::where('id', $patient_id)->first()->home_scenarios;
        
        return view('livewire.patients.home-scenario-list', compact('scenarios'));
    }
}
