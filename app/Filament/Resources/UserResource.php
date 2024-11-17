<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')->required(),
            TextInput::make('email')
                ->email()
                ->required()
                ->label('Email Address'),

            Select::make('is_admin')
                ->options([
                    1 => 'Admin',
                    0 => 'User',
                ])
                ->required()
                ->label('Role'),

            TextInput::make('password')
                ->required()
                ->label('Password')
                ->dehydrateStateUsing(fn ($state) => bcrypt($state)) 
                ->hiddenOn('edit')
                ]);
    }


    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('id')->label('ID'),
            TextColumn::make('email')->label('Email'),
            BadgeColumn::make('is_admin')
            ->label('Admin')
            ->getStateUsing(fn ($record) => $record->is_admin ? 'True' : 'False')
            ->colors([
                'success' => fn ($state) => $state === 'True',
                'danger' => fn ($state) => $state === 'False',
            ]),
            TextColumn::make('created_at')
                ->label('Created At')
                ->date('Y/M/D'), // Format to show only the year
            TextColumn::make('updated_at')
                ->label('Updated At')
                ->date('Y/M/D'), // Format to show only the year
        ])
        ->defaultSort('id', 'desc')

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
