<?php

namespace App\Filament\Resources\Notices\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NoticeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Notice Details')
                    ->columns(2)
                    ->schema([
                        Select::make('badge')
                            ->label('Category / Badge')
                            ->options([
                                'Admissions' => 'Admissions',
                                'Academic' => 'Academic',
                                'Facilities' => 'Facilities',
                                'Transport' => 'Transport',
                                'Events' => 'Events',
                                'Examination' => 'Examination',
                            ])
                            ->default('Admissions')
                            ->required(),
                        DatePicker::make('notice_date')
                            ->label('Notice Date')
                            ->default(now()),
                        TextInput::make('link_url')
                            ->label('Action Link / Target URL (Optional)')
                            ->placeholder('#admissions or full URL')
                            ->maxLength(255),
                        TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0),
                        Textarea::make('title')
                            ->label('Notice / Announcement Headline')
                            ->rows(3)
                            ->required()
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Active on Website Ticker')
                            ->default(true),
                    ]),
            ]);
    }
}
