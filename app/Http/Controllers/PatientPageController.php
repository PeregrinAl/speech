<?php

namespace App\Http\Controllers;

use App\Models\User;
class PatientPageController extends Controller
{
    public function show($id)
    {
        $patient = User::find($id);
        return view('patient-page', compact('patient'));
    }
}