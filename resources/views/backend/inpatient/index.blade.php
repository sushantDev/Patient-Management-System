@extends('backend.layouts.app')

@section('title', 'Inpatient')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all inpatients</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('inpatient.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="inpatient-datatable">
                        <thead>
                        <tr>
                            <th>{{ strtoupper(__('name')) }}</th>
                            <th>{{ strtoupper(__('address')) }}</th>
                            <th>{{ strtoupper(__('phone no')) }}</th>
                            <th>{{ strtoupper(__('skills')) }}</th>
                            <th>{{ strtoupper(__('admit type')) }}</th>
                            <th>{{ strtoupper(__('admit type')) }}</th>
                            <th>{{ strtoupper(__('medicine')) }}</th>
                            <th>{{ strtoupper(__('ward no')) }}</th>
                            <th>{{ strtoupper(__('room no')) }}</th>
                            <th>{{ strtoupper(__('doctor')) }}</th>
                            <th>{{ strtoupper(__('staff')) }}</th>
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
        var table = $('#inpatient-datatable').DataTable({
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
                "url": '{{ route('inpatient.datatable') }}'
            },
            "pageLength": "25",
            "columns": [
                {"data": "name", "name": "name", "searchable": "false"},
                {"data": "address", "name": "address"},
                {"data": "phone", "name": "phone"},
                {"data": "skills", "name": "skills"},
                {"data": "admit_type", "name": "admit_type"},
                {"data": "admit_time", "name": "admit_time"},
                {"data": "medicine", "name": "medicine"},
                {"data": "ward_no", "name": "ward_no"},
                {"data": "room_no", "name": "room_no"},
                {"data": "doctor_id", "name": "doctor_id"},
                {"data": "staff_id", "name": "staff_id"},
                {
                    "data": "id", "class": "text-right", "orderable": false, "render": function (data) {
                    return "<a href='/inpatient/" + data + "/edit' class='btn btn-default'> Edit </a>" +
                        "<a href='/inpatient/" + data + "/destroy' class='btn btn-danger'> Delete </a>";
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