@extends('DASHBOARD_ADMIN.layouts.app')

@section('content')
    <section class="content-header">

    </section>

    <div class="content px-3">


        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">รายงานสรุปการซื้อ/ตามเลขที่</h3>
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
                                <label>วันที่สิ้นสุด</label>
                                <input type="date" name="datestop" class="form-control" placeholder="Enter ..." value="{{request()->datestop}}" required>
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
                @if (!empty(request()->datestart) && !empty(request()->datestop))
                <a target="_blank" href="{{route('cashier.print.ordersummaryreportbynumber',[
                    'datestart' => request()->datestart,
                    'datestop' => request()->datestop
                ])}}" class="btn btn-primary float-right"><i class="fa fa-print mr-2"></i>พิมพ์เอกสาร</a>                <h5>รายงานสรุปการซื้อ/ตามวันที่</h5>
                <h5>วันที่ {{request()->datestart}} ถึง {{request()->datestop}}</h5>
                @php
                        $count = 5;
                @endphp
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">ลำดับ</th>
                            <th>เลขที่รายการ</th>
                            <th class="text-center">วันที่</th>
                            <th class="text-center">ชื่อผู้ขาย</th>
                            <th  class="text-center" colspan="2" rowspan="3">รายการ</th>

                            <th  class="text-center" rowspan="3">จำนวน</th>
                            <th  class="text-center">ราคา</th>
                            <th  class="text-center">จำนวนเงิน</th>
                            <th  class="text-center">หักออก</th>
                            <th  class="text-center">Vat</th>
                            <th  class="text-center">จำนวนเงินสุทธิ</th>

                        </tr>
                    </thead>
                    <tbody>
                        @for ($i=0; $i<2; $i++)

                        <tr>
                            <td rowspan="3" >1</td>
                            <td rowspan="3" >66REC1104001</td>
                            <td rowspan="3" >04/11/2023</td>
                            <td rowspan="3" >general1 ทั่วไป - A</td>
                            <td rowspan="1" colspan="1" style="border-right: unset">
                            1

                            </td>
                            <td rowspan="1" colspan="1" style="border-left: unset">
                               ผ้าใส - 1001 lorem
                            </td>
                            <td rowspan="1" colspan="1">
                                4.70

                                </td>
                                <td rowspan="1" colspan="1">
                                   3.90
                                </td>
                                <td rowspan="1" colspan="1">
                                    37.35
                                 </td>
                                 <td rowspan="1" colspan="1">

                                 </td>
                                 <td rowspan="1" colspan="1">

                                 </td>
                                 <td rowspan="1" colspan="1">
                                    37.85
                                 </td>
                            {{-- <td>01/11/2023</td>
                            <td>30768.00</td>
                            <td></td>
                            <td></td>
                            <td>30768.00</td>
                            <td></td>
                            <td>30768.00</td> --}}

                        </tr>
                        <tr>
                            <td rowspan="1" colspan="1" style="border-right: unset">
                                2

                                </td>
                                <td rowspan="1" colspan="1" style="border-left: unset">
                                   กระป๋อง - 5601
                                </td>
                                <td rowspan="1" colspan="1">
                                    1.00
                                 </td>
                                 <td rowspan="1" colspan="1">
                                    42.00
                                 </td>
                                 <td rowspan="1" colspan="1">
                                    42.00
                                 </td>
                                 <td rowspan="1" colspan="1">

                                 </td>
                                 <td rowspan="1" colspan="1">

                                 </td>
                                 <td rowspan="1" colspan="1">
                                    43.00
                                 </td>
                        </tr>
                        <tr>
                            <td rowspan="1" colspan="4" style="text-align: right">
                                ยอดรวม

                                </td>

                                 <td rowspan="1" colspan="1">
                                    79.00
                                 </td>
                                 <td rowspan="1" colspan="1">
                                    0.00
                                 </td>
                                 <td rowspan="1" colspan="1">
                                    0.00
                                 </td>
                                 <td rowspan="1" colspan="1">
                                    79.00
                                 </td>
                        </tr>
                        @endfor
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
