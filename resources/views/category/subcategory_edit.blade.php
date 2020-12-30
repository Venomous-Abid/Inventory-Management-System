@extends('layouts.app')

@section('additional_headers')
    <!--Select with searching & tagging-->
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap.min.css') }}">
@endsection
@section('content')
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-glass" aria-hidden="true"></i><a href="#">Edit Category Page</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="panel-title">Edit Category</h3>
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
                      <div class="row">
                        <form action="{{route('category.update_subcategory')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}"/>
                                <label for="subcategory name">Sub-category Name</label>
                                <input type="text" class="form-control" id="subcategory_name" value="{{$subcategory->name}}" name="subcategory_name" placeholder="Sub-category Name">
                            </div>
                            <div class="form-group">
                                 <label for="select2-example-basic" class="control-label">Select Category</label>
                                 <select name="category" id="select2-example-basic" class="form-control" style="width: 100%">
                                     <optgroup label="Select Category">
                                       @foreach($categories as $category)
                                         <option value="{{$category->id}}" @isset($subcategory){{ $subcategory->category_id == $category->id ? 'selected': '' }} @endisset label="{{$category->name}}">{{$category->name}}</option>
                                       @endforeach
                                     </optgroup>
                                 </select>
                             </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
</div>
@endsection
@section('additional_scripts')
    <!--Select with searching & tagging-->
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <!--Examples-->
    <script src="{{ asset('javascripts/examples/forms/advanced.js') }}"></script>
@endsection
