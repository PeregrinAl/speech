<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Exception;
class AudioController extends Controller
{
    public function get_audio($filePath)
    {
        try {
            $file = file_exists($filePath);
        } catch (Exception $e) {
            return \Redirect::back()->withErrors(["File doesn't exist"]);
        }
        return response()->file($filePath);
    }
}