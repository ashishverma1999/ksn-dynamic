<?php

namespace App\Filament\Resources\Birthdays\Pages;

use App\Filament\Resources\Birthdays\BirthdayResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBirthdays extends ListRecords
{
    protected static string $resource = BirthdayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
