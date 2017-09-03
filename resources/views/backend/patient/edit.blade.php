@extends('backend.layouts.app')

@section('title', 'Patient')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($patient, ['route' =>['patient.update', $patient->username],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('backend.patient.partials.form', ['header' => 'Edit Patient <span class="text-primary">('.str_limit($patient->name, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop