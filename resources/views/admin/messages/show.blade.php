@extends('admin.layouts.admin')

@section('title', 'Message from ' . $message->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Message Detail</h2>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Inbox
    </a>
</div>

<div class="glass p-4">
    <div class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $message->name }}</p>
                <p><strong>Email:</strong> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
            </div>
            <div class="col-md-6">
                <p><strong>Date:</strong> {{ $message->created_at->format('F d, Y h:i A') }}</p>
                <p>
                    <strong>Status:</strong>
                    @if($message->is_read)
                        <span class="badge bg-secondary">Read</span>
                    @else
                        <span class="badge bg-primary">New</span>
                    @endif
                </p>
            </div>
        </div>
        <p><strong>Subject:</strong> {{ $message->subject ?? 'No subject' }}</p>
    </div>

    <hr>

    <div class="mt-4">
        <h5>Message:</h5>
        <p class="lead" style="white-space: pre-wrap;">{{ $message->message }}</p>
    </div>

    <div class="mt-4">
        <a href="mailto:{{ $message->email }}" class="btn btn-gradient">
            <i class="fas fa-reply me-2"></i>Reply via Email
        </a>
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Delete this message?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash me-2"></i>Delete
            </button>
        </form>
    </div>
</div>
@endsection
