<?php

namespace App\Http\Controllers;

use App\Models\Scenario;
class ScenarioConfigController extends Controller
{
    public function show($id)
    {
        $scenario = Scenario::find($id);
        return view('scenario-config', compact('scenario'));
    }
}