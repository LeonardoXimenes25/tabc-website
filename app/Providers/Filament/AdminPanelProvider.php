<?php

namespace App\Providers\Filament;

use Filament\Forms;
use Filament\Pages;
use Filament\Panel;
use Filament\Tables;
use Filament\Widgets;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\PanelProvider;
use App\Models\IncomingMail;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Collection;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}

class IncomingMailResource extends Resource
{
    protected static ?string $model = IncomingMail::class;

    protected static ?string $navigationLabel = 'Incoming Mails';
    protected static ?string $navigationIcon = 'heroicon-o-mail';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('letter_number')
                    ->required()
                    ->label('Letter Number'),
                DatePicker::make('received_date')
                    ->required()
                    ->label('Date of Receipt'),
                Forms\Components\TextInput::make('sender')
                    ->required()
                    ->label('Sender'),
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->label('Subject'),
                Forms\Components\FileUpload::make('attachment')
                    ->label('Attachment')
                    ->nullable(),
                Forms\Components\TextInput::make('receiver')
                    ->required()
                    ->label('Receiver'),
                Forms\Components\Select::make('status')
                    ->options([
                        IncomingMail::STATUS_RECEIVED => 'Received',
                        IncomingMail::STATUS_DRAFT => 'Draft',
                    ])
                    ->default(IncomingMail::STATUS_RECEIVED)
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('letter_number')
                    ->label('Letter Number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('received_date')
                    ->label('Date of Receipt')
                    ->date(),
                Tables\Columns\TextColumn::make('sender')
                    ->label('Sender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Subject')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver')
                    ->label('Receiver')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->enum([
                        IncomingMail::STATUS_RECEIVED => 'Received',
                        IncomingMail::STATUS_DRAFT => 'Draft',
                    ])
                    ->label('Status')
                    ->colors([
                        IncomingMail::STATUS_RECEIVED => 'success',
                        IncomingMail::STATUS_DRAFT => 'warning',
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        IncomingMail::STATUS_RECEIVED => 'Received',
                        IncomingMail::STATUS_DRAFT => 'Draft',
                    ])
                    ->default(IncomingMail::STATUS_RECEIVED)
                    ->label('Status'),
            ])
            ->actions([
                Action::make('view')
                    ->label('View')
                    ->url(fn (IncomingMail $record) => route('filament.resources.incoming-mails.view', $record)),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('delete')
                    ->label('Delete')
                    ->action(fn (Collection $records) => $records->each(fn (IncomingMail $record) => $record->delete())),
            ]);
    }
}
