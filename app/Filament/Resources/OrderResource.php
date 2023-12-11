<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\IconColumn;


class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('nama')
                        ->required(),
                    TextInput::make('alamat')
                        ->required(),
                    TextInput::make('no_hp')
                        ->required()
                        ->numeric(),
                    TextInput::make('email')
                        ->required(),
                    TextInput::make('jumlah')
                        ->required()
                        ->numeric(),
                    FileUpload::make('bukti_pembayaran')
                        ->image()
                        ->directory('bukti_pembayaran')
                        ->preserveFilenames()
                        ->imageResizeMode('force')
                        ->imageResizeTargetWidth('300')
                        ->imageResizeTargetHeight('300'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('produk.nama_produk')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('jumlah')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('alamat')
                    ->searchable(),
                TextColumn::make('no_hp')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('total')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('bukti_pembayaran')
                    ->disk('public'),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
