@extends('layouts.full')
@push('page_body_class')
hold-transition login-page
@endpush

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('home') }}"><b>{{ config('app.name') }}</b></a>
    </div>

    <!-- /.login-logo -->

    <!-- /.login-box-body -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">เข้าสู่ระบบ {{session('level')}} dd</p>

            <form method="post" action="{{route('login.login')}}">
                @csrf

                <div class="input-group mb-3">
                    <input  type="text" name="username" value="{{ old('email') }}" placeholder="username" class="form-control ">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>

                </div>

                <div class="input-group mb-3">
                    <input  type="password" name="password" placeholder="@lang('auth.login.field.password')" class="form-control ">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">จดจำรหัสผ่าน</label>
                        </div>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                    </div>

                </div>
            </form>


            <p class="mb-1">
                <a href="{{route('register.index')}}" class="text-center">สมัครสมาชิก</a>
            </p>


        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection
