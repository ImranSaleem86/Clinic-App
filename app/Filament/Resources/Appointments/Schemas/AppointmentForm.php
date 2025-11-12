<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;
use App\Models\Doctor;
use App\Models\DoctorSpecialty;

class AppointmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('specialty_id')
            ->label('Specialty')
            ->options(DoctorSpecialty::pluck('name', 'id'))
            ->reactive(),

        Select::make('doctor_id')
            ->label('Doctor')
            ->options(function (callable $get) {
                $specialtyId = $get('specialty_id');
                if ($specialtyId) {
                    return Doctor::where('specialty_id', $specialtyId)
                        ->with('user')
                        ->get()
                        ->pluck('user.name', 'id');
                }
                return [];
            })
            ->reactive()
            ->required(),

        DatePicker::make('appointment_date')
            ->label('Date')
            ->minDate(now())
            ->reactive()
            ->required(),

        Select::make('appointment_time')
            ->label('Available Time Slots')
            ->options(function (callable $get) {
                $doctorId = $get('doctor_id');
                $date = $get('appointment_date');
                if (! $doctorId || ! $date) return [];

                $doctor = Doctor::find($doctorId);
                if (! $doctor) return [];

                $schedules = $doctor->schedules()
                    ->where('day_of_week', \Carbon\Carbon::parse($date)->format('l'))
                    ->get();

                $available = [];
                foreach ($schedules as $schedule) {
                    $available = array_merge(
                        $available,
                        $schedule->getAvailableSlotsForDate($date)
                    );
                }

                return collect($available)
                    ->mapWithKeys(fn($slot) => [$slot => \Carbon\Carbon::parse($slot)->format('g:i A')])
                    ->toArray();

            })
            ->required()
            ->reactive(),

        Select::make('status')
            ->options([
                'pending' => 'Pending',
                'confirmed' => 'Confirmed',
                'rejected' => 'Rejected',
                'completed' => 'Completed',
            ])
            ->default('pending')
            // ->visible(fn() => auth()->user()->hasAnyRole(['doctor', 'admin'])),
            ]);
    }
}
