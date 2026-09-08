<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Facility Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Facility Name')
                            ->required()
                            ->maxLength(255),
                        Select::make('icon')
                            ->label('Icon Category')
                            ->options([
                                'classroom' => 'Classroom / Smart Board',
                                'medical' => 'Science Labs (Physics/Chem/Bio)',
                                'computer' => 'Computer / IT Lab',
                                'library' => 'Library & Reading Zone',
                                'sports' => 'Sports & Playground',
                                'bus' => 'Transport / School Van',
                                'shield' => 'Safety & Security (CCTV)',
                                'stage' => 'Auditorium & Stage',
                            ])
                            ->default('classroom')
                            ->required(),
                        TextInput::make('sort_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0),
                        FileUpload::make('image')
                            ->label('Facility Photo (Optional)')
                            ->image()
                            ->disk('public')
                            ->directory('facilities')
                            ->visibility('public')
                            ->imageEditor()
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Facility Description')
                            ->rows(3)
                            ->required()
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Display on Website')
                            ->default(true),
                    ]),
            ]);
    }
}
