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
                    <div class="form-group col-sm-6"><label for="title">Title:</label><input class="form-control"
                            name="title" type="text" id="title"></div><!-- Content Field -->
                    <div class="form-group col-sm-6"><label for="content">Content:</label><input class="form-control"
                            name="content" type="text" id="content"></div><!-- Image Field -->
                    <div class="form-group col-sm-6"><label for="image">Image:</label><input class="form-control"
                            name="image" type="text" id="image"></div><!-- Created By Field -->
                    <div class="form-group col-sm-6"><label for="created_by">Created By:</label><input class="form-control"
                            name="created_by" type="text" id="created_by"></div><!-- Active Field -->
                    <div class="form-group col-sm-6"><label for="active">Active:</label><input class="form-control"
                            name="active" type="text" id="active"></div><!-- Description Field -->
                    <div class="form-group col-sm-6"><label for="description">Description:</label><input
                            class="form-control" name="description" type="text" id="description"></div>
                </div>
            </div>

            <div class="card-footer"><input class="btn btn-primary" type="submit" value="Save"><a
                    href="{{route('product_files.detail.index', ['id' => 1, 'type_id' => 1])}}" class="btn btn-default"> Cancel </a></div>


        </div>
    </div>
@endsection
