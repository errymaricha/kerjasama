<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MouResource\Pages;
use App\Filament\Resources\MouResource\RelationManagers;
use App\Models\Mou;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MouResource extends Resource
{
    protected static ?string $model = Mou::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = '1. Data MoU';
    protected static ?string $navigationGroup = 'Kerjasama';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number')
                    ->label("Nomor Janabadra")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('number_partner')
                    ->label("Nomor Partner")
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('judul_mou')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('id_partner')
                    ->label('Partner') // Label di form
                    ->relationship('partner', 'nama_partner') // Ambil dari relasi di model
                    ->searchable() // Biar bisa cari partner
                    ->preload() // Load semua data di awal
                    ->required(),

                //Forms\Components\TextInput::make('id_fakultas')
                   // ->label('Unit')
                   // ->required()
                   // ->numeric(),
                Forms\Components\Select::make('id_fakultas')
                    ->label('Unit')
                    ->relationship('fakultas', 'nama_fakultas')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_mulai')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_selesai')
                    ->required(),
                //Forms\Components\TextInput::make('status')
                   // ->required(),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options([
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif',
                    ]),
                Forms\Components\TextInput::make('dokumen')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_partner')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('id_partner')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('partner.nama_partner')
                    ->label('Partner')
                    ->sortable()
                    ->searchable(),

               // Tables\Columns\TextColumn::make('id_fakultas')
                    // ->label('Unit')
                    //->numeric()
                    //->sortable(),
                Tables\Columns\TextColumn::make('fakultas.nama_fakultas') 
                ->label('Unit')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('dokumen')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListMous::route('/'),
            'create' => Pages\CreateMou::route('/create'),
            'edit' => Pages\EditMou::route('/{record}/edit'),
        ];
    }

   public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();

    /** @var \App\Models\User $user */
    $user = Auth::user();

    if ($user && $user->hasRole('staff')) {
        $query->where('id_fakultas', $user->id_fakultas);
    }

    return $query;
}

}
