@extends('backend.layouts.app')

@section('title', 'Doctor')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($doctor, ['route' =>['doctor.update', $doctor->username],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('backend.doctor.partials.form', ['header' => 'Edit Doctor <span class="text-primary">('.str_limit($doctor->name, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop