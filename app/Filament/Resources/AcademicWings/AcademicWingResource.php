<?php

namespace App\Filament\Resources\AcademicWings;

use App\Filament\Resources\AcademicWings\Pages\CreateAcademicWing;
use App\Filament\Resources\AcademicWings\Pages\EditAcademicWing;
use App\Filament\Resources\AcademicWings\Pages\ListAcademicWings;
use App\Filament\Resources\AcademicWings\Schemas\AcademicWingForm;
use App\Filament\Resources\AcademicWings\Tables\AcademicWingsTable;
use App\Models\AcademicWing;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AcademicWingResource extends Resource
{
    protected static ?string $model = AcademicWing::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static string|UnitEnum|null $navigationGroup = 'School Infrastructure & Wings';

    protected static ?string $navigationLabel = 'Academic Wings (Pre–12th)';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return AcademicWingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademicWingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAcademicWings::route('/'),
            'create' => CreateAcademicWing::route('/create'),
            'edit' => EditAcademicWing::route('/{record}/edit'),
        ];
    }
}
