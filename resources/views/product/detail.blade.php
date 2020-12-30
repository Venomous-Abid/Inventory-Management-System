@extends('layouts.app')

@section('content')
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-user-secret" aria-hidden="true"></i><a href="#">All Product Page</a></li>
                <li><a>Product Details</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-6">
          <img src="/product_photo/{{ $product->image }}" alt="{{ $product->image }}" width="300" height="350" style="background-repeat: no-repeat;background-attachment: fixed;background-size: cover;"/>
      </div>
      <div class="col-md-6 col-lg-6">
        <h3 style="text-transform: uppercase; font-weight:bold; font-size:30px; margin-bottom:20px;">{{ $product->name }}</h3>
        <dd style="font-size:20px; margin-bottom:10px;"><b>Category:</b><span style="margin-left: .5rem;"> {{ $product->category->name }}</span></dd>
        <dd style="font-size:20px; margin-bottom:10px;"><b>Sub-category:</b><span style="margin-left: .5rem;"> {{ $product->subcategory->name }}</span></dd>
        <dd style="font-size:20px; margin-bottom:10px;"><b>Category:</b><span style="margin-left: .5rem;"> {{ $product->color }} Taka</span></dd>
      </div>
      <div class="col-md-12 col-lg-12" style="margin-top:20px;">
        <h4><b>Details:</b></h4>
        <p>{{ $product->desc_product }}</p>
      </div>
  </div>

</div>
@endsection
