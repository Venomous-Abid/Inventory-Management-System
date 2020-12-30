@extends('layouts.app')

@section('additional_headers')
    <!--dataTable-->
    <link rel="stylesheet" href="{{ asset('vendor/data-table/media/css/dataTables.bootstrap.min.css') }}">
    <!-- dataTable Columns hiding responsive-->
    <link rel="stylesheet" href="{{ asset('vendor/data-table/extensions/Responsive/css/responsive.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-user-plus" aria-hidden="true"></i><a href="#">All Marketing Staff Page</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <h4 class="section-subtitle">All Marketing Staff's Page</h4>
         <div class="panel">
          <div class="panel-content">
              <table id="responsive-table" class="data-table table table-striped table-hover responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>created At</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($staffs as $item)
                      <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->user->name}}</td>
                          <td>{{$item->user->email}}</td>
                          <td>{{$item->phone}}</td>
                          <td>{{ $item->created_at->format('d.m.Y') }}</td>
                          <td>
                            <div class="btn-group">
                                 <a href="{{ route('staff.details',$item->id) }}" class="btn fa fa-eye btn-primary"></a>
                                 <a href="{{ route('staff.edit',$item->id) }}" class="btn fa fa-pencil btn-warning" data-toggle="tooltip" title="Edit"></a>
                                 <form  action="{{ route('staff.delete') }}" method="post">
                                   @csrf
                                   <input type="hidden" name="staff_id" value="{{$item->id}}"/>
                                   <button class="btn fa fa-trash btn-danger" data-toggle="tooltip" title="Delete"></button>
                                 </form>
                             </div>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
     </div>
    </div>

</div>
@endsection
@section('additional_scripts')
  <!--dataTable-->
  <script src="{{ asset('vendor/data-table/media/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/data-table/media/js/dataTables.bootstrap.min.js') }}"></script>
  <!-- dataTable Columns hiding responsive-->
  <script src="{{ asset('vendor/data-table/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('vendor/data-table/extensions/Responsive/js/responsive.bootstrap.min.js') }}"></script>
  <!--Examples-->
  <script src="{{ asset('javascripts/examples/tables/data-tables.js') }}"></script>
@endsection
