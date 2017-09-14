@extends('backend.layouts.app')

@section('title', 'Inpatient')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($inpatient, ['route' =>['inpatient.update', $inpatient->id],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('backend.inpatient.partials.form', ['header' => 'Edit Inpatient <span class="text-primary">('.str_limit($inpatient->name, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop