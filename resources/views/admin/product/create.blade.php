@extends('layouts.admin.master')
@section('content')
    <header class="bg-white shadow-sm px-4 py-3 z-index-20">
        <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">เพิ่มสินค้า</h2>
        </div>
    </header>

    <section class="forms">
        <div class="container-fluid">
          <div class="row">
            <!-- Basic Form-->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-close">

                  </div>
                  <h3 class="h4 mb-0">เพิ่มสินค้า</h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('create.product') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="mb-3">
                      <label class="form-label" for="name">ชื่อสินค้า</label>
                      <input class="form-control" id="name" type="text" name="name">
                      @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="price">ราคาสินค้า</label>
                        <input class="form-control" id="price" type="text" name="price">
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                    <div class="mb-3">
                        <label class="form-label" for="detail">รายละเอียดสินค้า</label>
                        <textarea class="form-control" name="detail" id="" cols="20" rows="5"></textarea>
                      </div>

                      <div class="mb-3">
                        <label class="col-sm-3 form-label" for="formFile">รูปภาพสินค้า</label>
                        <div class="col-sm-12">
                          <input class="form-control" id="formFile" type="file" name="image">
                        </div>
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                    <button class="btn btn-primary" type="submit">บันทึก</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </section>

@endsection
