@extends('DASHBOARD_ADMIN.layouts.app')

@section('content')
    <section class="content-header">

    </section>

    <div class="content px-3">


        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ภาพรวมระบบ - Dashboard</h3>
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>วันที่เริ่มต้น</label>
                                <input type="date" name="datestart" class="form-control" placeholder="Enter ..." value="{{request()->datestart}}" required>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-success d-block
                                "><i class="fa fa-search mr-2"></i>ค้นหา</button>
                            </div>
                        </div>
                    </div>
                </form>




                <br>
                @if (true)
                             <h5>ภาพรวมระบบวันที่ {{request()->datestart ?? "ทั้งหมด"}} </h5>
                @php
                        $count = 5;
                @endphp
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">คิวที่</th>
                            <th>สถานะ</th>
                            <th class="text-center">ข้อมูลลูกค้า</th>
                            <th class="text-center">ประเภทลูกค้า</th>
                            <th  class="text-center" >ข้อมูลสินค้า</th>

                            <th  class="text-center" >ราคาทั้งหมด</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $value)
                        <tr>
                            <td>{{$value['data']['queue']}}</td>
                            <td class="text-danger">
                                @if ($value["data"]['status'] == 'FINISH')
                                <button type="button" class="btn btn-warning">

                                รับออเดอร์แล้ว
                                @elseif($value["data"]['status'] == 'APPROVE')
                                <button type="button" class="btn btn-success">

                                จ่ายเงินแล้ว
                                @endif
                                 <span class="badge badge-light">{{$value["data"]["status"]}}</span>
                                <span class="sr-only"></span>
                              </button>

                            </td>

                            <td class="text-left">{{$value["data"]['fullname_th']}}</td>
                            <td>{{$value["data"]['class']}}</td>
                            <td>
                                <modal modal-id="add{{$value['_id']}}" title="ข้อมูลสินค้า" button-text="คลิกเพื่อดูข้อมูลสินค้า" class-name="" icon-name="">
                                    <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">รายการ</th>
                                            <th scope="col">จำนวน</th>
                                            <th scope="col">ราคารวม</th>
                                            <th scope="col">รูปภาพ</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($value['data']['order_detail'] as $key => $value2)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$value2['description']}}</td>
                                                <td>{{$value2['qty']}}</td>
                                                <td>{{$value2['total']}}</td>
                                                <td>
                                                    @if (!empty($value2['image']))
                                                    <img style="width: 100px;" src="{{env('MIX_CAMERA_API')}}/images/{{$value2['image']}}.jpg">
                                                    @endif
                                                </td>
                                              </tr>
                                            @endforeach


                                        </tbody>
                                      </table>

                                  </modal>&nbsp;&nbsp;
                            </td>
                            <td>{{$value["data"]['total']}}</td>


                        </tr>
                        @endforeach



                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('third_party_scripts')
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush

@push('page_scripts')
@endpush
