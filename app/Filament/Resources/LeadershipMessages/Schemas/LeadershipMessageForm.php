<?php

namespace App\Filament\Resources\LeadershipMessages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LeadershipMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Leadership Message')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Card Heading (e.g. Chairman\'s Message, Principal\'s Message)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('name')
                            ->label('Full Name & Title')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('role')
                            ->label('School Role (e.g. Chairman, KSNPS)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('sort_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0),
                        TextInput::make('designation')
                            ->label('Qualifications & Background')
                            ->placeholder('e.g. M.Sc Gold Medalist | D.Phil | Experienced Educator')
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->label('Profile Photo')
                            ->image()
                            ->directory('leadership')
                            ->imageEditor()
                            ->columnSpanFull(),
                        Textarea::make('message')
                            ->label('Message Content')
                            ->rows(5)
                            ->required()
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Display on Website')
                            ->default(true),
                    ]),
            ]);
    }
}
