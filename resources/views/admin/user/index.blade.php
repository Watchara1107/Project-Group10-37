@extends('layouts.admin.master')
@section('content')
    <header class="bg-white shadow-sm px-4 py-3 z-index-20">
        <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Users</h2>
        </div>
    </header>
    <section class="tables">
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="card mb-0">
                        <div class="card-header">
                            <div class="card-close">
                            </div>
                            <h3 class="h4 mb-0">ตารางผู้ใช้งานระบบ</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Eamil</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)


                                        <tr>
                                            <th scope="row">{{ $users->firstItem()+$loop->index }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="{{ url('admin/user/edit/'.$user->id) }}" class="btn btn-warning">
                                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                                        <use xlink:href="#ballpoint-pen-1"> </use>
                                                    </svg>แก้ไข</a>
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
