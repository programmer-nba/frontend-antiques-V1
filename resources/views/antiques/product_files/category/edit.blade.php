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


<form action="{{route('product_files.update', $categorys[0]['category_id'])}}" method="post">
    @csrf
    @method('put')


            <div class="card-body">
                <div class="row"><!-- Title Field -->
                    <div class="form-group col-sm-6"><label for="title">ชื่อหมวดหมู่ (ไทย):</label><input class="form-control"
                            name="category_name_th" type="text" value="{{$categorys[0]['category_name_th']}}"></div><!-- Content Field -->
                    <div class="form-group col-sm-6"><label for="content">ชื่อหมวดหมู่ (English):</label><input class="form-control"
                            name="category_name_en" type="text" id="content"  value="{{$categorys[0]['category_name_en']}}"></div><!-- Image Field -->

                </div>
            </div>

            <div class="card-footer"><input class="btn btn-primary" type="submit" value="Save">



                <a
                    href="{{route('product_files.index')}}" class="btn btn-default"> Cancel </a></div>

                </form>
        </div>
    </div>
@endsection
