<?php

namespace App\Filament\Resources\DoctorSpecialties;

use App\Filament\Resources\DoctorSpecialties\Pages\CreateDoctorSpecialty;
use App\Filament\Resources\DoctorSpecialties\Pages\EditDoctorSpecialty;
use App\Filament\Resources\DoctorSpecialties\Pages\ListDoctorSpecialties;
use App\Filament\Resources\DoctorSpecialties\Pages\ViewDoctorSpecialty;
use App\Filament\Resources\DoctorSpecialties\Schemas\DoctorSpecialtyForm;
use App\Filament\Resources\DoctorSpecialties\Schemas\DoctorSpecialtyInfolist;
use App\Filament\Resources\DoctorSpecialties\Tables\DoctorSpecialtiesTable;
use App\Models\DoctorSpecialty;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DoctorSpecialtyResource extends Resource
{
    protected static ?string $model = DoctorSpecialty::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Doctor Specialization';

    public static function form(Schema $schema): Schema
    {
        return DoctorSpecialtyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DoctorSpecialtyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DoctorSpecialtiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDoctorSpecialties::route('/'),
            'create' => CreateDoctorSpecialty::route('/create'),
            'view' => ViewDoctorSpecialty::route('/{record}'),
            'edit' => EditDoctorSpecialty::route('/{record}/edit'),
        ];
    }
}
