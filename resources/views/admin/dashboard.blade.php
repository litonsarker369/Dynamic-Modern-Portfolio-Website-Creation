@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Dashboard</h2>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card glass p-4 text-center">
            <div class="stat-icon mb-2">
                <i class="fas fa-folder-open fa-2x gradient-text"></i>
            </div>
            <h3 class="stat-number">{{ $projectCount }}</h3>
            <p class="stat-label">Total Projects</p>
            <small class="text-muted">{{ $publishedProjects }} published</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card glass p-4 text-center">
            <div class="stat-icon mb-2">
                <i class="fas fa-code fa-2x gradient-text"></i>
            </div>
            <h3 class="stat-number">{{ $skillCount }}</h3>
            <p class="stat-label">Skills</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card glass p-4 text-center">
            <div class="stat-icon mb-2">
                <i class="fas fa-envelope fa-2x gradient-text"></i>
            </div>
            <h3 class="stat-number">{{ $totalMessages }}</h3>
            <p class="stat-label">Total Messages</p>
            <small class="text-muted">{{ $unreadMessages }} unread</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card glass p-4 text-center">
            <div class="stat-icon mb-2">
                <i class="fas fa-users fa-2x gradient-text"></i>
            </div>
            <h3 class="stat-number">1</h3>
            <p class="stat-label">Admin Users</p>
        </div>
    </div>
</div>

<div class="glass p-4">
    <h4 class="mb-3">Recent Messages</h4>
    @if($recentMessages->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentMessages as $msg)
                        <tr>
                            <td>{{ $msg->name }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ $msg->subject ?? 'No subject' }}</td>
                            <td>{{ $msg->created_at->diffForHumans() }}</td>
                            <td>
                                @if($msg->is_read)
                                    <span class="badge bg-secondary">Read</span>
                                @else
                                    <span class="badge bg-primary">New</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-primary mt-3">View All Messages</a>
    @else
        <p class="text-muted mb-0">No messages yet.</p>
    @endif
</div>
@endsection
