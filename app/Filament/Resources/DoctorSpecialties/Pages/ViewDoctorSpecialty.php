<?php

namespace App\Filament\Resources\DoctorSpecialties\Pages;

use App\Filament\Resources\DoctorSpecialties\DoctorSpecialtyResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDoctorSpecialty extends ViewRecord
{
    protected static string $resource = DoctorSpecialtyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
