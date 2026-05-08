@extends('admin.layouts.admin')

@section('title', 'About Me')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">About Me</h2>
</div>

<div class="glass p-4">
    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $about?->name) }}" placeholder="Your name">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Headline</label>
                            <input type="text" name="headline" class="form-control @error('headline') is-invalid @enderror"
                                   value="{{ old('headline', $about?->headline) }}" placeholder="e.g. Full-Stack Developer">
                    @error('headline') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control @error('bio') is-invalid @enderror"
                              rows="10">{{ old('bio', $about?->bio) }}</textarea>
                    @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Resume URL</label>
                    <input type="url" name="resume_url" class="form-control @error('resume_url') is-invalid @enderror"
                           value="{{ old('resume_url', $about?->resume_url) }}" placeholder="https://drive.google.com/...">
                    @error('resume_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror"
                           accept="image/jpeg,image/png,image/webp" onchange="previewImage(this)">
                    @error('profile_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <img id="imagePreview" class="img-fluid mt-3 rounded-circle"
                         src="{{ $about?->profile_image_url ?? 'https://ui-avatars.com/api/?name=Profile&size=300&background=667eea&color=fff' }}"
                         style="max-width:200px">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-gradient">
            <i class="fas fa-save me-2"></i>Save Changes
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
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
