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

        .select2-container .select2-selection--single {
            height: auto !important;
        }

        #roles {
            width: 100% !important;
            height: calc(1.6em + 0.75rem + 2px) !important;
            padding: 0.375rem 0.75rem;
        }
    </style>
@endpush

@section('content')
    <section class="">

    </section>

    <div class="content ">


        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
       <cashier-header></cashier-header>

        <div class="card-body" >
            <div class="row">
                <div class="col-md-7">
                    <div class="card ">

                        <div class="card-body" style="height:30rem;">
                            <table-data></table-data>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card card-success">


                                <div class="card-body">
                                    <form>
                                        <a href="{{ route('print.report.generate') }}" class="btn btn-primary mr-2"><i
                                                class="fa fa-print mr-2"></i>PRINT
                                            REPORT</a>
                                        <button class="btn btn-primary mr-2"><i class="fa fa-print mr-2"></i>ออกใบเสร็จ</button>
                                        <button class="btn btn-primary mr-2"><i
                                                class="fa fa-print mr-2"></i>พิมพ์บัตรประชาชน</button>
                                        <button class="btn btn-secondary mt-2"><i class="fa fa-print mr-2"></i>Paid Details
                                            Report</button>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-sm-4">

                                                <div class="form-group">
                                                    <label>เลขที่ใบเสร็จ</label>
                                                    <input type="text" class="form-control" placeholder="Enter ...">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Record by</label>
                                                    <input type="text" class="form-control" placeholder="Enter ...">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Paid by</label>
                                                    <input type="text" class="form-control" placeholder="Enter ...">
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card card-primary">

                                <div class="card-header">
                                    <h3 class="card-title" style="margin-bottom:0px">Summary</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Amount</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Deduct</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Sell/ขายหักบิล</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-9">
                                            {{-- <fieldset>
                                                <legend>Password</legend>
                                                <input type="password" id="pwd" name="pwd">
                                            </fieldset> --}}
                                            {{-- <div class="card card-warning">
                                                <div class="card-header">
                                                    <h3 class="card-title">Vat Type</h3>
                                                </div>
                                                <div class="card-body">

                                                </div>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                          Vat
                                                        </label>
                                                      </div>

                                                </div>
                                                <br><br>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option1" checked>
                                                        <label class="form-check-label" for="exampleRadios2">
                                                          Include Vat
                                                        </label>
                                                      </div>

                                                </div>
                                                <div class="col-md-5" style="display: inline-block;">
                                                    <input style="display: inline-block;width:4rem;" type="password"
                                                        class="form-control" id="inputPassword" placeholder="Password">
                                                    <span style="display: inline-block;">&nbsp;%</span>


                                                </div>
                                                <div class="col-md-7">
                                                    <input type="password" class="form-control" id="inputPassword"
                                                        placeholder="Password">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Total/ยอดรวม</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">


                    <antiques-user-customer></antiques-user-customer>

                    <div class="card card-success">


                        <div class="card-body">
                            {{-- @foreach ($categorys as $value)
                                <button type="button" class="btn btn-secondary btn-square-md">{{$value['category_name_en']}}/{{$value['category_name_th']}}</button>

                                @endforeach --}}
                            <dropdown-header data="{{ json_encode($categorys) }}"></dropdown-header>


                        </div>

                    </div>

                    <div  class="card card-success">
                        <div class="card-body">

                            <save-cashier2></save-cashier2>



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
