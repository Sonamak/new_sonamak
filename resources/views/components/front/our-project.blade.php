<section class="mt-3">
    <div class="row">
        @foreach($projects as $project)
        <div class="col-md-6 mt-3">
            <div class="project_container w-100" style="background: {{ $project->background }} " ;>
                <div class="d-flex justify-content-center">
                    <div class="project_info w-50 pt-3">
                        <h2 class="text-white font-bold project_name">{{ ucfirst($project->title) }}</h2>
                        <div class="project_tecnologies mt-4">
                            <h3 class="project_subtitle text-white">Technologies</h3>
                            <p class="">{{ ucfirst($project->tecnology) }}</p>
                        </div>
                        <div class="project_languagies mt-5">
                            <h3 class="project_subtitle text-white">Languages</h3>
                            @foreach($project->coders as $coder)
                            <p>{{ ucfirst($coder->name) }}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="mockup_layout w-50">
                        <img src="@if($project->mockup) {{ asset('storage/project/large/'.$project->mockup->name) }} @else {{ asset('storage/system/large/project_mockup.png') }} @endif"
                            alt="mockup" class="my-auto w-100">
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class="w-50">
                        <a href="{{ route('project.show',['project'=>$project->id]) }}">
                            <button class="btn btn-primary text-white">
                                View Project
                            </button>
                        </a>
                    </div>
                    <div class="coders_logos w-50">
                        <div class="row justify-between w-100 ps-5">
                            @foreach($project->coders as $coder)
                            <div class="w-25 mx-2">
                                @if($coder->thumbnail)
                                <img src="{{ asset('storage/coder/small/'.$coder->thumbnail->name) }}" alt="coder"
                                    width="45px">
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
