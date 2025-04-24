<div class="row mb-4 bg-light rounded-3 p-3 shadow-sm">
    <div class="col-md-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/" class="text-decoration-none d-flex align-items-center">
                        <i class="fas fa-home me-2"></i>
                        Home
                    </a>
                </li>

                @foreach ($breadcrumbs as $breadcrumb)
                    @if ($loop->last)
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $breadcrumb['label'] }}
                        </li>
                    @else
                        <li class="breadcrumb-item">
                            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                        </li>
                    @endif
                @endforeach

            </ol>
        </nav>
    </div>
    <div class="col-md-4">
        <form class="d-flex">
            <input class="form-control form-control-sm shadow-sm" type="search" placeholder="Cari artikel..." aria-label="Search">
        </form>
    </div>
</div>
