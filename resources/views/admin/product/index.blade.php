@extends('layouts.admin.master')
@section('content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <div class="row">
     <div class="col-12">
     @if (session('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'บันทึกข้อมูลเรียบร้อย',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
        @endif
        @if (session('edit'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'แก้ไขข้อมูลเรียบร้อย',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
        @endif
        @if (session('del'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'ลบข้อมูลเรียบร้อย',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
        @endif
    <header class="bg-white shadow-sm px-4 py-3 z-index-20">
        <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Products</h2>
        </div>
    </header>
    <section class="tables">
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="card mb-0">
                        <div class="card-header">
                            <div class="card-close">

                                <a href="{{ route('from.product') }}" class="btn btn-success">
                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                        <use xlink:href="#add-1"> </use>
                                    </svg>เพิ่มข้อมูลสินค้า</a>
                            </div>
                            <h3 class="h4 mb-0">ตารางสินค้า</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $products->firstItem()+$loop->index }}</th>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                <img src="{{ asset('admin/images/'.$product->image) }}" alt="" width="150px">
                                            </td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->detail }}</td>
                                            <td>
                                                <a href="{{ url('admin/product/edit/'.$product->id) }}" class="btn btn-warning">
                                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                                        <use xlink:href="#ballpoint-pen-1"> </use>
                                                    </svg>แก้ไข</a>

                                                <a href="{{ url('admin/product/delete/'.$product->id) }}" class="btn btn-danger">
                                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                                        <use xlink:href="#close-1"> </use>
                                                    </svg>ลบ</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

    </section>


@endsection
