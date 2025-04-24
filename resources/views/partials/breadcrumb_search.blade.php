<!-- resources/views/partials/breadcrumb_search.blade.php -->
<div class="row bg-light rounded-3 p-3 shadow-sm align-items-center">
    <div class="col-md-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/" class="text-decoration-none d-flex align-items-center">
                        <i class="fas fa-home me-2"></i>
                        Home
                    </a>
                </li>
                @foreach($breadcrumbItems as $breadcrumb)
                    <li class="breadcrumb-item @if($breadcrumb['active']) active @endif" aria-current="page">
                        <a href="{{ $breadcrumb['link'] }}" class="{{ $breadcrumb['active'] ? 'text-muted' : '' }}">
                            {{ $breadcrumb['title'] }}
                        </a>
                    </li>
                @endforeach
            </ol>
        </nav>
    </div>
    <div class="col-md-4">
        <input type="text" wire:model.live.debounce.300ms="query" class="form-control form-control-sm"
            placeholder="Cari artikel...">
    </div>
</div>
