<div class="comment-item ms-{{ $level * 4 }}">
    <div class="d-flex justify-content-between">
        <strong>{{ $comment->user->name }}</strong>
        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
    </div>
    <p>{{ $comment->body }}</p>

    {{-- Form balas komentar --}}
    @auth
    <form action="{{ route('articles.comments.reply', ['article' => $article->slug, 'comment' => $comment->id]) }}" method="POST" class="mb-2">
        @csrf
        <textarea name="body" class="form-control form-control-sm mt-2" rows="2" placeholder="Replay komentariu..." required></textarea>
        <button type="submit" class="btn btn-sm btn-outline-primary mt-1">Replay</button>
    </form>
    @endauth

    {{-- Tampilkan balasan rekursif --}}
    @foreach ($comment->replies as $reply)
        @include('components.comment', ['comment' => $reply, 'article' => $article, 'level' => $level + 1])
    @endforeach
</div>
