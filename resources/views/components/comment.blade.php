<div class="comment-item ms-{{ $level * 4 }}">
    <div class="d-flex justify-content-between">
        <strong>{{ $comment->user->name }}</strong>
        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
    </div>
    <p>{{ $comment->body }}</p>

    @auth
    <button class="btn btn-sm btn-link text-primary toggle-reply-btn" data-id="{{ $comment->id }}">
        Replay
    </button>
    <form action="{{ route('articles.comments.reply', ['article' => $article->slug, 'comment' => $comment->id]) }}"
          method="POST"
          class="mb-2 reply-form"
          id="reply-form-{{ $comment->id }}"
          style="display: none;">
        @csrf
        <textarea name="body" class="form-control form-control-sm mt-2" rows="2" placeholder="Replay komentariu..." required></textarea>
        <button type="submit" class="btn btn-sm btn-outline-primary mt-1">Replay</button>
    </form>
    @endauth

    @php
        $repliesCount = $comment->replies->count();
    @endphp

    <div class="replies-list mt-2">
        {{-- Semua balasan disembunyikan kecuali jika user klik "View more" --}}
        @if ($repliesCount > 0)
            <button class="btn btn-sm btn-link text-secondary show-more-replies-btn mt-2"
                    data-id="{{ $comment->id }}">
                🔽 Haree {{ $repliesCount }} Replay
            </button>

            <div class="hidden-replies d-none" id="hidden-replies-{{ $comment->id }}">
                {{-- Tampilkan semua balasan secara rekursif --}}
                @foreach ($comment->replies as $reply)
                    @include('components.comment', ['comment' => $reply, 'article' => $article, 'level' => $level + 1])
                @endforeach
            </div>
        @endif
    </div>
</div>
