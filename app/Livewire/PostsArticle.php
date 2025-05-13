<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class PostsArticle extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $query = '';       // Untuk pencarian umum
    public $categorySlug = ''; // Untuk filter berdasarkan kategori

    // Fungsi untuk update query pencarian
    public function updatingQuery($query)
    {
        $this->resetPage(); // Reset halaman setiap kali query berubah
    }

    public function render()
    {
        // Menambahkan query kategori untuk menyaring artikel
        $posts = Article::when($this->categorySlug, function($query) {
                return $query->whereHas('category', function($q) {
                    $q->where('slug', $this->categorySlug);
                });
            })
            ->where('title', 'like', '%' . $this->query . '%')
            ->orWhereHas('author', function($query) {
                $query->where('name', 'like', '%' . $this->query . '%');
            })
            ->orWhereHas('category', function($query) {
                $query->where('name', 'like', '%' . $this->query . '%');
            })
            ->latest()
            ->paginate(8);

        return view('livewire.posts-article', ['posts' => $posts]);
    }
}
