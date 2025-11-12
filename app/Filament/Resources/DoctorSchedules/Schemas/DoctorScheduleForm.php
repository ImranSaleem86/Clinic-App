<?php

namespace App\Filament\Resources\DoctorSchedules\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class DoctorScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Select::make('doctor_id')
                // ->label('Doctor')
                // // ->options(function () {
                // //     $user = auth()->user();
                // //     if ($user->hasRole('doctor')) {
                // //         return Doctor::where('user_id', $user->id)->pluck('user.name', 'id');
                // //     }
                // //     return Doctor::pluck('user.name', 'id');
                // // })
                // // ->default(fn() => auth()->user()->hasRole('doctor') ? auth()->user()->doctor->id ?? null : null)
                // // ->disabled(fn() => auth()->user()->hasRole('doctor'))
                // ->relationship(
                //         name: 'doctor',
                //         titleAttribute: 'user.name',
                //         modifyQueryUsing: fn (\Illuminate\Database\Eloquent\Builder $query) => $query->where('user_id', auth()->id())
                //     )
                // ->searchable()
                // ->preload()
                // ->required(),
                Select::make('doctor_id')
                ->label('Doctor')
                ->relationship(
                    name: 'doctor',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn ($query) => $query
                        ->join('users', 'doctors.user_id', '=', 'users.id')
                        ->select('doctors.*', 'users.name')
                        ->where('doctors.user_id', auth()->id())
                )
                ->getOptionLabelFromRecordUsing(fn ($record) => $record->user->name)
                ->searchable()
                ->preload()
                ->required(),

            Select::make('day_of_week')
                ->options([
                    'Monday' => 'Monday',
                    'Tuesday' => 'Tuesday',
                    'Wednesday' => 'Wednesday',
                    'Thursday' => 'Thursday',
                    'Friday' => 'Friday',
                    'Saturday' => 'Saturday',
                    'Sunday' => 'Sunday',
                ])
                ->required(),

            TimePicker::make('start_time')->required(),
            TimePicker::make('end_time')->required(),
            TextInput::make('slot_duration')->numeric()->default(30),
        ]);
    }
}
