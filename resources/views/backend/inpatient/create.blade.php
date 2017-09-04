@extends('backend.layouts.app')

@section('title', 'Inpatient')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'inpatient.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.inpatient.partials.form', ['header' => 'Create a inpatient'])
            {{ Form::close() }}
        </div>
    </section>
@stop