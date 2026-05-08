@extends('admin.layouts.admin')

@section('title', 'Edit Project')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Edit Project</h2>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back
    </a>
</div>

<div class="glass p-4">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title', $project->title) }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                              rows="6" required>{{ old('description', $project->description) }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control @error('category') is-invalid @enderror"
                           value="{{ old('category', $project->category) }}" required>
                    @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Project URL</label>
                    <input type="url" name="project_url" class="form-control @error('project_url') is-invalid @enderror"
                           value="{{ old('project_url', $project->project_url) }}">
                    @error('project_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                           value="{{ old('date', $project->date?->format('Y-m-d')) }}">
                    @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                           accept="image/jpeg,image/png,image/webp" onchange="previewImage(this)">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <img id="imagePreview" class="img-fluid mt-2 rounded"
                         src="{{ $project->image_url }}" style="max-height:200px">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="featured" class="form-check-input" id="featured" value="1"
                           {{ $project->featured ? 'checked' : '' }}>
                    <label class="form-check-label" for="featured">Featured Project</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="is_published" class="form-check-input" id="is_published" value="1"
                           {{ $project->is_published ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Published</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-gradient">
            <i class="fas fa-save me-2"></i>Update Project
        </button>
    </form>
</div>
@endsection

@push('scripts')
<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
