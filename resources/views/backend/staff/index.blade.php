@extends('backend.layouts.app')

@section('title', 'Staff')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all staffs</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('staff.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="staff-datatable">
                            <thead>
                            <tr>
                                <th>{{ strtoupper(__('name')) }}</th>
                                <th>{{ strtoupper(__('staff type')) }}</th>
                                <th>{{ strtoupper(__('address')) }}</th>
                                <th>{{ strtoupper(__('phone no')) }}</th>
                                <th>{{ strtoupper(__('email')) }}</th>
                                <th>{{ strtoupper(__('age')) }}</th>
                                <th>{{ strtoupper(__('gender')) }}</th>
                                <th>{{ strtoupper(__('dob')) }}</th>
                                <th>{{ strtoupper(__('marital status')) }}</th>
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
        var table = $('#staff-datatable').DataTable({
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
                "url": '{{ route('staff.datatable') }}'
            },
            "pageLength": "25",
            "columns": [
                {"data": "name", "name": "name", "searchable": "false"},
                {"data": "staff_type", "name": "staff_type"},
                {"data": "address", "name": "address"},
                {"data": "phone", "name": "phone"},
                {"data": "email", "name": "email"},
                {"data": "age", "name": "age"},
                {"data": "gender", "name": "gender"},
                {"data": "dob", "name": "dob"},
                {"data": "marital_status", "name": "marital_status"},
                {
                    "data": "username", "class": "text-right", "orderable": false, "render": function (data) {
                    return "<a href='/staff/" + data + "/edit' class='btn btn-default'> Edit </a>" +
                        "<a href='/staff/" + data + "/destroy' class='btn btn-danger'> Delete </a>";
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