@extends('layouts.app')

@section('content')

<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-bell" aria-hidden="true"></i><a href="#">Create Stock</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="panel-title">Create a New Stock</h3>
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
                      <form action="{{ route('stock.save_created') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                               <label class="control-label">Product</label>
                               <select id="product" name="product" class="form-control" style="width: 100%">
                                 <option value="none" selected="" disabled="">Select a Product</option>
                                 @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                 @endforeach
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="stock">Amount of Stock</label>
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Add stock">
                            </div>
                            <div class="form-group">
                                <label for="warehouse">WareHouse</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Location of storage">
                            </div>
                          </div>

                          <div class="col-md-12" style="margin-top:10px;">
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
