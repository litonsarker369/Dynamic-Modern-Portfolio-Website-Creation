@extends('admin.layouts.admin')

@section('title', 'Projects')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Projects</h2>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-gradient">
        <i class="fas fa-plus me-2"></i>New Project
    </a>
</div>

<div class="glass p-4">
    @if($projects->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Featured</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td><span class="badge bg-gradient">{{ $project->category }}</span></td>
                            <td>{{ $project->date?->format('M d, Y') ?? '—' }}</td>
                            <td>{!! $project->featured ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                            <td>{!! $project->is_published ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                            <td>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this project?')">
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
        <p class="text-muted mb-0">No projects yet. <a href="{{ route('admin.projects.create') }}">Create one</a>.</p>
    @endif
</div>
@endsection
