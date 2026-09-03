<?php

namespace App\Filament\Resources\SchoolSettings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SchoolSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Setting Value')
                    ->columns(2)
                    ->schema([
                        TextInput::make('key')
                            ->label('Configuration Key')
                            ->placeholder('e.g. school_name, phone, whatsapp, tagline, stat_students')
                            ->required()
                            ->maxLength(255),
                        Select::make('group')
                            ->label('Group')
                            ->options([
                                'general' => 'General / School Identity',
                                'contact' => 'Contact & Timings',
                                'stats' => 'Campus Stats & Numbers',
                                'assets' => 'Images & Media Links',
                            ])
                            ->default('general')
                            ->required(),
                        Textarea::make('value')
                            ->label('Value / Content')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
