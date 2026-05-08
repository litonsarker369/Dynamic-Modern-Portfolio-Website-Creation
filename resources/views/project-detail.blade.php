@extends('layouts.app')

@section('title', $project->title)
@section('meta_description', Str::limit($project->description, 160))

@section('content')
<section class="project-detail-hero py-5 mt-5">
    <div class="container">
        <a href="{{ route('home') }}#portfolio" class="btn btn-outline-light mb-4">
            <i class="fas fa-arrow-left me-2"></i>Back to Portfolio
        </a>
        <div class="row">
            <div class="col-lg-8 mx-auto" data-aos="fade-up">
                <div class="project-detail-card glass p-4">
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="img-fluid rounded mb-4 w-100">
                    <span class="badge bg-gradient mb-3">{{ $project->category }}</span>
                    <h1 class="display-5 fw-bold mb-3">{{ $project->title }}</h1>

                    @if($project->date)
                        <p class="text-muted mb-3">
                            <i class="far fa-calendar-alt me-2"></i>{{ $project->date->format('F Y') }}
                        </p>
                    @endif

                    <div class="project-description mt-4">
                        <p class="lead">{{ $project->description }}</p>
                    </div>

                    @if($project->project_url)
                        <a href="{{ $project->project_url }}" target="_blank" class="btn btn-gradient mt-3">
                            <i class="fas fa-external-link-alt me-2"></i>View Live Project
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@if($otherProjects->count() > 0)
<section class="section related-projects">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Other <span class="gradient-text">Projects</span></h2>
            <div class="section-divider"></div>
        </div>
        <div class="row g-4">
            @foreach($otherProjects as $related)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="project-card glass">
                        <div class="project-image">
                            <img src="{{ $related->image_url }}" alt="{{ $related->title }}" class="img-fluid">
                            <div class="project-overlay">
                                <a href="{{ route('project.show', $related->slug) }}" class="btn btn-light btn-sm">View Details</a>
                            </div>
                        </div>
                        <div class="project-info p-4">
                            <span class="project-category badge bg-gradient mb-2">{{ $related->category }}</span>
                            <h4>{{ $related->title }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
