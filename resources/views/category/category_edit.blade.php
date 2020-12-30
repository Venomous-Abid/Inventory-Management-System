@extends('layouts.app')

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
                      <form action="{{route('category.update_category')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="category_id" value="{{$category->id}}"/>
                                <label for="category name">Category Name</label>
                                <input type="text" class="form-control" id="category_name" value="{{$category->name}}" name="category_name" placeholder="Category Name">
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
</div>
@endsection
