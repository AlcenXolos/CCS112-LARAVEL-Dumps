<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function registerPatient(Request $request){
        $newPatient = new patient();
        // $newPatient->id = $request->id;
        $newPatient->patient_name = $request->patient_name;
        $newPatient->email_address = $request->email_address;
        $newPatient->age = $request->age;
        $newPatient->save();
        return response()->json(['status' => 201, 'message' => 'patient added successfully']);
    }

    public function patientList(Request $request){
        $patients = new patient();
        $patientLists = $patients->all();
        return response()->json(['status' => 200, 'data' => $patientLists]);
    }

    public function updatePatient(Request $request, $patient_id)
{
    $patientInfo = patient::find($patient_id);
    if ($patientInfo) {
        // $patientInfo->id = $request->input('id');
        $patientInfo->patient_name = $request->input('patient_name');
        $patientInfo->email_address = $request->input('email_address');
        $patientInfo->age = $request->input('age');
        $patientInfo->save();

        return response()->json(['status' => 200, 'message' => 'Patient updated successfully']);
    } else {
        return response()->json(['status' => 404, 'message' => 'Patient not found']);
    }
}


    public function removePatient($patientId){
        
        $product = patient::find($patientId);
        
        if (!$product) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        
        $product->delete();
        
        return response()->json(['message' => 'Patient removed']);
    }

}
