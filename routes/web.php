<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/403', function () {
        return view('403');
    })->name('403');

Route::get('/404', function () {
        return view('404');
    })->name('404');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    
    
    Route::get('/mainpage', function () {
        return view('mainpage');
    })->name('mainpage');

    Route::get('/patients', function () {
        return view('patients');
    })->name('patients')->middleware('role:specialist');
    
    Route::get('/scenarios', function () {
        return view('scenarios');
    })->name('scenarios')->middleware('role:specialist');

    Route::get('/exercises', function () {
        return view('exercises');
    })->name('exercises')->middleware('role:specialist');


    //например!
    Route::get('/doctor-cabinet/home', function () {
        return view('doctor-cabinet');
    })->name('doctor-cabinet')->middleware('role:doctor,superdoctor,supersuperdoctor');


    Route::get('/patient-cabinet/home', function () {
        return view('patient-cabinet');
    })->name('patient-cabinet')->middleware('role:patient');


















});
