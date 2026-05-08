@extends('admin.layouts.admin')

@section('title', 'Social Links')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Social Links</h2>
    <button class="btn btn-gradient" data-bs-toggle="modal" data-bs-target="#addSocialModal">
        <i class="fas fa-plus me-2"></i>Add Link
    </button>
</div>

<div class="glass p-4">
    @if($links->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Platform</th>
                        <th>URL</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($links as $link)
                        <tr>
                            <td>{{ $link->display_order }}</td>
                            <td>
                                @if($link->icon_class)
                                    <i class="{{ $link->icon_class }} me-2"></i>
                                @endif
                                {{ $link->platform }}
                            </td>
                            <td><a href="{{ $link->url }}" target="_blank" class="text-truncate d-inline-block" style="max-width:300px">{{ $link->url }}</a></td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editSocialModal{{ $link->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.social-links.destroy', $link) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this link?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-muted mb-0">No social links yet.</p>
    @endif
</div>

<div class="modal fade" id="addSocialModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header">
                <h5 class="modal-title">Add Social Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.social-links.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Platform</label>
                        <input type="text" name="platform" class="form-control" placeholder="GitHub" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">URL</label>
                        <input type="url" name="url" class="form-control" placeholder="https://github.com/username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon Class (Font Awesome)</label>
                        <input type="text" name="icon_class" class="form-control" placeholder="fab fa-github">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="display_order" class="form-control" min="0" value="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gradient">Add Link</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($links as $link)
    <div class="modal fade" id="editSocialModal{{ $link->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content glass-modal">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Social Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.social-links.update', $link) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Platform</label>
                            <input type="text" name="platform" class="form-control" value="{{ $link->platform }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL</label>
                            <input type="url" name="url" class="form-control" value="{{ $link->url }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Icon Class</label>
                            <input type="text" name="icon_class" class="form-control" value="{{ $link->icon_class }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="display_order" class="form-control" value="{{ $link->display_order }}" min="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-gradient">Update Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
