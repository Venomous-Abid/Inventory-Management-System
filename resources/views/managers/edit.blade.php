@extends('layouts.app')


@section('content')
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-user-secret" aria-hidden="true"></i><a href="{{ route('manager.all_managers') }}">All Manager Page</a></li>
                <li><a>Edit Manager</a></li>
            </ul>
        </div>
    </div>

  <div class="row">
    <div class="col-sm-12">
        <h4 class="section-subtitle">Edit Manager Page</h4>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('manager.save_edit') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <input type="hidden" name="manager_id" value="{{$manager->id}}">
                                  <input type="hidden" name="user_id" value="{{$manager->user_id}}">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control" id="name" name="name" value="{{ $manager->user->name }}" placeholder="Full Name">
                              </div>
                              <div class="form-group">
                                  <label for="email">Email address</label>
                                  <input type="email" class="form-control" id="email" name="email" value="{{ $manager->user->email }}" placeholder="Email">
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" class="form-control" name="phone" value="{{ $manager->phone }}" id="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label for="address">Address</label>
                                  <input type="text" class="form-control" id="address" value="{{ $manager->address }}" name="address" placeholder="Address">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="row" style="margin-top: 5px;">
                                <div class="col-md-6">
                                  <img src="/manager_photo/{{ $manager->image }}" alt="{{ $manager->image }}" style="width: 70px; height: 70px; margin-left: 24rem">
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="file">Upload Image</label>
                                      <input type="file" name="photo" id="file" placeholder="no file selected">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group" style="margin-top: 5px;">
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
</div>
@endsection
