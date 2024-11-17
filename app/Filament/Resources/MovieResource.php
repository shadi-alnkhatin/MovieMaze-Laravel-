<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovieResource\Pages;
use App\Filament\Resources\MovieResource\RelationManagers;
use App\Models\Movie;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovieResource extends Resource
{
    protected static ?string $model = Movie::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('title')
                ->label('Title')
                ->required(),
                Textarea::make('description')
                ->label('Description')
                ->required(),
            TextInput::make('release_year')
                ->label('Release Year')
                ->numeric()
                ->required(),
            TextInput::make('duration')
                ->label('Duration (minutes)')
                ->numeric()
                ->required(),
                TextInput::make('poster_url')
                ->label('Poster URL')
                ->required(),
            TextInput::make('trailer_url')
                ->label('Trailer URL')
                ->required(),
                CheckboxList::make('genres')->columns(3)->relationship('genres','name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('poster_url')
                ->label('Poster')
                ->circular()
                ->height(50)
                ->width(50),

                TextColumn::make('title')->label('Title'),
                TextColumn::make('release_year')->label('Release Year'),
                TextColumn::make('duration')->label('Duration'),
                TextColumn::make('trailer_url')->limit(20)->label('trailer_url'),
                TextColumn::make('genres.name')->badge(),
                ])
            ->filters([
                // Add filters if needed
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
            'index' => Pages\ListMovies::route('/'),
            'create' => Pages\CreateMovie::route('/create'),
            'edit' => Pages\EditMovie::route('/{record}/edit'),
        ];
    }
}
