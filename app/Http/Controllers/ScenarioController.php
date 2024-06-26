<?php

namespace App\Http\Controllers;

use App\Models\ExerciseScenario;
use Illuminate\Http\Request;
use App\Models\Scenario;

class ScenarioController extends Controller
{

    public function show($id)
    {
        $scenario = Scenario::find($id);
        return view('livewire.scenarios.scenario-compleeting', compact('scenario'));
    }
}