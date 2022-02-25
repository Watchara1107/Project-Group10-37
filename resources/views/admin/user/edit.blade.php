@extends('layouts.admin.master')
@section('content')
    <header class="bg-white shadow-sm px-4 py-3 z-index-20">
        <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">แก้ไขสมาชิก</h2>
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
                  <h3 class="h4 mb-0">แก้ไขสมาชิก</h3>
                </div>
                <div class="card-body">
                  <form action="{{ url('admin/user/update/'.$users->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label" for="name">Name</label>
                      <input class="form-control" id="name" type="text" name="name" value="{{ $users->name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" id="username" type="text" name="username" value="{{ $users->username }}">
                      </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{ $users->email }}">
                      </div>




                    <button class="btn btn-primary" type="submit">Update</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </section>

@endsection
