@extends('backend.layouts.app')

@section('title', 'Patient')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'patient.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.patient.partials.form', ['header' => 'Create a patient'])
            {{ Form::close() }}
        </div>
    </section>
@stop