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
                <li><i class="fa fa-glass" aria-hidden="true"></i><a href="#">Add Category Page</a></li>
            </ul>
        </div>
    </div>

  <div class="row animated fadeInUp">
     <!--HORZONTAL TABS-->
     <div class="col-sm-12">
         <div class="panel">
             <div class="panel-content">
                 <div class="row">
                     <!--BASE TABS-->
                     <div class="col-md-12">
                         <h5><b>Add</b> Category and Sub-Category</h5>
                         <div class="tabs">
                             <!-- Tabs Header -->
                             <ul class="nav nav-tabs">
                                 <li class="active"><a href="#home" data-toggle="tab">Category</a></li>
                                 <li><a href="#profile" data-toggle="tab">Sub-Category</a></li>
                             </ul>
                             <!-- Tabs Content -->
                             <div class="tab-content">
                                 <div class="tab-pane fade in active" id="home">
                                   <h4 class="section-subtitle"><b>Add</b> New Category</h4>
                                   <form action="{{ route('category.save_category') }}" method="POST">
                                     @csrf
                                     <div class="col-md-12"  style="margin-top:20px !important">
                                       <div class="form-group">
                                           <label for="category name">Category Name</label>
                                           <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name">
                                       </div>
                                       <div class="form-group">
                                           <button type="submit" class="btn btn-primary">Submit</button>
                                       </div>
                                     </div>
                                   </form>
                                 </div>
                                 <div class="tab-pane fade" id="profile">
                                   <h4 class="section-subtitle"><b>Add</b> New Sub-Category</h4>
                                   <form class="form-horizontal form-stripe" action="{{ route('category.save_subcategory') }}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <div class="col-md-12" style="margin-top:20px !important">
                                       <div class="form-group">
                                           <label for="subcategory name">Sub-category Name</label>
                                           <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Sub-category Name">
                                       </div>
                                       <div class="form-group">
                                            <label for="select2-example-basic" class="control-label">Select Category</label>
                                            <select name="category" id="select2-example-basic" class="form-control" style="width: 100%">
                                                <optgroup label="Select Category">
                                                  @foreach($categories as $category)
                                                    <option value="{{$category->id}}" label="{{$category->name}}">{{$category->name}}</option>
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
   </div>
</div>
@endsection
@section('additional_scripts')
    <!--Select with searching & tagging-->
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <!--Examples-->
    <script src="{{ asset('javascripts/examples/forms/advanced.js') }}"></script>
@endsection
