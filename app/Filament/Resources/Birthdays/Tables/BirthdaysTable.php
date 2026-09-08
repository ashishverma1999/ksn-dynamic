<?php

namespace App\Filament\Resources\Birthdays\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BirthdaysTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Photo')
                    ->circular()
                    ->defaultImageUrl('/images/classroom1.jpeg'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Teacher' => 'warning',
                        'Star Student' => 'success',
                        'Staff' => 'info',
                        default => 'primary',
                    }),
                TextColumn::make('class_or_role')
                    ->label('Class / Role')
                    ->searchable(),
                TextColumn::make('birth_date')
                    ->date('d M')
                    ->sortable(),
                TextColumn::make('badge')
                    ->badge(),
                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('birth_date', 'asc');
    }
}
