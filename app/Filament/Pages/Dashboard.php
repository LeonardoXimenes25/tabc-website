<?php

namespace App\Filament\Pages;

use App\Models\Article;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    public function getViewData(): array
    {
        return [
            'latestArticles' => Article::latest()->take(5)->get(),
        ];
    }
}
