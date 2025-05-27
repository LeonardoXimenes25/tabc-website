@extends('layouts.app')

@section('content')
<div class="container py-4" style="min-height: 100vh">
    <h1 class="text-center mb-5">Kalender Acara</h1>

    <!-- Month/Year Filter -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-8 col-lg-6">
            <form method="GET" action="{{ route('schedules.index') }}" class="row g-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <select name="month" id="month" class="form-select">
                        @foreach (range(1, 12) as $month)
                            <option value="{{ $month }}" {{ $month == $currentMonth ? 'selected' : '' }}>
                                {{ Carbon\Carbon::create()->month($month)->isoFormat('MMMM') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <select name="year" id="year" class="form-select">
                        @foreach (range(2020, 2030) as $year)
                            <option value="{{ $year }}" {{ $year == $currentYear ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">
                         <i data-feather="filter" class="me-2"></i> Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Desktop Calendar -->
    <div class="d-none d-md-block">
        <div class="calendar-grid">
            <div class="row calendar-header">
                @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                    <div class="col calendar-day-header {{ $loop->last ? 'sunday-header' : '' }}">
                        <strong>{{ $day }}</strong>
                    </div>
                @endforeach
            </div>

            @php
                $firstDay = Carbon\Carbon::create($currentYear, $currentMonth, 1);
                $startDay = $firstDay->copy()->startOfWeek(Carbon\Carbon::MONDAY);
                $endDay = $firstDay->copy()->endOfMonth()->endOfWeek(Carbon\Carbon::SUNDAY);
                $eventsByDay = $events->groupBy(fn($event) => Carbon\Carbon::parse($event->date)->day);
            @endphp

            <div class="calendar-body">
                @for($date = $startDay; $date->lte($endDay); $date->addDay())
                    @if($date->dayOfWeek == Carbon\Carbon::MONDAY)
                        <div class="row calendar-week">
                    @endif

                    <div class="col calendar-day 
                        {{ !$date->isSameMonth($firstDay) ? 'calendar-day-outside' : '' }} 
                        {{ $date->isToday() ? 'calendar-day-today' : '' }}"
                        style="border: 1px solid #dee2e6;">
                        
                        <div class="calendar-day-number {{ $date->dayOfWeek == Carbon\Carbon::SUNDAY ? 'sunday-text' : '' }}">
                            <strong>{{ $date->day }}</strong>
                            @if($date->isSameMonth($firstDay) && $eventsByDay->has($date->day))
                                <span class="badge bg-secondary rounded-pill event-count">
                                    {{ $eventsByDay->get($date->day)->count() }}
                                </span>
                            @endif
                        </div>

                        @if($date->isSameMonth($firstDay) && $eventsByDay->has($date->day))
                            <div class="calendar-events">
                                @foreach($eventsByDay->get($date->day)->take(3) as $event)
                                   <a href="{{ route('schedules.show', ['type' => isset($event->worship_type) ? 'worship' : 'fellowship', 'id' => $event->id]) }}" class="text-decoration-none">
                                        <div class="calendar-event">
                                            <span class="event-type-badge 
                                                @if(isset($event->worship_type))
                                                    {{ $event->worship_type === 'sunday_service' ? 'badge-sunday-service' : 'badge-worship' }}
                                                @elseif(isset($event->fellowship_type))
                                                    {{ $event->fellowship_type === 'sunday_school' ? 'badge-sunday-school' : 'badge-fellowship' }}
                                                @else
                                                    badge-other
                                                @endif">
                                                @if(isset($event->worship_type))
                                                    @switch($event->worship_type)
                                                        @case('sunday_service')
                                                            Ibadah Minggu
                                                            @break
                                                        @case('good_friday')
                                                            Jumat Agung
                                                            @break
                                                        @case('christmas')
                                                            Natal
                                                            @break
                                                        @case('easter')
                                                            Paskah
                                                            @break
                                                        @default
                                                            Ibadah
                                                    @endswitch
                                                @elseif(isset($event->fellowship_type))
                                                    @switch($event->fellowship_type)
                                                        @case('prayer_fellowship')
                                                            Pers. Doa
                                                            @break
                                                        @case('youth_fellowship')
                                                            Pers. Remaja
                                                            @break
                                                        @case('family_fellowship')
                                                            Pers. Keluarga
                                                            @break
                                                        @case('sunday_school')
                                                            Sekolah Minggu
                                                            @break
                                                        @default
                                                            Persekutuan
                                                    @endswitch
                                                @else
                                                    Acara
                                                @endif
                                            </span>
                                            <div class="event-theme text-muted">{{ Str::limit($event->theme, 15) }}</div>
                                        </div>
                                    </a>
                                @endforeach
                                @if($eventsByDay->get($date->day)->count() > 3)
                                    <small class="text-muted">+{{ $eventsByDay->get($date->day)->count() - 3 }} acara lagi</small>
                                @endif
                            </div>
                        @endif
                    </div>

                    @if($date->dayOfWeek == Carbon\Carbon::SUNDAY)
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>

    <!-- Mobile Calendar -->
    <div class="d-md-none">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    {{ $firstDay->isoFormat('MMMM YYYY') }}
                </h5>
            </div>
            <div class="card-body p-0">
                @if($events->count() > 0)
                    <ul class="list-group list-group-flush">
                        @foreach($events->sortBy('date') as $event)
                            @php
                                $eventDate = Carbon\Carbon::parse($event->date);
                                $isSunday = $eventDate->dayOfWeek == Carbon\Carbon::SUNDAY;
                                
                                if (isset($event->worship_type)) {
                                    switch ($event->worship_type) {
                                        case 'sunday_service': 
                                            $eventType = 'Ibadah Minggu';
                                            $badgeClass = 'badge-sunday-service';
                                            break;
                                        case 'good_friday': 
                                            $eventType = 'Jumat Agung';
                                            $badgeClass = 'badge-worship';
                                            break;
                                        case 'christmas': 
                                            $eventType = 'Natal';
                                            $badgeClass = 'badge-worship';
                                            break;
                                        case 'easter': 
                                            $eventType = 'Paskah';
                                            $badgeClass = 'badge-worship';
                                            break;
                                        default: 
                                            $eventType = 'Ibadah';
                                            $badgeClass = 'badge-worship';
                                    }
                                } elseif (isset($event->fellowship_type)) {
                                    switch ($event->fellowship_type) {
                                        case 'prayer_fellowship': 
                                            $eventType = 'Pers. Doa';
                                            $badgeClass = 'badge-fellowship';
                                            break;
                                        case 'youth_fellowship': 
                                            $eventType = 'Pers. Remaja';
                                            $badgeClass = 'badge-fellowship';
                                            break;
                                        case 'family_fellowship': 
                                            $eventType = 'Pers. Keluarga';
                                            $badgeClass = 'badge-fellowship';
                                            break;
                                        case 'sunday_school': 
                                            $eventType = 'Sekolah Minggu';
                                            $badgeClass = 'badge-sunday-school';
                                            break;
                                        default: 
                                            $eventType = 'Persekutuan';
                                            $badgeClass = 'badge-fellowship';
                                    }
                                } else {
                                    $eventType = 'Acara';
                                    $badgeClass = 'badge-other';
                                }
                            @endphp
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <strong class="d-block {{ $isSunday ? 'sunday-text' : '' }}">
                                            {{ $eventDate->isoFormat('dddd, D MMMM YYYY') }}
                                        </strong>
                                        <a href="{{ route('schedules.show', ['type' => isset($event->worship_type) ? 'worship' : 'fellowship', 'id' => $event->id]) }}" class="text-decoration-none">
                                            <div class="d-flex flex-column">
                                                <span class="{{ $badgeClass }} rounded-pill px-2 py-1 d-inline-block mt-1 mb-1">
                                                    {{ $eventType }}
                                                </span>
                                                <small class="text-muted">{{ Str::limit($event->theme, 30) }}</small>
                                            </div>
                                        </a>
                                    </div>
                                    <i class="bi bi-calendar-event {{ $isSunday ? 'sunday-text' : 'text-muted' }}"></i>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center py-4 text-muted">
                        <i class="bi bi-calendar-x fs-1"></i>
                        <p class="mt-2">Tidak ada acara di bulan ini</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Calendar Grid Styles */
    .calendar-grid {
        background-color: #f8f9fa;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .calendar-header {
        background-color: #e9ecef;
        font-weight: 600;
        text-align: center;
    }

    .calendar-day-header {
        padding: 0.75rem;
        border: 1px solid #dee2e6;
        border-bottom: 2px solid #dee2e6;
    }

    .sunday-header {
        color: #dc3545;
    }

    .calendar-body {
        background-color: white;
    }

    .calendar-week {
        min-height: 150px;
    }

    .calendar-day {
        padding: 0.5rem;
        border: 1px solid #dee2e6;
        position: relative;
        min-height: 150px;
        background-color: white;
        display: flex;
        flex-direction: column;
    }

    /* Hari di luar bulan saat ini */
    .calendar-day-outside {
        background-color: #f8f9fa;
        color: #adb5bd;
        min-height: 150px;
    }

    /* Hari ini */
    .calendar-day-today {
        background-color: #e7f5ff;
        border: 2px solid #0d6efd !important;
    }

    .calendar-day-today .calendar-day-number {
        color: #0d6efd;
    }

    /* Style khusus hari Minggu */
    .sunday-text {
        color: #dc3545 !important;
        font-weight: bold;
    }

    .calendar-day-number {
        text-align: right;
        margin-bottom: 0.25rem;
        position: relative;
        flex-shrink: 0;
    }

    .calendar-day-number strong {
        font-weight: normal;
    }

    .event-count {
        position: absolute;
        top: -8px;
        right: -8px;
        font-size: 0.65rem;
    }

    .calendar-events {
        overflow-y: auto;
        max-height: calc(150px - 2rem);
        flex-grow: 1;
        font-size: 0.75rem;
    }

    .calendar-event {
        padding: 0.2rem;
        margin-bottom: 0.3rem;
        border-radius: 0.25rem;
        overflow: hidden;
    }

    .event-type-badge {
        display: inline-block;
        font-size: 0.65rem;
        font-weight: 500;
        padding: 0.2rem 0.5rem;
        border-radius: 0.75rem;
        margin-bottom: 0.2rem;
    }

    .badge-sunday-service {
        background-color: #f8d7da;
        color: #721c24;
    }

    .badge-sunday-school {
        background-color: #fff3cd;
        color: #856404;
    }

    .badge-worship {
        background-color: #e2e3e5;
        color: #383d41;
    }

    .badge-fellowship {
        background-color: #d1ecf1;
        color: #0c5460;
    }

    .badge-other {
        background-color: #d4edda;
        color: #155724;
    }

    .event-theme {
        font-size: 0.7rem;
        line-height: 1.2;
        color: #6c757d;
    }

    /* Mobile Styles */
    .list-group-item {
        min-height: 90px;
        display: flex;
        align-items: center;
    }

    .badge-sunday-service, 
    .badge-sunday-school,
    .badge-worship,
    .badge-fellowship,
    .badge-other {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
    }

    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .calendar-day {
            min-height: 120px;
        }
        .calendar-week {
            min-height: 120px;
        }
        .calendar-events {
            max-height: calc(120px - 2rem);
        }
    }
</style>
@endsection