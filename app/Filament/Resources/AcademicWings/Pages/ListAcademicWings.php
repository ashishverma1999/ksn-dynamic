<?php

namespace App\Filament\Resources\AcademicWings\Pages;

use App\Filament\Resources\AcademicWings\AcademicWingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAcademicWings extends ListRecords
{
    protected static string $resource = AcademicWingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
