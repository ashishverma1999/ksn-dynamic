<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Testimonial Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Reviewer Name (Parent / Student / Alumni)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('role')
                            ->label('Role / Designation')
                            ->placeholder('e.g. Parent of Class X Student')
                            ->required()
                            ->maxLength(255),
                        Select::make('rating')
                            ->label('Star Rating')
                            ->options([
                                5 => '★★★★★ (5 Stars)',
                                4 => '★★★★☆ (4 Stars)',
                                3 => '★★★☆☆ (3 Stars)',
                                2 => '★★☆☆☆ (2 Stars)',
                                1 => '★☆☆☆☆ (1 Star)',
                            ])
                            ->default(5)
                            ->required(),
                        TextInput::make('sort_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0),
                        FileUpload::make('image')
                            ->label('Parent / Student Photo (Optional)')
                            ->image()
                            ->disk('public')
                            ->directory('testimonials')
                            ->visibility('public')
                            ->imageEditor()
                            ->columnSpanFull(),
                        Textarea::make('quote')
                            ->label('Review / Feedback Quote')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),
                        Toggle::make('is_featured')
                            ->label('Featured Review')
                            ->default(true),
                        Toggle::make('is_active')
                            ->label('Active on Website')
                            ->default(true),
                    ]),
            ]);
    }
}
