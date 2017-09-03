@extends('backend.layouts.app')

@section('title', 'Staff')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($staff, ['route' =>['staff.update', $staff->username],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('backend.staff.partials.form', ['header' => 'Edit Staff <span class="text-primary">('.str_limit($staff->name, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop