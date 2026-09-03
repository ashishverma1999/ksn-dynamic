<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('FAQ Details')
                    ->columns(2)
                    ->schema([
                        Select::make('category')
                            ->label('Category')
                            ->options([
                                'Admissions' => 'Admissions & Documents',
                                'Academics' => 'Academics & Streams',
                                'Facilities' => 'Facilities & Labs',
                                'Transport' => 'Transport & Routes',
                                'General' => 'General Information',
                            ])
                            ->default('General')
                            ->required(),
                        TextInput::make('sort_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0),
                        TextInput::make('question')
                            ->label('Question')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('answer')
                            ->label('Detailed Answer')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Display on Website')
                            ->default(true),
                    ]),
            ]);
    }
}
