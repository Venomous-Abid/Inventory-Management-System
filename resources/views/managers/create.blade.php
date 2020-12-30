@extends('layouts.app')

@section('content')
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><a href="{{route('manager.all_managers')}}"><i class="fa fa-user-secret" aria-hidden="true"></i>Create Manager</a></li>
            </ul>
        </div>
    </div>
    <div class="col-sm-12">
        <h4 class="section-subtitle">Create New Manager</h4>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('manager.save_created') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                              </div>
                              <div class="form-group">
                                  <label for="email">Email address</label>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label for="address">Address</label>
                                  <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label for="file">Upload Image</label>
                                  <input type="file" name="photo" id="file" placeholder="no file selected">
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
