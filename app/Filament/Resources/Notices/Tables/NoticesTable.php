<?php

namespace App\Filament\Resources\Notices\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class NoticesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('badge')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Admissions' => 'danger',
                        'Academic' => 'primary',
                        'Facilities' => 'success',
                        'Transport' => 'warning',
                        default => 'info',
                    }),
                TextColumn::make('title')
                    ->searchable()
                    ->limit(60)
                    ->weight('bold'),
                TextColumn::make('notice_date')
                    ->date()
                    ->sortable(),
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
            ->defaultSort('notice_date', 'desc');
    }
}
