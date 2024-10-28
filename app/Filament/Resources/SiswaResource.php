<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Siswa';
    protected static ?string $navigationGroup = 'Data Siswa';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')->required(),
            Forms\Components\TextInput::make('nisn')->required()->unique(),
            Forms\Components\DatePicker::make('tanggal_lahir')->required(),
            Forms\Components\Select::make('jenis_kelamin')
                ->options(['L' => 'Laki-laki', 'P' => 'Perempuan'])
                ->required(),
            Forms\Components\TextInput::make('alamat')->required(),
            Forms\Components\TextInput::make('email')->required()->email()->unique(),
            Forms\Components\TextInput::make('no_telepon')->required(),
            Forms\Components\TextInput::make('asal_sekolah')->required(),
            Forms\Components\TextInput::make('jurusan_pilihan')->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('nisn'),
                Tables\Columns\TextColumn::make('tanggal_lahir')->date(),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('no_telepon'),
                Tables\Columns\TextColumn::make('asal_sekolah'),
                Tables\Columns\TextColumn::make('jurusan_pilihan'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Allows editing a student
                Tables\Actions\DeleteAction::make(), // Allows deleting a student
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(), // Allows bulk deletion of students
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSiswa::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
