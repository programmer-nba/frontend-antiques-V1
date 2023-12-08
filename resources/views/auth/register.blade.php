@extends('layouts.full')
@push('page_body_class')
hold-transition register-page
@endpush

@section('content')
<div class="register-box">
    <div class="register-logo">
        <a href="{{ route('home') }}"><b>{{ config('app.name') }}</b></a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">สมัครสมาชิก</p>

            <form method="post" action="{{route('login.register')}}">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control " value="{{ old('name') }}" placeholder="name">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>

                </div>

                <div class="input-group mb-3">
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control " placeholder="username">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="password">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('auth.register.field.password2')">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>

                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">สมัครสมาชิก</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="{{ route('login.login') }}" class="text-center">ฉันเป็นสมาชิกอยู่แล้ว</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->

    <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection
