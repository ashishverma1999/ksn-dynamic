<?php

namespace App\Filament\Resources\Birthdays\Pages;

use App\Filament\Resources\Birthdays\BirthdayResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBirthday extends EditRecord
{
    protected static string $resource = BirthdayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
