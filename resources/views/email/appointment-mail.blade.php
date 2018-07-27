@extends('email.layout')

@section('heading', 'Regarding Appointment from patient')

@section('content')
    <h1>
        Dear Sir/Madam,
    </h1>
    <p>
        The Patient named {{ $name }} has taken an appointment with you for the date {{ $date }} and time {{ $time }}.
        You could also contact him directly in this number {{ $phone }}.
    </p>
    <p>
        Regards,
        Patient Management System,
        Admin
    </p>
@stop