@extends('backend.layouts.app')

@section('title', 'Appointment')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'appointment.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.appointment.partials.form', ['header' => 'Create a appointment'])
            {{ Form::close() }}
        </div>
    </section>
@stop