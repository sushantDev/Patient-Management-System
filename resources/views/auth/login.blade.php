@extends('backend.layouts.app')

@section('title', 'Login')

@section('guest')
    <!-- BEGIN LOGIN SECTION -->
    <section class="section-account">
        <div class="row col-md-12 logo" align="center">
            <img src="{{ asset(setting('logo')) }}" alt="logo" height="100">
        </div>
        <div class="row col-md-12" align="center">
            <div class="card col-sm-4 col-sm-offset-4 ">
                <div class="card-body">
                    <br/>
                    <span class="text-lg text-bold text-primary">{{ setting('title') }}</span>
                    <br/><br/>
                    @include('partials.errors')
                    <form class="form form-validate" role="form" style="text-align:left;" method="POST" action="{{ url('/login') }}" autocomplete="off" novalidate>
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            <label for="login">Email</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <label for="password">Password</label>
                            <p class="help-block">
                                <a href="{{ url('/password/reset') }}" target="_blank">Forgot?</a>
                            </p>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <div class="checkbox checkbox-inline checkbox-styled">
                                    <label>
                                        {{ Form::checkbox('remember', 1, null) }}
                                        <span>Remember me</span>
                                    </label>
                                </div>
                            </div><!--end .col -->
                            <div class="col-xs-6 text-right">
                                <button class="btn btn-primary btn-raised" type="submit">Login</button>
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END LOGIN SECTION -->

    <footer class="text-center">
        <p>
            Copyright &#183; {{ setting('title') }} &#183; {{date('Y')}}
        </p>
    </footer>
@endsection

@push('styles')
<style type="text/css">
    .logo {
        margin-top: 80px;
        margin-bottom: 15px;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush
