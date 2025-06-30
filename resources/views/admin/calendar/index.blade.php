@extends('layouts.admin')

@section('title', 'Takvim')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Takvim</h6>
                </div>
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Etkinlik Ekleme/Düzenleme Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Etkinlik Ekle/Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="eventForm">
                    <input type="hidden" id="eventId">
                    <div class="form-group">
                        <label for="title">Başlık</label>
                        <input type="text" class="form-control" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Açıklama</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Başlangıç Tarihi</label>
                        <input type="datetime-local" class="form-control" id="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">Bitiş Tarihi</label>
                        <input type="datetime-local" class="form-control" id="end_date" required>
                    </div>
                    <div class="form-group">
                        <label for="student_id">Öğrenci</label>
                        <select class="form-control" id="student_id" required>
                            <option value="">Öğrenci Seçin</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="coach_id">Koç</label>
                        <select class="form-control" id="coach_id" required>
                            <option value="">Koç Seçin</option>
                            @foreach($coaches as $coach)
                                <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color">Renk</label>
                        <input type="color" class="form-control" id="color" value="#3788d8">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="saveEvent">Kaydet</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
@endpush

@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'tr',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: '{{ route("admin.calendar.events.get") }}',
        editable: true,
        selectable: true,
        select: function(info) {
            $('#eventModal').modal('show');
            $('#start_date').val(info.startStr);
            $('#end_date').val(info.endStr);
            $('#eventId').val('');
            $('#eventForm')[0].reset();
        },
        eventClick: function(info) {
            $('#eventModal').modal('show');
            $('#eventId').val(info.event.id);
            $('#title').val(info.event.title);
            $('#description').val(info.event.extendedProps.description);
            $('#start_date').val(info.event.startStr);
            $('#end_date').val(info.event.endStr);
            $('#student_id').val(info.event.extendedProps.student_id);
            $('#coach_id').val(info.event.extendedProps.coach_id);
            $('#color').val(info.event.backgroundColor);
        },
        eventDrop: function(info) {
            updateEvent(info.event);
        },
        eventResize: function(info) {
            updateEvent(info.event);
        }
    });
    calendar.render();

    $('#saveEvent').click(function() {
        var eventId = $('#eventId').val();
        var formData = {
            title: $('#title').val(),
            description: $('#description').val(),
            start_date: $('#start_date').val(),
            end_date: $('#end_date').val(),
            student_id: $('#student_id').val(),
            coach_id: $('#coach_id').val(),
            color: $('#color').val()
        };

        if (eventId) {
            $.ajax({
                url: '{{ route("admin.calendar.events.update", "") }}/' + eventId,
                type: 'PUT',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#eventModal').modal('hide');
                    calendar.refetchEvents();
                }
            });
        } else {
            $.ajax({
                url: '{{ route("admin.calendar.events.store") }}',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#eventModal').modal('hide');
                    calendar.refetchEvents();
                }
            });
        }
    });

    function updateEvent(event) {
        $.ajax({
            url: '{{ route("admin.calendar.events.update", "") }}/' + event.id,
            type: 'PUT',
            data: {
                start_date: event.startStr,
                end_date: event.endStr
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    }
});
</script>
@endpush 