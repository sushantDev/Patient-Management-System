@extends('backend.layouts.app')

@section('title', 'Doctor')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'doctor.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.doctor.partials.form', ['header' => 'Create a doctor'])
            {{ Form::close() }}
        </div>
    </section>
@stop