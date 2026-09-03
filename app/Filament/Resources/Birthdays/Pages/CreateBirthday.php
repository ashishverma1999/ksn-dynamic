<?php

namespace App\Filament\Resources\Birthdays\Pages;

use App\Filament\Resources\Birthdays\BirthdayResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBirthday extends CreateRecord
{
    protected static string $resource = BirthdayResource::class;
}
