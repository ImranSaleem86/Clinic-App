<?php

namespace App\Filament\Resources\Doctors\Schemas;

use App\Models\DoctorSpecialty;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DoctorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                ->label('User')
                ->options(User::pluck('name', 'id'))
                ->default(auth()->user()->id)
                ->searchable()
                ->required(),

                // Select::make('user_id')
                //     ->relationship('user', 'name')
                //     ->default(auth()->user()->id)
                //     ->preload()
                //     ->searchable()
                //     ->required()
                //     ->dehydrated(true),

                Select::make('specialty_id')
                    ->label('Specialty')
                    ->options(DoctorSpecialty::pluck('name', 'id'))
                    ->required(),

                TextInput::make('experience')->label('Experience (e.g. 10 years)'),

                Textarea::make('about')->label('About Doctor'),

                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->default('active')
                    ->required(),
            ]);
    }
}
