@extends('antiques_user.layouts.app')
@push('page_css')
    <style>
        .btn-square-md {
            width: 100px !important;
            max-width: 100% !important;
            max-height: 100% !important;
            height: 100px !important;
            text-align: center;
            padding: 0px;
            margin: 10px;
            font-size: 12px;
        }
        .select2-container .select2-selection--single{
            height: auto !important;
        }

        #roles{
            width:100% !important;
            height: calc(1.6em + 0.75rem + 2px) !important;
            padding: 0.375rem 0.75rem;
        }
        body{
            overflow: auto !important;
        }

    </style>
@endpush

@section('content')
    <section class="content-header" style="padding:4px;">

    </section>

    <div class="content px-2" >


        @include('flash::message')

        <div class="clearfix"></div>

            {{-- <cashier-header></cashier-header> --}}
            <div class="row">

                <div class="col-md-8" style="padding-right:4px;">
                    <div class="card" style="position: relative;">

                    <div class="card-body" style="height:46vh;">
                        <cashier-table></cashier-table>
                    </div>
                </div>

            </div>
            <div class="col-md-4" style="padding-left:4px;">
                <div class="card">

                <div class="card-body" style="height:46vh;">
                    <cashier-customer></cashier-customer>
                </div>
            </div>

        </div>
         </div>
    </div>
    <div class="content px-2" >


        @include('flash::message')

        <div class="clearfix"></div>

            {{-- <cashier-header></cashier-header> --}}
            <div class="row" style="
            margin-top: -9px;
        ">
                <div class="col-md-8" style="padding-right:4px;">
                    <div class="card">

                   <cashier-print username="{{session('name')}}"></cashier-print>
                    </div>
                </div>
                <div class="col-md-4" style="padding-left:4px;">
                    <div class="card">

                    <div class="card-body" style="">
                        <cashier-category data="{{ json_encode($categorys) }}"></cashier-category>
                    </div>
                </div>
            </div>
         </div>
    </div>
@endsection
