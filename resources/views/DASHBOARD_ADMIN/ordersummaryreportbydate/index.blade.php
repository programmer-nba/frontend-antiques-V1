@extends('DASHBOARD_ADMIN.layouts.app')

@section('content')
    <section class="content-header">

    </section>

    <div class="content px-3">


        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">รายงานการซื้อประจำวัน</h3>
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
                                <button type="submit" class="btn btn-primary d-block
                                ">ค้นหา</button>
                            </div>
                        </div>
                    </div>
                </form>




                <br>
                @if (!empty(request()->datestart) && !empty(request()->datestop))
                <a href="{{route('cashier.print.purchasesummary',[
                    'datestart' => request()->datestart,
                    'datestop' => request()->datestop
                ])}}" class="btn btn-primary float-right"><i class="fa fa-print mr-2"></i>พิมพ์เอกสาร</a>
                <h5>รายงานสรุปการซื้อ/ตามสินค้า</h5>
                <h5>วันที่ {{request()->datestart}} ถึง {{request()->datestop}}</h5>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รายการ</th>
                            <th>หน่วย</th>
                            <th>จำนวนสุทธิ</th>
                            <th>จน.หักออก</th>
                            <th>ราคาเฉลี่ย</th>
                            <th>จำนวนเงิน</th>
                            <th>หักออก</th>
                            <th>จำนวนเงินสุทธิ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>กล่อง - 1101</td>
                            <td>กิโล</td>
                            <td>1048.40</td>
                            <td></td>
                            <td>3.54</td>
                            <td>41153.94</td>
                            <td></td>
                            <td>41153.94</td>
                        </tr>
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
