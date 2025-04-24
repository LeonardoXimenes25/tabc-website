{{-- resources/views/partials/sidebar.blade.php --}}
<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="fw-bold mb-0">
            <i class="{{ $icon ?? 'fas fa-newspaper' }} me-2 text-primary"></i> {{ $title ?? 'Sidebar' }}
        </h5>
    </div>
        
    <div class="card-body p-0">
        @foreach($items as $item)
            <a href="{{ route($route, $item->slug) }}"
               class="d-block p-3 border-bottom text-decoration-none text-dark hover-effect">
                <div>
                    <h6 class="fw-bold mb-1">{{ Str::limit($item->title, 40) }}</h6>
                    <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                </div>
            </a>
        @endforeach
    </div>
</div>
