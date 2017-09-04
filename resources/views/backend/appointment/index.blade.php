@extends('backend.layouts.app')

@section('title', 'Appointment')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all appointments</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('appointment.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="appointment-datatable">
                        <thead>
                        <tr>
                            <th>{{ strtoupper(__('name')) }}</th>
                            <th>{{ strtoupper(__('address')) }}</th>
                            <th>{{ strtoupper(__('phone no')) }}</th>
                            <th>{{ strtoupper(__('date')) }}</th>
                            <th>{{ strtoupper(__('time')) }}</th>
                            <th>{{ strtoupper(__('doctor_id')) }}</th>
                            <th>{{ strtoupper(__('action')) }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables/datatables.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var table = $('#appointment-datatable').DataTable({
            "dom": "rBftip",
            "language": {
                "processing": "<h2 id='dt_loading'><span class='fa fa - spinner fa-pulse'></span> Loading...</h2>"
            },
            "buttons": [
                'pageLength', 'colvis'
            ],
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "data": {"_token": '{{ csrf_token() }}'},
                "url": '{{ route('appointment.datatable') }}'
            },
            "pageLength": "25",
            "columns": [
                {"data": "name", "name": "name", "searchable": "false"},
                {"data": "address", "name": "address"},
                {"data": "phone", "name": "phone"},
                {"data": "date", "name": "date"},
                {"data": "time", "name": "time"},
                {"data": "doctor_id", "name": "doctor_id"},
                {
                    "data": "id", "class": "text-right", "orderable": false, "render": function (data) {
                    return "<a href='/appointment/" + data + "/edit' class='btn btn-default'> Edit </a>" +
                        "<a href='/appointment/" + data + "/destroy' class='btn btn-danger'> Delete </a>";
                }
                }
            ]
        });

        $(document).on('click', '.uk-button-delete', function () {
            var that = this;
            var name = $(that).data('name');
            UIkit.modal.confirm("Delete this '" + name + "' ?").then(function () {
                $(that).closest('form').submit();
            });
        });
        $('input[type=search]').addClass('uk-input');
    });
</script>
@endpush