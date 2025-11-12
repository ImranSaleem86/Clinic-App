<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;
use App\Models\Doctor;
use App\Models\User;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'appointment_date',
        'appointment_time',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    protected static function booted()
    {
        static::creating(function ($appointment) {
        $exists = Appointment::where('doctor_id', $appointment->doctor_id)
            ->whereDate('appointment_date', $appointment->appointment_date)
            ->where('appointment_time', $appointment->appointment_time)
            ->exists();

        if ($exists) {
            throw new Exception('This slot is already taken.');
        }
    });
    }

}
