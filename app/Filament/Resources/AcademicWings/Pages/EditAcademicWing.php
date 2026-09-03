<?php

namespace App\Filament\Resources\AcademicWings\Pages;

use App\Filament\Resources\AcademicWings\AcademicWingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAcademicWing extends EditRecord
{
    protected static string $resource = AcademicWingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
