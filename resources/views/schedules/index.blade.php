@extends('layouts.app')

@section('content')
<div class="container py-4">
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
                        <i class="bi bi-filter-circle me-1"></i> Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Desktop Calendar -->
    <div class="d-none d-md-block">
        <div class="calendar-grid">
            <div class="row calendar-header">
                @foreach(['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] as $day)
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
                                <span class="badge {{ $date->dayOfWeek == Carbon\Carbon::SUNDAY ? 'bg-danger' : 'bg-primary' }} rounded-pill event-count">
                                    {{ $eventsByDay->get($date->day)->count() }}
                                </span>
                            @endif
                        </div>

                        @if($date->isSameMonth($firstDay) && $eventsByDay->has($date->day))
                            <div class="calendar-events">
                                @foreach($eventsByDay->get($date->day) as $event)
                                   <a href="{{ route('schedules.show', ['type' => isset($event->worship_type) ? 'worship' : 'fellowship', 'id' => $event->id]) }}" class="text-decoration-none">
                                        <div class="calendar-event {{ isset($event->worship_type) ? 'event-worship' : (isset($event->fellowship_type) ? 'event-fellowship' : 'event-other') }}">
                                            {{ Str::limit($event->theme, 15) }}
                                        </div>
                                    </a>
                                @endforeach
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
                            @endphp
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <strong class="d-block {{ $isSunday ? 'sunday-text' : '' }}">
                                            {{ $eventDate->isoFormat('dddd, D MMMM YYYY') }}
                                        </strong>
                                        <a href="{{ route('schedules.show', ['type' => isset($event->worship_type) ? 'worship' : 'fellowship', 'id' => $event->id]) }}" class="text-decoration-none">
                                            <span class="event-badge {{ $isSunday ? 'bg-danger' : (isset($event->worship_type) ? 'bg-info' : (isset($event->fellowship_type) ? 'bg-success' : 'bg-secondary')) }} text-white rounded-pill px-2 py-1 d-inline-block mt-1">
                                                {{ $event->theme }}
                                            </span>
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

    {{-- paginana --}}
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
        min-height: 120px;
    }

    .calendar-day {
        padding: 0.5rem;
        border: 1px solid #dee2e6;
        position: relative;
        min-height: 120px;
        background-color: white;
    }

    /* Hari di luar bulan saat ini */
    .calendar-day-outside {
        background-color: #f8f9fa;
        color: #adb5bd;
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
        max-height: 80px;
    }

    .calendar-event {
        font-size: 0.75rem;
        padding: 0.25rem;
        margin-bottom: 0.25rem;
        border-radius: 0.25rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .event-worship {
        background-color: #d1e7ff;
        color: #084298;
        border-left: 3px solid #0d6efd;
    }

    .event-fellowship {
        background-color: #d4edda;
        color: #155724;
        border-left: 3px solid #28a745;
    }

    .event-other {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 3px solid #dc3545;
    }
</style>
@endsection