<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class PostsArticle extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $query = '';         // Untuk pencarian umum
    public $categorySlug = '';  // Untuk filter berdasarkan kategori
    public $authorUsername = ''; // Untuk filter berdasarkan penulis

    // Fungsi untuk menerima parameter dari rute
    public function mount($authorUsername = null, $categorySlug = null)
    {
        if ($authorUsername) {
            $this->authorUsername = $authorUsername;
        }
        
        if ($categorySlug) {
            $this->categorySlug = $categorySlug;
        }
    }

    // Fungsi untuk update query pencarian
    public function updatingQuery()
    {
        $this->resetPage(); // Reset halaman setiap kali query berubah
    }

    public function render()
    {
        $postsQuery = Article::query();
        
        // Filter berdasarkan kategori jika ada
        if ($this->categorySlug) {
            $postsQuery->whereHas('category', function($q) {
                $q->where('slug', $this->categorySlug);
            });
        }
        
        // Filter berdasarkan penulis jika ada
        if ($this->authorUsername) {
            $postsQuery->whereHas('author', function($q) {
                $q->where('username', $this->authorUsername);
            });
        }
        
        // Filter berdasarkan kata kunci pencarian
        if ($this->query) {
            $postsQuery->where(function($query) {
                $query->where('title', 'like', '%' . $this->query . '%')
                      ->orWhereHas('author', function($q) {
                          $q->where('name', 'like', '%' . $this->query . '%');
                      })
                      ->orWhereHas('category', function($q) {
                          $q->where('name', 'like', '%' . $this->query . '%');
                      });
            });
        }
        
        $posts = $postsQuery->latest()->paginate(8);

        return view('livewire.posts-article', ['posts' => $posts]);
    }
}
