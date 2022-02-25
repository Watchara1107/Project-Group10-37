@extends('layouts.admin.master')
@section('content')
    <header class="bg-white shadow-sm px-4 py-3 z-index-20">
        <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">แก้ไขสินค้า</h2>
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
                            <h3 class="h4 mb-0">แก้ไขสินค้า</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/product/update/'.$edit->id) }}" method="POST" enctype='multipart/form-data'>
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="name">ชื่อสินค้า</label>
                                    <input class="form-control" id="name" type="text" name="name"
                                        value="{{ $edit->name }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="price">ราคาสินค้า</label>
                                    <input class="form-control" id="price" type="text" name="price"
                                        value="{{ $edit->price }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="detail">รายละเอียดสินค้า</label>
                                    <textarea class="form-control" name="detail" id="" cols="20"
                                        rows="5">{{ $edit->detail }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="col-sm-3 form-label" for="image">รูปภาพสินค้า</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" id="image" type="file" name="image" accept="image/*" onchange="loadFile(event)">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <img id="output" src="{{ asset('admin/images/' . $edit->image) }}"
                                        width="150px">
                                </div>
                                <div class="mt-4">
                                <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script>
        var loadFile = function(event) {
          var reader = new FileReader();
          reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
          };
          reader.readAsDataURL(event.target.files[0]);
        };
      </script>
@endsection
