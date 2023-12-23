@extends('DASHBOARD_ADMIN.layouts.app')

@section('content')
    <section class="content-header">

    </section>

    <div class="content px-3">


        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">หน้าบ้านคีย์ข้อมูล</h3>
                &nbsp;&nbsp;<a target="_blank" href="/user">{{ url('user') }}</a>

            </div>
            <div class="card-body">
                <iframe src="/user" frameborder="0" scrolling="yes" seamless="seamless" style="display:block; width:100%; height:100vh;"></iframe>

            </div>
        </div>
    </div>
@endsection
@push('third_party_scripts')

@endpush

@push('page_scripts')
@endpush
