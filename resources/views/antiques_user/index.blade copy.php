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


    </style>
@endpush

@section('content')
    <section class="content-header" style="padding:4px;">

    </section>

    <div class="content px-3" style="padding-right:9px !important;padding-left:9px !important;">


        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            {{-- <cashier-header></cashier-header> --}}
            <div class="row">
                <div class="col-md-7">
                    <div class="card-body" style="height:30rem;">
                        <table-data></table-data>
                    </div>
                </div>
                <div class="col-md-5"> <div class="card-body" >
                    <antiques-user-customer></antiques-user-customer>

                </div>

                </div>
            </div>
             <div class="card-body" >
                 <div class="row">
                     <div class="col-md-7">
                         <div class="card ">



                         </div>

                     </div>
                     <div class="col-md-5">



                         <div class="card card-success">


                             <div class="card-body">
                                 {{-- @foreach ($categorys as $value)
                                     <button type="button" class="btn btn-secondary btn-square-md">{{$value['category_name_en']}}/{{$value['category_name_th']}}</button>

                                     @endforeach --}}
                                 <dropdown-header data="{{ json_encode($categorys) }}" username="test"></dropdown-header>

                             </div>

                         </div>












                     </div>
                     <div class="col-md-7">

                     </div>
                     <div class="col-md-5">


                     </div>
                 </div>
             </div>
         </div>
    </div>
@endsection
