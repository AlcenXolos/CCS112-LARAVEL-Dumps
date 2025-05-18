<?php

use App\Http\Controllers\PatientController;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('patients')->group(function () {

    Route::post('/addPatient', [PatientController::class, 'registerPatient']);
    Route::get('/', [PatientController::class, 'patientList']);
    Route::put('/updatePatient/{patient_id}', [PatientController::class, 'updatePatient']);
    Route::delete('/{patient_id}', [PatientController::class, 'removePatient']);
});