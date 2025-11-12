<?php

namespace App\Filament\Resources\DoctorSchedules\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DoctorScheduleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('doctor_id')
                    ->numeric(),
                TextEntry::make('day_of_week'),
                TextEntry::make('start_time')
                    ->time(),
                TextEntry::make('end_time')
                    ->time(),
                TextEntry::make('slot_duration')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
