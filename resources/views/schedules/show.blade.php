@extends('layouts.app')

@section('content')
<div class="container my-4">

    <div class="container">
        {{-- breadcumb --}}
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('schedules.index', ['type' => $type]) }}">Jadwal {{ ucfirst($type) }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
    </nav>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient-primary text-primary py-3">
                    <h3 class="mb-0 text-center">
                        Detail Jadwal {{ $type == 'worship' ? 'Ibadah Minggu' : 'Persekutuan Doa Rabu' }}
                    </h3>
                </div>
                <div class="card-body p-4">
                    @if($type == 'worship')
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-calendar-alt me-2"></i>Tanggal</h5>
                                    <p class="mb-0">{{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-cross me-2"></i>Tema</h5>
                                    <p class="mb-0">{{ $event->theme }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="info-box bg-light p-3 rounded mb-3">
                            <h5 class="text-primary"><i class="fas fa-bible me-2"></i>Ayat Alkitab</h5>
                            <p class="mb-0">{{ $event->bible_verse }}</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-user-tie me-2"></i>Pengkhotbah</h5>
                                    <p class="mb-0">{{ $event->preacher }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-praying-hands me-2"></i>Liturgis</h5>
                                    <p class="mb-0">{{ $event->liturgist }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-music me-2"></i>Pemusik</h5>
                                    <p class="mb-0">{{ $event->musician }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-microphone-alt me-2"></i>Singer</h5>
                                    <p class="mb-0">{{ $event->singer ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-hands-helping me-2"></i>Penyambut</h5>
                                    <p class="mb-0">{{ $event->welcomer ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-pray me-2"></i>Doa Persembahan</h5>
                                    <p class="mb-0">{{ $event->offering_prayer }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="info-box bg-light p-3 rounded">
                            <h5 class="text-primary"><i class="fas fa-desktop me-2"></i>Operator LCD</h5>
                            <p class="mb-0">{{ $event->multimedia }}</p>
                        </div>

                    @elseif($type == 'fellowship')
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-calendar-alt me-2"></i>Tanggal</h5>
                                    <p class="mb-0">{{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-cross me-2"></i>Tema</h5>
                                    <p class="mb-0">{{ $event->theme }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="info-box bg-light p-3 rounded mb-3">
                            <h5 class="text-primary"><i class="fas fa-bible me-2"></i>Ayat Alkitab</h5>
                            <p class="mb-0">{{ $event->bible_verse }}</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-user-tie me-2"></i>Pengkhotbah</h5>
                                    <p class="mb-0">{{ $event->preacher }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-light p-3 rounded mb-3">
                                    <h5 class="text-primary"><i class="fas fa-microphone me-2"></i>MC</h5>
                                    <p class="mb-0">{{ $event->mc }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="info-box bg-light p-3 rounded">
                            <h5 class="text-primary"><i class="fas fa-music me-2"></i>Pemusik</h5>
                            <p class="mb-0">{{ $event->musician }}</p>
                        </div>

                    @else
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i> Data tidak tersedia.
                        </div>
                    @endif

                    <div class="mt-4 text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
    <i class="fas fa-arrow-left me-2"></i> Kembali
</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .info-box {
        transition: transform 0.2s;
        border-left: 4px solid #4e73df;
    }
    .info-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    }
    .card {
        border: none;
    }
    .info-box h5 {
        font-size: 1.1rem;
    }
</style>
@endpush