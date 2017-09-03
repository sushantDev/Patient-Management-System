@extends('backend.layouts.app')

@section('title', 'Staff')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'staff.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.staff.partials.form', ['header' => 'Create a staff'])
            {{ Form::close() }}
        </div>
    </section>
@stop