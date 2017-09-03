@extends('backend.layouts.app')

@section('title', 'Doctor')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all doctors</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('doctor.create') }}">
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
                            <th width="10%">Department</th>
                            <th width="15%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($doctors as $key => $doctor)
                            <tr>
                                <td>{{++$key}}</td>
                                <div class="title-icon">
                                    <td><img src="{{ isset($doctor->image)  ? asset($doctor->image->thumbnail(40,40)) : asset('image/placeholder.jpg') }}" style="width: 40px;height: 40px;border-radius: 40px;"></td>
                                </div>
                                <td>{{ str_limit($doctor->name, 47) }}</td>
                                <td>{{ str_limit($doctor->address, 40) }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->age }}</td>
                                <td>{{ $doctor->gender }}</td>
                                <td>{{ $doctor->department }}</td>
                                <td class="text-right">
                                    <a href="{{route('doctor.edit', $doctor->username)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('doctor.destroy', $doctor->username) }}" class="btn btn-flat btn-primary btn-xs item-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No doctors available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop