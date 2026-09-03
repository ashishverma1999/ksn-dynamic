<?php

namespace App\Filament\Resources\AdmissionEnquiries;

use App\Filament\Resources\AdmissionEnquiries\Pages\EditAdmissionEnquiry;
use App\Filament\Resources\AdmissionEnquiries\Pages\ListAdmissionEnquiries;
use App\Filament\Resources\AdmissionEnquiries\Pages\ViewAdmissionEnquiry;
use App\Filament\Resources\AdmissionEnquiries\Schemas\AdmissionEnquiryForm;
use App\Filament\Resources\AdmissionEnquiries\Schemas\AdmissionEnquiryInfolist;
use App\Filament\Resources\AdmissionEnquiries\Tables\AdmissionEnquiriesTable;
use App\Models\AdmissionEnquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AdmissionEnquiryResource extends Resource
{
    protected static ?string $model = AdmissionEnquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInbox;

    protected static ?string $recordTitleAttribute = 'student_name';

    protected static ?string $navigationLabel = 'Admission Enquiries';

    public static function form(Schema $schema): Schema
    {
        return AdmissionEnquiryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AdmissionEnquiryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdmissionEnquiriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAdmissionEnquiries::route('/'),
            'view' => ViewAdmissionEnquiry::route('/{record}'),
            'edit' => EditAdmissionEnquiry::route('/{record}/edit'),
        ];
    }
}
