@extends('DASHBOARD_ADMIN.layouts.app')

@section('content')
    <section class="content-header">

    </section>

    <div class="content px-3">


        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">รายชื่อสินค้า - Product Files</h3>
            </div>
            <div class="card-body">
                <product-files></product-files>
            </div>
        </div>
    </div>
@endsection

@push('third_party_scripts')
@endpush

@push('page_scripts')
@endpush
