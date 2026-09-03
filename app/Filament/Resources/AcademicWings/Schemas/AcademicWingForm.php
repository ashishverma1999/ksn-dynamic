<?php

namespace App\Filament\Resources\AcademicWings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AcademicWingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Academic Wing Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Wing Title (e.g. Primary School Wing)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('classes')
                            ->label('Class Range (e.g. Classes I to V)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('tag')
                            ->label('Age Bracket (e.g. Ages 6 – 10 Years)')
                            ->maxLength(100),
                        Select::make('badge_color')
                            ->label('Badge Theme Color')
                            ->options([
                                'amber' => 'Amber (Pre-Primary)',
                                'blue' => 'Blue (Primary)',
                                'emerald' => 'Emerald (Middle)',
                                'indigo' => 'Indigo (Secondary)',
                                'rose' => 'Rose (Senior Secondary)',
                            ])
                            ->default('blue')
                            ->required(),
                        TextInput::make('sort_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0),
                        Textarea::make('description')
                            ->label('Curriculum & Wing Overview')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),
                        TagsInput::make('highlights')
                            ->label('Key Features / Bullet Points')
                            ->placeholder('Type a highlight and press Enter')
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Display on Website')
                            ->default(true),
                    ]),
            ]);
    }
}
