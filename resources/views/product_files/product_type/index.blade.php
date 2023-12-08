@extends('layouts.app')

@section('content')


    <section class="content-header">
    
    </section>

    <div class="content px-3">

          
        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">รายชื่อสินค้า - Product Files</h3>
            </div>

            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">หมวดหมู่สินค้า</a></li>
                      <li class="breadcrumb-item active" aria-current="page">กระดาษ</li>
                    </ol>
                  </nav>
                <div style="float:right;">
                    <modal modal-id="add" title="เพิ่มประเภทสินค้า" button-text="เพิ่มประเภทสินค้า" class-name="btn btn-primary" icon-name="fa fa-plus">
                        <form role="form" method="POST" action="{{route('product_files.store')}}">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">ชื่อประเภทสินค้า</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="category_name_th" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">ชื่อสินค้า (English)</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="category_name_en">
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger mr-2 float-right" data-dismiss="modal">
                                <i class="fa fa-times mr-2"></i>ปิด
                              </button>
                              <button @click="!loading" type="submit" class="btn btn-success float-right mr-2" > <div v-if="loading" class="spinner-border spinner-border-sm" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>
                     <i class="fa fa-save mr-2"></i>บันทึก</button>
                        </form>
                      </modal>&nbsp;&nbsp;
                </div>
                <br><br>
               
                  
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 10px">#</th>
                            <th>ชื่อสินค้า (ไทย)</th>
                            <th>ชื่อสินค้า (English)</th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1.</td>
                            <td>กระดาษ</td>
                            <td>
                              Paper
                            </td>
                            <td class="text-center">
                                <button class="btn btn-primary mr-2"><i class="fa fa-plus mr-2"></i>เพิ่มประเภทสินค้า</button>
                                <button class="btn btn-warning mr-2"><i class="fa fa-edit "></i></button>
                                <form onsubmit="return confirm('Do you really want to submit the form?');" action="#" method="post" style="display: inline">
                                    @csrf
                                    <button  type="submit" class="btn btn-danger mr-2"><i class="fa fa-trash "></i></button>
                                </form>                                
                                {{-- <modal title="คุณต้องการลบข้อมูลนี้หรือไม่" button-text="" class-name="btn btn-danger" icon-name="fa fa-trash" modal-id="remove">
                                    <form role="form" method="POST" action="{{route('product_files.store')}}">
                                        @csrf
                                        <div class="form-group">
                                          <h2> คุณต้องการลบข้อมูลนี้หรือไม่?</h2>
                                        </div>
                                        <button type="submit" class="btn btn-danger mr-2 float-right" data-dismiss="modal">
                                            <i class="fa fa-times mr-2"></i>ต้องการลบ
                                          </button>
                                        
                                    </form>
                                  </modal> --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
