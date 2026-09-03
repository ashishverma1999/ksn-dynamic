<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gallery details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Select::make('category')
                            ->options([
                                'Campus' => 'Campus',
                                'Academics' => 'Academics',
                                'Activities' => 'Activities',
                                'Facilities' => 'Facilities',
                                'Events' => 'Events',
                            ])
                            ->required(),
                        FileUpload::make('image')
                            ->image()
                            ->directory('gallery')
                            ->imageEditor()
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull(),
                        DatePicker::make('published_at')
                            ->default(now()),
                        Toggle::make('is_featured')
                            ->label('Featured'),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ]),
            ]);
    }
}
