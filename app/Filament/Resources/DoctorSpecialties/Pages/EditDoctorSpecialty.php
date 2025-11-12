<?php

namespace App\Filament\Resources\DoctorSpecialties\Pages;

use App\Filament\Resources\DoctorSpecialties\DoctorSpecialtyResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDoctorSpecialty extends EditRecord
{
    protected static string $resource = DoctorSpecialtyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
