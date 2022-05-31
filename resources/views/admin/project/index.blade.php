@extends('admin.layouts.app')

@section('content')
<div class="main-container container-fluid" route="{{ route('project.more') }}">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">project List</h4>
            <a href="{{ route(request()->route()->getName().'.upsert') }}" class="d-block ms-auto">
                <button class=" btn btn-primary ">
                    <i class="icon ion-ios-add"></i>
                    Add New
                </button>
            </a>
        </div>
        <div class="card-body">
            <div class="append-container">
                @foreach($projects as $project)
                

                    <div class="row mt-4 $projects" id="project{{$project->id}}">
                        <div class="col-md-3">
                            <img width="260px" height="161px" src="@if($project->thumbnail) {{ asset('storage/project/small/'.$project->thumbnail->name) }} @else @endif" alt="{{ $project->tite_en }}">
                        </div>
                        <div class="col-md-9">
                            <h3 class="section_title">
                                {{ ucfirst($project->title) }}
                            </h3>
                            <p class="col-md-8 mx-0 px-0 sub-text">
                                {{ ucwords(substr(strip_tags($project->article),0,200)).'...' }}
                            </p>
                            <div class="d-flex align-items-center col-md-8 p-0">
                                <a href="{{ route('project.upsert',['project' => $project->id]) }}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <button class="btn-secondary mx-2 delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModel"  route="{{ route('project.delete',['project'=>$project->id]) }}" delete_id="{{ $project->id }}" callback="deleteproject">
                                    Delete
                                </button>
                            </div>
                        </div>
                        <div class="switcher mb-0 d-flex ms-auto">
                            <p class="sub-text m-0 feature-txt mx-2 mt-2"> Mark As Feature </p>
                            <div class="checkbox">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox feature switch"  route="{{ route('project.feature',['project'=>$project->id]) }}" id="myonoffswitch_{{$project->id}}" @if($project->feature) checked @endif>
                                <label class="onoffswitch-label mb-0" for="myonoffswitch_{{$project->id}}">
                                <span class="onoffswitch-inner"></span>
                            </div>
                        </div>
                    </div>

                   

                @endforeach

                <p class="empty_section w-100 text-center @if( $projects->total() )  d-none  @endif"> No projects Avaliable to Display </p>
               
            </div>
        </div>
    </div>
</div>
<div class="main-container container-fluid">
{{ $projects->links() }}
</div>
@section('component_script')
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script>


    function deleteproject(e) {

        $(`#project_${e.payload.id}`).remove();

        if( ! $('.projects').length ) {

            $('.empty_section').removeClass('d-none')

        }

        bootstrap.Modal.getInstance($('#deleteModel')).hide();

    }


</script>
@endsection
@endsection