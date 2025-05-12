<?php

namespace App\Livewire;

use App\Models\Songs;
use Livewire\Component;
use Livewire\WithPagination;

class SongsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $query = '';

    public function updatingQuery($query)
    {
        $songs = Songs::with(['author', 'categorysong'])
            ->where('title', 'like', '%' . $this->query . '%')
            ->orWhereHas('author', function ($query) {
                $query->where('name', 'like', '%' . $this->query . '%');
            })
            ->orWhereHas('categorysong', function ($query) {
                $query->where('name', 'like', '%' . $this->query . '%');
            })
            ->latest()->paginate(8);

        return $songs;

    }

    public function render()
    {
        // dd($this->updatingQuery($this->query));
        return view('livewire.songs-list', [
            'songs' => $this->updatingQuery($this->query)
        ]);
    }
}
