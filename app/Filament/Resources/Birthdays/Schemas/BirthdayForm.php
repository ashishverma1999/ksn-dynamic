<?php

namespace App\Filament\Resources\Birthdays\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BirthdayForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Celebrant Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Name of Student / Teacher')
                            ->required()
                            ->maxLength(255),
                        Select::make('type')
                            ->label('Category')
                            ->options([
                                'Student' => 'Student',
                                'Teacher' => 'Teacher / Faculty',
                                'Staff' => 'Staff Member',
                                'Star Student' => 'Star of the Month',
                            ])
                            ->default('Student')
                            ->required(),
                        TextInput::make('class_or_role')
                            ->label('Class / Subject / Role')
                            ->placeholder('e.g. Class V - A or PGT Mathematics')
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('birth_date')
                            ->label('Date of Birth')
                            ->default(now()),
                        TextInput::make('badge')
                            ->label('Special Badge / Title')
                            ->placeholder('e.g. Birthday Star, Class Topper, Star of the Week')
                            ->default('Birthday Star')
                            ->maxLength(100),
                        TextInput::make('sort_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0),
                        FileUpload::make('image')
                            ->label('Photo / Avatar')
                            ->image()
                            ->directory('birthdays')
                            ->imageEditor()
                            ->columnSpanFull(),
                        Textarea::make('wishes')
                            ->label('Birthday Message / Congratulations Wishes')
                            ->placeholder('e.g. Wishing you joy, success and brilliant achievements this year! 🎉')
                            ->rows(3)
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Display on Website')
                            ->default(true),
                    ]),
            ]);
    }
}
