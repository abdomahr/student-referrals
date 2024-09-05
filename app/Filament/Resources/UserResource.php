<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                                          ->required()
                                          ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                                          ->maxLength(255),
                Forms\Components\TextInput::make('password')
                                          ->dehydrated(function ($operation) {
                                              return $operation === 'create';
                                          })
                                          ->password()
                                          ->required(function ($operation) {
                                              return $operation === 'create';
                                          })
                                          ->maxLength(255),
                Forms\Components\TextInput::make('code')
                                          ->numeric()
                                          ->default(random_int(1000, 10000))
                                          ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('id', '!=', 1);
            })
            ->columns([
                Tables\Columns\TextColumn::make('name')
                                         ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                                         ->searchable(),
                Tables\Columns\TextColumn::make('code')
                                         ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                                         ->dateTime()
                                         ->sortable()
                                         ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                                         ->dateTime()
                                         ->sortable()
                                         ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
