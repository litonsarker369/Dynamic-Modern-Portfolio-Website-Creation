@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section id="home" class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7" data-aos="fade-right">
                <p class="hero-subtitle mb-2">Hello, I'm</p>
                <h1 class="hero-title display-3 fw-bold mb-3">{{ $about?->name ?? 'John Developer' }}</h1>
                <p class="hero-description lead mb-4">
                    {{ $about?->headline ?? 'Full-Stack Developer & UI/UX Designer' }}
                </p>
                <div class="hero-cta mb-4">
                    <a href="#portfolio" class="btn btn-gradient me-3">View My Work</a>
                    <a href="#contact" class="btn btn-outline-light">Get In Touch</a>
                </div>
                <div class="hero-social">
                    @foreach($socialLinks as $link)
                        <a href="{{ $link->url }}" target="_blank" rel="noopener" class="social-icon me-3">
                            <i class="{{ $link->icon_class }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 text-center" data-aos="fade-left">
                <div class="hero-image-wrapper">
                    <div class="hero-shape"></div>
                    <img src="{{ $about?->profile_image_url ?? 'https://ui-avatars.com/api/?name=John+Developer&size=400&background=667eea&color=fff&bold=true' }}"
                         alt="Profile" class="hero-image img-fluid rounded-circle">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="section about-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">About <span class="gradient-text">Me</span></h2>
            <div class="section-divider"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="about-card glass p-5">
                    @if($about)
                        <p class="about-text lead">{!! nl2br(e($about->bio)) !!}</p>
                        @if($about->resume_url)
                            <a href="{{ $about->resume_url }}" target="_blank" class="btn btn-gradient mt-3">
                                <i class="fas fa-download me-2"></i>Download Resume
                            </a>
                        @endif
                    @else
                        <p class="about-text lead">Welcome to my portfolio! I'm a passionate developer creating amazing digital experiences.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="section skills-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">My <span class="gradient-text">Skills</span></h2>
            <div class="section-divider"></div>
        </div>
        <div class="row g-4">
            @foreach($skills as $skill)
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                    <div class="skill-card glass text-center p-4">
                        <div class="skill-icon mb-3">
                            <i class="{{ $skill->icon_class ?? 'fas fa-code' }} fa-2x"></i>
                        </div>
                        <h5 class="skill-name mb-3">{{ $skill->name }}</h5>
                        @if($skill->percentage)
                            <div class="progress skill-progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $skill->percentage }}%"
                                     aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <span class="skill-percentage mt-2 d-block">{{ $skill->percentage }}%</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="portfolio" class="section portfolio-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">My <span class="gradient-text">Portfolio</span></h2>
            <div class="section-divider"></div>
        </div>

        <div class="filter-buttons text-center mb-4" data-aos="fade-up">
            <button class="btn btn-filter active" data-filter="all">All</button>
            @foreach($categories as $category)
                <button class="btn btn-filter" data-filter="{{ Str::slug($category) }}">{{ $category }}</button>
            @endforeach
        </div>

        <div class="row g-4 portfolio-grid">
            @forelse($projects as $project)
                <div class="col-md-6 col-lg-4 portfolio-item" data-category="{{ Str::slug($project->category) }}" data-aos="fade-up">
                    <div class="project-card glass">
                        <div class="project-image">
                            <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="img-fluid">
                            <div class="project-overlay">
                                <a href="{{ route('project.show', $project->slug) }}" class="btn btn-light btn-sm">View Details</a>
                            </div>
                        </div>
                        <div class="project-info p-4">
                            <span class="project-category badge bg-gradient mb-2">{{ $project->category }}</span>
                            <h4 class="project-title">{{ $project->title }}</h4>
                            <p class="project-description text-muted">{{ Str::limit($project->description, 100) }}</p>
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" class="project-link">
                                    Live Demo <i class="fas fa-external-link-alt ms-1"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="lead text-muted">No projects to display yet. Check back soon!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section id="contact" class="section contact-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Get In <span class="gradient-text">Touch</span></h2>
            <div class="section-divider"></div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="contact-info glass p-4">
                    <h4 class="mb-4">Contact Information</h4>
                    @foreach($contactInfo as $info)
                        <div class="contact-item d-flex align-items-center mb-3">
                            <div class="contact-icon me-3">
                                <i class="{{ $info->icon_class ?? 'fas fa-info' }}"></i>
                            </div>
                            <div>
                                <strong>{{ $info->label }}</strong>
                                <p class="mb-0">{{ $info->value }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="contact-form glass p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Your Name" value="{{ old('name') }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Your Email" value="{{ old('email') }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                                   placeholder="Subject" value="{{ old('subject') }}">
                            @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                      rows="5" placeholder="Your Message" required>{{ old('message') }}</textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-gradient w-100">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
