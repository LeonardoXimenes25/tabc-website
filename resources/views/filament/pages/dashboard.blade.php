<x-filament-panels::page>
    <!-- Stats Cards - 2x2 Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
    <!-- Jemaat Card -->
    <x-filament::card class="bg-white shadow-lg border-0 rounded-xl h-full">
        <div class="p-5 flex items-center gap-4">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div>
                <div class="text-sm text-gray-500 font-medium">Jemaat</div>
                <div class="text-2xl font-bold text-gray-800">512</div>
            </div>
        </div>
    </x-filament::card>

    <!-- Artikel Card -->
    <x-filament::card class="bg-white shadow-lg border-0 rounded-xl h-full">
        <div class="p-5 flex items-center gap-4">
            <div class="p-3 rounded-full bg-green-100 text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
            <div>
                <div class="text-sm text-gray-500 font-medium">Artikel</div>
                <div class="text-2xl font-bold text-gray-800">{{ \App\Models\Article::count() }}</div>
            </div>
        </div>
    </x-filament::card>

    <!-- Jadwal Ibadah Card -->
    <x-filament::card class="bg-white shadow-lg border-0 rounded-xl h-full">
        <div class="p-5 flex items-center gap-4">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <div class="text-sm text-gray-500 font-medium">Jadwal Ibadah</div>
                <div class="text-2xl font-bold text-gray-800">{{ \App\Models\Worship::count() }}</div>
            </div>
        </div>
    </x-filament::card>

    <!-- Doa Rabu Card -->
    <x-filament::card class="bg-white shadow-lg border-0 rounded-xl h-full">
        <div class="p-5 flex items-center gap-4">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
            </div>
            <div>
                <div class="text-sm text-gray-500 font-medium">Doa Rabu</div>
                <div class="text-2xl font-bold text-gray-800">{{ \App\Models\Fellowship::count() }}</div>
            </div>
        </div>
    </x-filament::card>
</div>


    <!-- Rest of your content remains the same -->
    <!-- Content Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Latest Articles Card -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    Artigu Espiritaul Foun
                </h2>
            </div>
            <div class="divide-y divide-gray-100 max-h-96 overflow-y-auto">
                @forelse ($latestArticles as $article)
                    <div class="p-4 hover:bg-gray-50 transition-colors duration-150">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ $article->title }}</h3>
                                <p class="text-sm text-gray-500 mt-1">Dipublikasikan {{ $article->created_at->diffForHumans() }}</p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                Baca
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-gray-500">
                        Belum ada artikel baru.
                    </div>
                @endforelse
            </div>
            <div class="p-4 border-t border-gray-100 bg-gray-50">
                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Lihat semua artikel →</a>
            </div>
        </div>

        <!-- Quick Actions Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Quick Actions
                </h2>
            </div>
            <div class="p-4 space-y-3">
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                    <div class="p-2 rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700">Tambah Artikel Baru</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                    <div class="p-2 rounded-full bg-green-100 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700">Jadwal Ibadah</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                    <div class="p-2 rounded-full bg-purple-100 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700">Kelola Jemaat</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                    <div class="p-2 rounded-full bg-yellow-100 text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="font-medium text-gray-700">Pengaturan Sistem</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Upcoming Events Section -->
    <div class="mt-8 bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Jadwal Ibadah Mendatang
            </h2>
        </div>
        <div class="divide-y divide-gray-100 max-h-96 overflow-y-auto">
            @foreach(range(1,3) as $event)
                <div class="p-4 hover:bg-gray-50 transition-colors duration-150">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 mt-1">
                            <div class="flex flex-col items-center justify-center w-12 h-12 rounded-lg bg-red-100 text-red-600">
                                <span class="font-bold text-lg">15</span>
                                <span class="text-xs">Jun</span>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Ibadah Minggu Pagi</h3>
                            <p class="text-sm text-gray-500 mt-1">08:00 - 10:00 WIT</p>
                            <p class="text-sm text-gray-600 mt-2">Pembicara: Pdt. John Doe</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-4 border-t border-gray-100 bg-gray-50">
            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Lihat semua jadwal →</a>
        </div>
    </div>
</x-filament-panels::page>