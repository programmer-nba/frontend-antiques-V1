@extends('DASHBOARD_ADMIN.layouts.app')

@section('content')
    <section class="content-header">

    </section>

    <div class="content px-3">


        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">รายงานสรุปการซื้อ/ตามสินค้า</h3>
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
                @if (true)
                <a target="_blank" href="{{route('cashier.print.summaryreportbyproduct',[
                    'datestart' => request()->datestart,
                    'datestop' => request()->datestop
                ])}}" class="btn btn-primary float-right"><i class="fa fa-print mr-2"></i>พิมพ์เอกสาร</a>                <h5>รายงานสรุปการซื้อ/ตามสินค้า</h5>
                <h5>วันที่ {{request()->datestart ?? "ทั้งหมด"}} ถึง {{request()->datestop  ?? "ทั้งหมด"}}</h5>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">ลำดับ</th>
                            <th>รายการ</th>
                            <th class="text-center">หน่วย</th>
                            <th class="text-center">จำนวนสุทธิ</th>
                            <th class="text-center">จน.หักออก</th>
                            <th class="text-center">ราคาเฉลี่ย</th>
                            <th class="text-center">จำนวนเงิน</th>
                            <th class="text-center">หักออก</th>
                            <th class="text-center">จำนวนเงินสุทธิ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                        <tr class="text-center">
                            <td>{{$key}}</td>
                            <td class="text-left">{{$value["description"]}}</td>
                            <td>{{$value["unit"]}}</td>
                            <td>{{$value['qty']}}</td>
                            <td></td>
                            <td>                        {{ round((int)$value['total'] /  (int)$value['qty'], 2) }}
                            </td>
                            <td>{{$value['total']}}</td>
                            <td></td>
                            <td>{{$value['total']}}</td>
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
