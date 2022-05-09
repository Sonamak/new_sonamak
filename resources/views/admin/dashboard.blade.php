@extends('admin.layouts.app')

@section('content')
<div class="chart mt-4 container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Tour</h4>
        </div>
        <div class="card-content">
          <div class="tour container">

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mt-4">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Destination</h4>
        </div>
        <div class="card-content">
          <div class="destination container">

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mt-4">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Hotel</h4>
        </div>
        <div class="card-content">
          <div class="hotel container">

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mt-4">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Blog</h4>
        </div>
        <div class="card-content">
          <div class="blog container">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('component_script')
<script src="{{ asset('admin/js/charts.js') }}"></script>
<script>
  charts('.tour','Tour',null,'area')
  charts('.hotel','Hotel',200)
  charts('.destination','Destination',200)
  charts('.blog','Blog',200)
</script>
@endsection