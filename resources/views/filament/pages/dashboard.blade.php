<x-filament-panels::page>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Kartu Informasi -->
        <div class="col-span-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-6 rounded-xl shadow-lg">
            <h1 class="text-2xl font-bold">Shalom, {{ auth()->user()->name }} 👋</h1>
            <p class="mt-1">Selamat datang di sistem informasi Gereja TABC.</p>
        </div>

        <!-- Notifikasi Artikel Terbaru -->
        <div class="bg-white p-4 rounded-xl shadow border">
            <h2 class="text-lg font-bold mb-2">📰 Artikel Terbaru</h2>
            <ul class="divide-y divide-gray-200">
                @forelse ($latestArticles as $article)
                    <li class="py-2">
                        <span class="font-semibold text-indigo-600">{{ $article->title }}</span>
                        <div class="text-sm text-gray-500">Dipublikasikan pada {{ $article->created_at->format('d M Y') }}</div>
                    </li>
                @empty
                    <li class="text-sm text-gray-500">Belum ada artikel baru.</li>
                @endforelse
            </ul>
        </div>

    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
        <x-filament::card class="bg-white shadow text-center py-4">
            <div class="text-sm text-gray-500">Jemaat</div>
            <div class="text-2xl font-bold text-blue-600">512</div>
        </x-filament::card>

        <x-filament::card class="bg-white shadow text-center py-4">
            <div class="text-sm text-gray-500">Artikel</div>
            <div class="text-2xl font-bold text-green-600">{{ \App\Models\Article::count() }}</div>
        </x-filament::card>

        <x-filament::card class="bg-white shadow text-center py-4">
            <div class="text-sm text-gray-500">Jadwal Ibadah</div>
            <div class="text-2xl font-bold text-indigo-600">{{ \App\Models\Worship::count() }}</div>
        </x-filament::card>

        <x-filament::card class="bg-white shadow text-center py-4">
            <div class="text-sm text-gray-500">Doa Rabu</div>
            <div class="text-2xl font-bold text-red-600">{{ \App\Models\Fellowship::count() }}</div>
        </x-filament::card>
    </div>
</x-filament-panels::page>
