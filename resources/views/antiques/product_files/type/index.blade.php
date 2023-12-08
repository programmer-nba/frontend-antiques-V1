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
                      <li class="breadcrumb-item"><a href="{{route('product_files.index')}}">เพิ่มหมวดหมู่สินค้า</a></li>
                      <li class="breadcrumb-item active" aria-current="page">เพิ่มประเภทสินค้า</li>
                    </ol>
                  </nav>
                  <h3>หน้าเพิ่มประเภทสินค้าสำหรับหมวดหมู่ 001 - กระดาษ</h3>
                <div style="float:right;">
                    <modal modal-id="add" title="เพิ่มประเภทสินค้า" button-text="เพิ่มประเภทสินค้า" class-name="btn btn-primary" icon-name="fa fa-plus">
                        <form role="form" method="POST" action="{{route('product_files.store')}}">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">ชื่อประเภทสินค้า (ไทย)</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="category_name_th" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">ชื่อประเภทสินค้า (English)</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="category_name_en">
                                </div>
                            </div>
                            กำหนดราคาตามลูกค้าแต่ละประเภท
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">ประเภทลูกค้า</th>
                                    <th scope="col">ราคา</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">A</th>
                                    <td>
                                        <input type="text" class="form-control" value="65">
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">B</th>
                                    <td>
                                        <input type="text" class="form-control" value="65">

                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">C</th>
                                    <td>
                                        <input type="text" class="form-control" value="65">

                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">D</th>
                                    <td>
                                        <input type="text" class="form-control" value="65">

                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              
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
                            <th>หมวดหมู่สินค้า</th>
                            <th>ชื่อประเภท (ไทย)</th>
                            <th>ชื่อประเภท (English)</th>
                            <th>ราคาตามลูกค้า</th>
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
                            <td>
                                Paper
                              </td>
                              <td>
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">ประเภทลูกค้า</th>
                                        <th scope="col">ราคา</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">A</th>
                                        <td>
                                            <input type="text" class="form-control" value="65" disabled>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">B</th>
                                        <td>
                                            <input type="text" class="form-control" value="65" disabled>
    
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">C</th>
                                        <td>
                                            <input type="text" class="form-control" value="65" disabled>
    
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">D</th>
                                        <td>
                                            <input type="text" class="form-control" value="65" disabled>
    
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                              </td>
                            <td class="text-center">
                                <a href="{{route('product_files.detail.index', ['id' => 1, 'type_id' => 1])}}" class="btn btn-primary mr-2"><i class="fa fa-plus mr-2"></i>เพิ่มรายละเอียดสินค้า</a>
                                <a href="{{route('product_files.type.edit', 1)}}" class="btn btn-warning mr-2"><i class="fa fa-edit "></i></a>
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
