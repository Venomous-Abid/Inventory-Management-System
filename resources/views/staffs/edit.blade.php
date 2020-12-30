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
        <div class="panel">
            <div class="panel-header">
                <h3 class="panel-title">Edit Staff Page</h3>
                <div class="panel-actions">
                    <ul>
                        <li class="action toggle-panel panel-expand"><span></span></li>
                        <li class="action"><span class="fa fa-bars action" aria-hidden="true"></span></li>
                        <li class="action remove-panel"><span class="fa fa-times action" aria-hidden="true"></span></li>
                    </ul>
                </div>
            </div>
            <div class="panel-content">
              <div class="row">
                  <div class="col-md-12">
                      <form action="{{ route('staff.save_edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="staff_id" value="{{$staff->id}}">
                                <input type="hidden" name="user_id" value="{{$staff->user_id}}">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$staff->user->name}}" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$staff->user->email}}" placeholder="Email">
                            </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="phone">Phone Number</label>
                                  <input type="number" class="form-control" name="phone" id="phone" value="{{$staff->phone}}" placeholder="Phone Number">
                              </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{$staff->address}}" placeholder="Address">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6" style="margin-top: 5px;">
                                <img src="/staff_photo/{{ $staff->image }}" alt="{{ $staff->image }}" style="width: 70px; height: 70px; margin-left: 9rem">
                              </div>
                              <div class="col-md-6" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label for="file">Upload Image</label>
                                    <input type="file" name="photo" id="file" placeholder="no file selected">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                               <label for="select2-example-basic" class="col-sm-6 control-label">Stuff Type</label>
                               <select name="type_staff" id="select2-example-basic" class="form-control" style="width: 100%">
                                 <option value="0" @isset($staff){{ $staff->access_level == 'Marketing' ? 'selected': '' }} @endisset>Marketing</option>
                                 <option value="1" @isset($staff){{ $staff->access_level == 'Account' ? 'selected': '' }} @endisset>Accounts</option>
                               </select>
                            </div>
                          </div>
                          <div class="col-md-12" style="margin-top: 5px;">
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
</div>
@endsection
