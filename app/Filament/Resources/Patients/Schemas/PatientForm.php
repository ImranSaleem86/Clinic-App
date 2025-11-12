<?php

namespace App\Filament\Resources\Patients\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PatientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Name')
                    ->default(auth()->user()->id)
                    ->disabled(),
                TextInput::make('phone')
                    ->required()
                    ->numeric(),
                Textarea::make('address'),
                DatePicker::make('dob')
                    ->required()
                    ->date(),
            ]);
    }
}
