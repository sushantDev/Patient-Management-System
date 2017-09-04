@extends('backend.layouts.app')

@section('title', 'Appointment')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($appointment, ['route' =>['appointment.update', $appointment->username],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('backend.appointment.partials.form', ['header' => 'Edit Appointment <span class="text-primary">('.str_limit($appointment->name, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop