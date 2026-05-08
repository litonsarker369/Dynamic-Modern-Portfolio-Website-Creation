@extends('admin.layouts.admin')

@section('title', 'Skills')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Skills</h2>
    <button class="btn btn-gradient" data-bs-toggle="modal" data-bs-target="#addSkillModal">
        <i class="fas fa-plus me-2"></i>Add Skill
    </button>
</div>

<div class="glass p-4">
    @if($skills->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Percentage</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                        <tr>
                            <td>{{ $skill->display_order }}</td>
                            <td>
                                @if($skill->icon_class)
                                    <i class="{{ $skill->icon_class }} me-2"></i>
                                @endif
                                {{ $skill->name }}
                            </td>
                            <td><span class="badge bg-gradient">{{ $skill->category }}</span></td>
                            <td>{{ $skill->percentage }}%</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editSkillModal{{ $skill->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this skill?')">
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
        <p class="text-muted mb-0">No skills added yet.</p>
    @endif
</div>

<div class="modal fade" id="addSkillModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header">
                <h5 class="modal-title">Add Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.skills.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Skill Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon Class (Font Awesome)</label>
                        <input type="text" name="icon_class" class="form-control" placeholder="fab fa-laravel">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" value="frontend" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Percentage (0-100)</label>
                        <input type="number" name="percentage" class="form-control" min="0" max="100">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="display_order" class="form-control" min="0" value="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gradient">Add Skill</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($skills as $skill)
    <div class="modal fade" id="editSkillModal{{ $skill->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content glass-modal">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Skill Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $skill->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Icon Class</label>
                            <input type="text" name="icon_class" class="form-control" value="{{ $skill->icon_class }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" name="category" class="form-control" value="{{ $skill->category }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Percentage</label>
                            <input type="number" name="percentage" class="form-control" value="{{ $skill->percentage }}" min="0" max="100">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="display_order" class="form-control" value="{{ $skill->display_order }}" min="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-gradient">Update Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
