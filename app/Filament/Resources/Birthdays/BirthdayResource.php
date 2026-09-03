<?php

namespace App\Filament\Resources\Birthdays;

use App\Filament\Resources\Birthdays\Pages\CreateBirthday;
use App\Filament\Resources\Birthdays\Pages\EditBirthday;
use App\Filament\Resources\Birthdays\Pages\ListBirthdays;
use App\Filament\Resources\Birthdays\Schemas\BirthdayForm;
use App\Filament\Resources\Birthdays\Tables\BirthdaysTable;
use App\Models\Birthday;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BirthdayResource extends Resource
{
    protected static ?string $model = Birthday::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static string|UnitEnum|null $navigationGroup = 'School Life & Celebrations';

    protected static ?string $navigationLabel = 'Birthdays & Stars';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BirthdayForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BirthdaysTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBirthdays::route('/'),
            'create' => CreateBirthday::route('/create'),
            'edit' => EditBirthday::route('/{record}/edit'),
        ];
    }
}
