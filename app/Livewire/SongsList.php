<?php

namespace App\Livewire;

use App\Models\Song;
use Livewire\Component;
use Livewire\WithPagination;

class SongsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $query = '';

    // Memperbarui query pencarian
    public function updatingQuery()
    {
        $this->resetPage();  // Reset halaman saat query diperbarui
    }

    public function render()
    {
        // Query pencarian
        $songs = Song::with(['author', 'categorysong'])
            ->where('title', 'like', '%' . $this->query . '%')
            ->orWhereHas('author', function ($query) {
                $query->where('name', 'like', '%' . $this->query . '%');
            })
            ->orWhereHas('categorysong', function ($query) {
                $query->where('name', 'like', '%' . $this->query . '%');
            })
            ->latest()
            ->paginate(8);

        return view('livewire.songs-list', [
            'songs' => $songs
        ]);
    }
}
