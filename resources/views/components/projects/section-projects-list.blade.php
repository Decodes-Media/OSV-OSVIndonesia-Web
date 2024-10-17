<section class="projects-list pt-0">
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-lg-5 px-4 px-md-3 mb-4 mb-lg-0">
                <h2>{{$data->title}}</h2>
            </div>
            <div class="col-12 col-lg-7 px-4 px-md-3">
               {!! $data->desc !!}
            </div>
        </div>
    </div>
    @if(!empty($projects))
        <div class="container projects-container">
            <div class="row">
                <div class="col-12">
                    @foreach($projects as $key => $project)
                        @php
                            $projectData = json_encode([
                                'name' => $project->name,
                                'location' => $project->location,
                                'image'=> [
                                    $project->image1_path ? public_url($project->image1_path) : null,
                                    $project->image2_path ? public_url($project->image2_path) : null,
                                    $project->image3_path ? public_url($project->image3_path) : null,
                                    $project->image4_path ? public_url($project->image4_path) : null,
                                    $project->image5_path ? public_url($project->image5_path) : null,
                                    $project->image6_path ? public_url($project->image6_path) : null,
                                    $project->image7_path ? public_url($project->image7_path) : null,
                                    $project->image8_path ? public_url($project->image8_path) : null,
                                    $project->image9_path ? public_url($project->image9_path) : null,
                                    $project->image10_path ? public_url($project->image10_path) : null,
                            ]]);

                        @endphp
                        <div class="grid-container-projects project-item" id="project{{$project->id}}">
                            <div class="grid-item-projects">
                                <a href="" data-toggle="modal" data-target="#project" data-project="{{$projectData}}">
                                    <div class="card--projects">
                                        <div class="card--projects__thumb">
                                            <img src="{{ public_url($project->image1_path) }}" alt="Project {{$project->name}} 1" class="img-fluid w-100">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="grid-item-projects">
                                <a href="" data-toggle="modal" data-target="#project" data-project="{{$projectData}}">
                                    <div class="card--projects">
                                        <div class="card--projects__thumb">
                                            <img src="{{ public_url($project->image2_path) }}" alt="Project {{$project->name}} 2" class="img-fluid w-100">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="grid-item-projects">
                                <a href="" data-toggle="modal" data-target="#project" data-project="{{$projectData}}">
                                    <div class="card--projects">
                                        <div class="card--projects__thumb">
                                            <img src="{{ public_url($project->image3_path) }}" alt="Project {{$project->name}} 3" class="img-fluid w-100">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="grid-item-projects projects-title">
                                <h3>
                                    {{$project->name}}
                                </h3>
                                <div class="d-flex">
                                    <img src="{{ asset('img/map-icon.png') }}" width="16px" height="16px" class="mt-1" />
                                    <p>
                                        {{$project->location}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="load-more-container text-center d-flex justify-content-center mt-4">
            <button id="load-more-btn" class="btn btn--outline-dark btn-magnetic">Load More</button>
        </div>
    @endif
</section>

<x-modals.modal-project-gallery />