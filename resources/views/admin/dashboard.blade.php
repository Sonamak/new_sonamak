@extends('admin.layouts.app')

@section('content')
<div class="chart mt-4 container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Projects</h4>
        </div>
        <div class="card-content">
          <div class="projects container">

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mt-4">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Badget</h4>
        </div>
        <div class="card-content">
          <div class="badget container">

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mt-4">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Staticals</h4>
        </div>
        <div class="card-content">
          <div class="staticals container">

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mt-4">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Partners</h4>
        </div>
        <div class="card-content">
          <div class="partner container">

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mt-4">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Coders</h4>
        </div>
        <div class="card-content">
          <div class="coders container">

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mt-4">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Socials</h4>
        </div>
        <div class="card-content">
          <div class="socials container">

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
  charts('.projects','Project',null,'area')
  charts('.badget','Badget',200)
  charts('.staticals','Statical',200)
  charts('.partner','Partner',200)
  charts('.social','Social',200)
  charts('.coders','Coder',200)
  charts('.socials','Social',200)
</script>
@endsection