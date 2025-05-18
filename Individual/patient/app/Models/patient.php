<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Validator;
class patient extends Model
{
    use HasFactory;

    protected $table = 'patient';

    protected $fillable = [
        'patient_id',
        'patient_name',
        'email_address',
        'age',
    ];

    // Validation rules
    public static $rules = [
        'patient_id' => 'unique:patient,patient_id', 
        'patient_name' => 'required|string|max:255', 
        'email_address' => 'required|email|unique:patient,email_address', 
        'age' => 'required|integer|min:0', 
    ];

    // Apply the validation rules
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $validator = Validator::make($model->attributes, static::$rules);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
        });
    }
}
