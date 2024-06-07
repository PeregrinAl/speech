<?php

namespace App\Livewire\Scenarios;

use App\Models\User;
use Livewire\Component;
use App\Models\Scenario;
use Auth;

class ScenarioList extends Component
{
    public $user_id;
    

    protected $listeners = ['scenario_list_updated' => 'update'];

    public function update() {
        $this->render();
    }
    public function delete($deleting_id) {

        Scenario::where('specialist_id', Auth::id())->where('id',$deleting_id)->delete();

        $this->dispatch('scenarios_list_updated');

    } 
    public function edit_scenario($editing_id) {

        $this->dispatch('edit_scenario', $editing_id);

    } 

    public function render()
    {
        $userId = Auth::id();
        $scenarios = User::where('id', $userId)->first()->scenarios;
        
        return view('livewire.scenarios.scenario-list', compact('scenarios'));
    }
}

