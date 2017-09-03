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
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="5%">Photo</th>
                            <th width="10%">Name</th>
                            <th width="10%">Address</th>
                            <th width="10%">Phone no</th>
                            <th width="10%">Age</th>
                            <th width="10%">Gender</th>
                            <th width="15%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($patients as $key => $patient)
                            <tr>
                                <td>{{++$key}}</td>
                                <div class="title-icon">
                                    <td><img src="{{ isset($patient->image)  ? asset($patient->image->thumbnail(40,40)) : asset('image/placeholder.jpg') }}" style="width: 40px;height: 40px;border-radius: 40px;"></td>
                                </div>
                                <td>{{ str_limit($patient->name, 47) }}</td>
                                <td>{{ str_limit($patient->address, 40) }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ $patient->age }}</td>
                                <td>{{ $patient->gender }}</td>
                                <td class="text-right">
                                    <a href="{{route('patient.edit', $patient->username)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('patient.destroy', $patient->username) }}" class="btn btn-flat btn-primary btn-xs item-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No patients available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop