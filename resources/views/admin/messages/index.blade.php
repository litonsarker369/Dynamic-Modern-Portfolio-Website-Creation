@extends('admin.layouts.admin')

@section('title', 'Messages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Messages</h2>
</div>

<div class="glass p-4">
    @if($messages->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                        <tr class="{{ !$msg->is_read ? 'table-active fw-bold' : '' }}">
                            <td>
                                @if($msg->is_read)
                                    <span class="badge bg-secondary">Read</span>
                                @else
                                    <span class="badge bg-primary">New</span>
                                @endif
                            </td>
                            <td>{{ $msg->name }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ Str::limit($msg->subject, 30) ?? '—' }}</td>
                            <td>{{ $msg->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this message?')">
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
        <p class="text-muted mb-0">No messages yet.</p>
    @endif
</div>
@endsection
