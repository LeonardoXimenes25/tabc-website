<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;
class PostsArticle extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $query = '';


    public function updatingQuery($query){
        $posts = Article::where('title', 'like', '%' . $this->query . '%')
        ->orWhereHas('author', function($query){
            $query->where('name', 'like', '%' . $this->query . '%');
        })
        ->orWhereHas('category', function($query){
            $query->where('name', 'like', '%' . $this->query . '%');
        })
        ->latest()->paginate(8);

        return $posts;
    }

    public function render()
    {
        return view('livewire.posts-article', ['posts' => $this->updatingQuery($this->query)]);
    }
}
