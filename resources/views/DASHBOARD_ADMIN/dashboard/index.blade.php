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
                @if (!empty(request()->datestart) )
                             <h5>ภาพรวมระบบวันที่ {{request()->datestart}} </h5>
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
                            <th  class="text-center">รูปภาพ</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>sdfsd</td>
                            <td class="text-danger"><button type="button" class="btn btn-success">
                                จ่ายเงินแล้ว <span class="badge badge-light">APPROVE</span>
                                <span class="sr-only">unread messages</span>
                              </button>

                            </td>

                            <td>sdfsd</td>
                            <td>sdfsd</td>
                            <td>sdfsd</td>
                            <td>sdfsd</td>
                            <td>
                                <img  style="width:70px;height:70px;" src="https://inwfile.com/s-cw/sxx8u7.jpg" alt="">
                            </td>

                        </tr>
                        <tr>
                            <td>sdfsd</td>
                            <td class="text-danger">
                               <button type="button" class="btn btn-warning">
                                รับออเดอร์แล้ว <span class="badge badge-light">FINISH</span>
                                <span class="sr-only">unread messages</span>
                              </button>

                            </td>

                            <td>sdfsd</td>
                            <td>sdfsd</td>
                            <td>sdfsd</td>
                            <td>sdfsd</td>
                            <td>sdfsd</td>

                        </tr>
                        <tr>
                            <td>sdfsd</td>
                            <td class="text-danger">

                            </td>

                            <td>sdfsd</td>
                            <td>sdfsd</td>
                            <td>sdfsd</td>
                            <td>sdfsd</td>
                            <td>sdfsd</td>

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
