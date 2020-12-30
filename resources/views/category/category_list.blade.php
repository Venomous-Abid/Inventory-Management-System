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
                <li><i class="fa fa-glass" aria-hidden="true"></i><a href="#">All Category Page</a></li>
            </ul>
        </div>
    </div>
<div class="row">
    <div class="col-sm-12">
      <h4 class="section-subtitle"><b>All</b> Category List</h4>
      <div class="panel">
          <div class="panel-content">
              <div class="row">
                  <!--LEFT TABS-->
                  <div class="col-md-12">
                      <div class="tabs tabs-vertical tabs-left ">
                          <!-- Tabs Header -->
                          <ul class="nav nav-tabs">
                              <li class="active"><a href="#home3" data-toggle="tab">Category</a></li>
                              <li><a href="#profile3" data-toggle="tab">Sub-Category</a></li>
                          </ul>
                          <!-- Tabs Content -->
                          <div class="tab-content">
                              <div class="tab-pane fade in active" id="home3">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <h4 class="section-subtitle">All Category Tab</h4>
                                     <div class="panel">
                                      <div class="panel-content">
                                          <table id="responsive-table" class="data-table table table-striped table-hover responsive nowrap" cellspacing="0" width="100%">
                                              <thead>
                                              <tr>
                                                  <th>No.</th>
                                                  <th>Name</th>
                                                  <th>Creator</th>
                                                  <th>created At</th>
                                                  <th>Action</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($categories as $item)
                                                  <tr>
                                                      <td>{{$item->id}}</td>
                                                      <td>{{$item->name}}</td>
                                                      <td>{{$item->user->name}}</td>
                                                      <td>{{ $item->created_at->format('d.m.Y') }}</td>
                                                      <td>
                                                        <div class="btn-group">
                                                             <a href="{{route('category.edit_category',$item->id)}}" class="btn fa fa-pencil btn-warning" data-toggle="tooltip" title="Edit"></a>
                                                             <form  action="{{route('category.delete_category')}}" method="post">
                                                               @csrf
                                                               <input type="hidden" name="category_id" value="{{$item->id}}"/>
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
                              <div class="tab-pane fade" id="profile3">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <h4 class="section-subtitle">All Sub-category Tab</h4>
                                     <div class="panel">
                                      <div class="panel-content">
                                          <table id="responsive-table" class="data-table table table-striped table-hover responsive nowrap" cellspacing="0" width="100%">
                                              <thead>
                                              <tr>
                                                  <th>No.</th>
                                                  <th>Name</th>
                                                  <th>Category Name</th>
                                                  <th>Creator</th>
                                                  <th>created At</th>
                                                  <th>Action</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($subcategories as $item)
                                                  <tr>
                                                      <td>{{$item->id}}</td>
                                                      <td>{{$item->name}}</td>
                                                      <td>{{$item->category->name}}</td>
                                                      <td>{{$item->user->name}}</td>
                                                      <td>{{ $item->created_at->format('d.m.Y') }}</td>
                                                      <td>
                                                        <div class="btn-group">
                                                             <a href="{{route('category.edit_subcategory',$item->id)}}" class="btn fa fa-pencil btn-warning" data-toggle="tooltip" title="Edit"></a>
                                                             <form  action="{{route('category.delete_subcategory')}}" method="post">
                                                               @csrf
                                                               <input type="hidden" name="subcategory_id" value="{{$item->id}}"/>
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
                          </div>
                      </div>
                  </div>
              </div>
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
