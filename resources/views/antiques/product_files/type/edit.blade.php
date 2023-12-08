@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    @lang('models/takeTheJobs.singular')
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">


            <div class="card-body">
                <div class="row"><!-- Title Field -->
                    <div class="col-md-12">
                        
                        <form role="form" method="POST"
                        action="//localhost:3000/admin/product_files"><input type="hidden"
                            name="_token" value="HBubFxM9C9CYbJfo2UaNZYdPjEqlzpXzugl9cgUI">
                        <div class="form-group"><label class="control-label">ชื่อประเภทสินค้า
                                (ไทย)</label>
                            <div><input type="text" class="form-control input-lg"
                                    name="category_name_th"></div>
                        </div>
                        <div class="form-group"><label class="control-label">ชื่อประเภทสินค้า
                                (English)</label>
                            <div><input type="text" class="form-control input-lg"
                                    name="category_name_en"></div>
                        </div> กำหนดราคาตามลูกค้าแต่ละประเภท <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ประเภทลูกค้า</th>
                                    <th scope="col">ราคา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">A</th>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th scope="row">B</th>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th scope="row">C</th>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th scope="row">D</th>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    </div>
                </div>
            </div>

            <div class="card-footer"><input class="btn btn-primary" type="submit" value="Save"><a
                    href="{{ route('product_files.type.index', 1) }}" class="btn btn-default"> Cancel </a></div>


        </div>
    </div>
@endsection
