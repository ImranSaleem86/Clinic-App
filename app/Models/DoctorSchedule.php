<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\Doctor;

class DoctorSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'day_of_week',
        'start_time',
        'end_time',
        'slot_duration',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Generate available time slots for a specific date.
     */
    public function getAvailableSlotsForDate($date)
    {
        $dayOfWeek = Carbon::parse($date)->format('l');

        if ($dayOfWeek !== $this->day_of_week) {
            return [];
        }

        $slots = [];
        $start = Carbon::parse($this->start_time);
        $end = Carbon::parse($this->end_time);
        $duration = $this->slot_duration;

        while ($start->lt($end)) {
            $slotTime = $start->format('H:i');
            $slots[] = $slotTime;
            $start->addMinutes($duration);
        }

        // Filter out taken slots
        $taken = Appointment::where('doctor_id', $this->doctor_id)
            ->whereDate('appointment_date', $date)
            ->pluck('appointment_time')
            ->toArray();

        return array_values(array_diff($slots, $taken));
    }
}
