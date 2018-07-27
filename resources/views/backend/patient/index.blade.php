@extends('backend.layouts.app')

@section('title', 'Patient')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all patients</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('patient.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="patient-datatable">
                            <thead>
                            <tr>
                                <th>{{ strtoupper(__('name')) }}</th>
                                <th>{{ strtoupper(__('address')) }}</th>
                                <th>{{ strtoupper(__('phone no')) }}</th>
                                <th>{{ strtoupper(__('age')) }}</th>
                                <th>{{ strtoupper(__('gender')) }}</th>
                                <th>{{ strtoupper(__('action')) }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
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
        var table = $('#patient-datatable').DataTable({
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
                "url": '{{ route('patient.datatable') }}'
            },
            "pageLength": "25",
            "columns": [
                {"data": "name", "name": "name", "searchable": "false"},
                {"data": "address", "name": "address"},
                {"data": "phone", "name": "phone"},
                {"data": "age", "name": "age"},
                {"data": "gender", "name": "gender"},
                {
                    "data": "username", "class": "text-right", "orderable": false, "render": function (data) {
                    return "<a href='/patient/" + data + "/edit' class='btn btn-default'> Edit </a>" +
                        "<button data-url='/patient/" + data + "/destroy' class='btn btn-danger item-delete'> Delete </button>";
                }
                }
            ]
        });
    });
</script>
@endpush