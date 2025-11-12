<?php

namespace App\Filament\Resources\DoctorSpecialties\Pages;

use App\Filament\Resources\DoctorSpecialties\DoctorSpecialtyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDoctorSpecialties extends ListRecords
{
    protected static string $resource = DoctorSpecialtyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
