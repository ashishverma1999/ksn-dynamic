<?php

namespace App\Filament\Resources\AdmissionEnquiries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AdmissionEnquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('student_name'),
                TextEntry::make('guardian_name'),
                TextEntry::make('phone'),
                TextEntry::make('email'),
                TextEntry::make('class_applied')->badge(),
                TextEntry::make('student_age'),
                TextEntry::make('preferred_visit_date')->date(),
                TextEntry::make('status')->badge(),
                TextEntry::make('source')->badge(),
                TextEntry::make('message')->columnSpanFull(),
                TextEntry::make('created_at')->dateTime(),
                TextEntry::make('read_at')->dateTime(),
            ]);
    }
}
