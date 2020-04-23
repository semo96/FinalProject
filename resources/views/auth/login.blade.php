@extends('BackOffice-Layout.Main-Layout.Login_Master')

@section('content')
    <!--
 <h1>Laravel 6 form validation example</h1>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
            </div>
@endif
        -->
    @include('BackOffice-Layout.Messages.alerts')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group has-feedback">
        <!--   <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>   -->
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="   اسم المستخدم">
            <span class="fa fa-user form-control-feedback"></span>

        <!--
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            -->
        </div>

        <div class="form-group has-feedback">
        <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->

            <input id="password" type="password" class="form-control" name="password"  autocomplete="current-password" placeholder="كلمة السر">
            <span class="fa fa-lock form-control-feedback"></span>
        <!--
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            -->
        </div>



        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" > تذكرني

                <!-- <label class="form-check-label" for="remember">
{{--                    {{ __('Remember Me') }}--}}
                    </label>-->
                </div>
            </div>
        </div>

        <div class="social-auth-links text-center">
            <button type="submit" class="btn btn-block btn-sign btn-flat" style="margin-right:0px">
                {{ __('تسجيل الدخول') }}
            </button>
            <br>
            @if (Route::has('password.request'))
                <a class=" sign-label" href="{{ route('password.request') }}">
                    {{ __('نسيت كلمة السر!') }}
                </a><br>
            @endif
        </div>
    </form>


@endsection
