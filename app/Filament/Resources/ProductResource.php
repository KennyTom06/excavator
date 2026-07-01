<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Sản phẩm';
    protected static ?string $modelLabel = 'Sản phẩm';
    protected static ?string $pluralModelLabel = 'Các sản phẩm';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->label('Danh mục')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('name')
                    ->label('Tên sản phẩm')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (\Filament\Forms\Set $set, ?string $state) => $set('slug', \Illuminate\Support\Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->label('Đường dẫn (Tự động)')
                    ->required()
                    ->maxLength(255)
                    ->disabled()
                    ->dehydrated(),
                Forms\Components\TextInput::make('price')
                    ->label('Giá (VNĐ)')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\TextInput::make('quantity')
                    ->label('Số lượng kho')
                    ->numeric()
                    ->default(0)
                    ->required(),
                Forms\Components\TextInput::make('model')
                    ->label('Model máy')
                    ->maxLength(255),
                Forms\Components\TextInput::make('weight')
                    ->label('Trọng lượng máy')
                    ->maxLength(255),
                Forms\Components\TextInput::make('lifting_capacity')
                    ->label('Tải trọng nâng')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bucket_capacity')
                    ->label('Dung tích gầu')
                    ->maxLength(255),
                Forms\Components\TextInput::make('max_dump_height')
                    ->label('Chiều cao đổ tối đa')
                    ->maxLength(255),
                Forms\Components\TextInput::make('engine_model')
                    ->label('Model động cơ')
                    ->maxLength(255),
                Forms\Components\TextInput::make('engine_power')
                    ->label('Công suất động cơ')
                    ->maxLength(255),
                Forms\Components\TextInput::make('transmission_type')
                    ->label('Loại hộp số')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tire_size')
                    ->label('Kích thước lốp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('overall_dimensions')
                    ->label('Kích thước tổng thể')
                    ->maxLength(255),
                Forms\Components\TextInput::make('work_cycle')
                    ->label('Chu kỳ làm việc')
                    ->maxLength(255),
                Forms\Components\TextInput::make('max_speed')
                    ->label('Tốc độ tối đa')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gradeability')
                    ->label('Khả năng leo dốc')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Hình ảnh')
                    ->image(),
                Forms\Components\Textarea::make('description')
                    ->label('Mô tả chi tiết')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Kích hoạt')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Danh mục')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Hình ảnh'),
                Tables\Columns\TextColumn::make('price')
                    ->label('Giá (VNĐ)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Tồn kho')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('model')
                    ->label('Model')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Kích hoạt')
                    ->boolean(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
