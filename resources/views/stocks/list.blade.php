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
                <li><i class="fa fa-bell" aria-hidden="true"></i><a href="#">All Stock Page</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <h4 class="section-subtitle">All Stock's Page</h4>
         <div class="panel">
          <div class="panel-content">
              <table id="responsive-table" class="data-table table table-striped table-hover responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Recent</th>
                      <th>WithDraw</th>
                      <th>Ware House</th>
                      <th>Creator</th>
                      <th>Created At</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($stocks as $item)
                      <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->product->name}}</td>
                          <td>{{$item->recent}}</td>
                          <td>{{$item->withdraw}}</td>
                          <td>{{$item->warehouse}}</td>
                          <td>{{$item->user->name}}</td>
                          <td>{{$item->created_at->format('d.m.Y')}}</td>
                          <td>
                            <div class="btn-group">
                                 <a data-stockid="{{ $item->id }}" data-toggle="modal" data-target="#success-modal" class="btn fa fa-plus-circle btn-primary"></a>
                                 <a data-stockid="{{ $item->id }}" data-toggle="modal" data-target="#info-modal" class="btn fa fa-minus-circle btn-info"></a>
                                 <a data-stockid="{{ $item->id }}" data-toggle="modal" data-target="#warning-modal" class="btn fa fa-pencil btn-warning"></a>
                                 <form  action="{{ route('stock.delete') }}" method="post">
                                   @csrf
                                   <input type="hidden" name="stock_id" value="{{$item->id}}"/>
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


<!-- Add Stock -->
<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="modal-success-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-success-label"><i class="fa fa-check"></i>Add Stock</h4>
            </div>
            <div class="modal-body">
              <form action="{{route('stock.save_allstock')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Add new  Stock</label>
                    <input type="hidden" name="stock_id" id="stock_id" value="">
                    <input name="restock" type="text" class="form-control" placeholder="Newly added Stock">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Ok</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Withdraw Stock -->
<div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-info"></i>Withdraw Stock</h4>
            </div>
            <div class="modal-body">
              <form action="{{route('stock.save_withdraw')}}" method="POST">
              @csrf
                <div class="form-group">
                    <label>Withdraw amount of Stock</label>
                    <input type="hidden" name="stock_id" id="stock_id" value="">
                    <input type="text" class="form-control" name="withdraw" placeholder="Withdraw from Stock">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Ok</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Stock -->
<div class="modal fade" id="warning-modal" tabindex="-1" role="dialog" aria-labelledby="modal-warning-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-warning-label"><i class="fa fa-exclamation"></i>Edit or Reset Stock</h4>
            </div>
            <div class="modal-body">
              <form action="{{route('stock.save_edit')}}" method="POST">
              @csrf
                <div class="form-group">
                    <label>Stock</label>
                    <input type="hidden" name="stock_id" id="stock_id" value="">
                    <input name="stock" type="text" class="form-control" placeholder="Stock amount">
                </div>
                <div class="form-group">
                    <label for="warehouse">WareHouse</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Location of storage">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Ok</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('additional_scripts')
<script type="text/javascript">
    <!-- Add Stock -->
    $('#success-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var stockId = button.data('stockid')
        var modal = $(this)
        modal.find('.modal-body #stock_id').val(stockId);
    })
    <!-- Withdraw Stock -->
    $('#info-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var stockId = button.data('stockid')
        var modal = $(this)
        modal.find('.modal-body #stock_id').val(stockId);
    })
    <!-- Edit Stock -->
    $('#warning-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var stockId = button.data('stockid')
        var modal = $(this)
        modal.find('.modal-body #stock_id').val(stockId);
    })
</script>
  <!--dataTable-->
  <script src="{{ asset('vendor/data-table/media/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/data-table/media/js/dataTables.bootstrap.min.js') }}"></script>
  <!-- dataTable Columns hiding responsive-->
  <script src="{{ asset('vendor/data-table/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('vendor/data-table/extensions/Responsive/js/responsive.bootstrap.min.js') }}"></script>
  <!--Examples-->
  <script src="{{ asset('javascripts/examples/tables/data-tables.js') }}"></script>
@endsection
