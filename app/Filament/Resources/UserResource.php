<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Facades\Filament;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $modelLabel = 'User';
    protected static ?string $pluralModelLabel = 'User';
    protected static ?string $navigationLabel = 'User';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Naran'),

                Forms\Components\TextInput::make('username')
                    ->label('Username')
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email(),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(fn ($livewire) => $livewire instanceof Pages\CreateUser)
                    ->dehydrateStateUsing(fn ($state) => $state ? bcrypt($state) : null)
                    ->dehydrated(fn ($state) => filled($state)),

                Forms\Components\Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'majelis' => 'Majelis',
                        'user' => 'User',
                    ])
                    ->required()
                    ->default('user'),

                Forms\Components\Select::make('position')
                    ->label('Posisaun')
                    ->options([
                        'pastor' => 'Pastor',
                        'xefe majelis' => 'Xefe Majelis',
                        'vice majelis' => 'Vice Majelis',
                        'sekretaria 1' => 'Sekretaria 1',
                        'sekretaria 2' => 'Sekretaria 2',
                        'tesoreira 1' => 'Tesoreira 1',
                        'tesoreira 2' => 'Tesoreira 2',
                        'sarani' => 'Sarani',
                    ])
                    ->default('sarani')
                    ->rules(function (callable $get, $record) {
                        return [
                            function ($attribute, $value, $fail) use ($get, $record) {
                                $uniquePositions = [
                                    'xefe majelis',
                                    'vice majelis',
                                    'sekretaria 1',
                                    'sekretaria 2',
                                    'tesoreira 1',
                                    'tesoreira 2',
                                ];

                                if (in_array($value, $uniquePositions)) {
                                    $exists = \App\Models\User::where('position', $value)
                                        ->when($record, function ($query) use ($record) {
                                            return $query->where('id', '!=', $record->id);
                                        })
                                        ->exists();

                                    if ($exists) {
                                        $fail("Posisaun '{$value}' iha ona. Favor muda ita nia posisaun");
                                    }
                                }
                            },
                        ];
                    }),

                Forms\Components\Select::make('section')
                    ->label('Seksaun')
                    ->options([
                        'umum' => 'Umum',
                        'warta' => 'Warta',
                        'musik' => 'Musik',
                    ])
                    ->default('umum'),

                Forms\Components\FileUpload::make('image')
                    ->label('Foto')
                    ->image()
                    ->directory('user-photos')
                    ->maxSize(1024)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('role')->sortable(),
                Tables\Columns\TextColumn::make('position')->label('Posisaun')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('section')->label('Seksaun')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->size(50)
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->image))
                    ->extraAttributes(['style' => 'border-radius:50%; object-fit: cover;']),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return Filament::auth()?->user()?->role === 'admin';
    }
}
