@extends('layouts.app')

@section('head')
    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
@endsection

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-3">Kalender Jadwal Ibadah</h1>
    <p class="text-muted mb-3">Klik jadwal untuk melihat detailnya.</p>

    <div id="calendar"></div>
</div>
@endsection

@section('scripts')
    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,listMonth'
                },
                events: [
                    @foreach ($schedules as $schedule)
                        {
                            title: '{{ addslashes($schedule->theme) }}',
                            start: '{{ $schedule->date }}',
                            url: '{{ route("schedule.show", $schedule->id) }}',
                        },
                    @endforeach
                ],
                eventColor: '#0d6efd',
                eventClick: function(info) {
                    info.jsEvent.preventDefault(); // biar gak reload
                    if (info.event.url) {
                        window.open(info.event.url, "_blank");
                    }
                }
            });
            calendar.render();
        });
    </script>
@endsection
