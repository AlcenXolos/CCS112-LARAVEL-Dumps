<?php

namespace Database\Seeders;

use App\Models\patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        patient::create([
            'patient_id'=>'1',
            'patient_name'=>'Kendrick',
            'email_address' => 'KLamar@gmail.com',
            'age' => '32'
        ]);
    }
}
