@extends('admin.layouts.admin')

@section('title', 'Contact Info')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Contact Information</h2>
    <button class="btn btn-gradient" data-bs-toggle="modal" data-bs-target="#addContactModal">
        <i class="fas fa-plus me-2"></i>Add Contact
    </button>
</div>

<div class="glass p-4">
    @if($contacts->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Label</th>
                        <th>Value</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td><span class="badge bg-gradient">{{ $contact->type }}</span></td>
                            <td>
                                @if($contact->icon_class)
                                    <i class="{{ $contact->icon_class }} me-2"></i>
                                @endif
                                {{ $contact->label }}
                            </td>
                            <td>{{ $contact->value }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editContactModal{{ $contact->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.contact.destroy', $contact) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this contact info?')">
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
        <p class="text-muted mb-0">No contact information yet.</p>
    @endif
</div>

<div class="modal fade" id="addContactModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header">
                <h5 class="modal-title">Add Contact Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.contact.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-select" required>
                            <option value="email">Email</option>
                            <option value="phone">Phone</option>
                            <option value="address">Address</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" name="label" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Value</label>
                        <input type="text" name="value" class="form-control" placeholder="hello@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon Class</label>
                        <input type="text" name="icon_class" class="form-control" placeholder="fas fa-envelope">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="display_order" class="form-control" min="0" value="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gradient">Add Contact</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($contacts as $contact)
    <div class="modal fade" id="editContactModal{{ $contact->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content glass-modal">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Contact Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.contact.update', $contact) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-select" required>
                                <option value="email" {{ $contact->type == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="phone" {{ $contact->type == 'phone' ? 'selected' : '' }}>Phone</option>
                                <option value="address" {{ $contact->type == 'address' ? 'selected' : '' }}>Address</option>
                                <option value="other" {{ $contact->type == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Label</label>
                            <input type="text" name="label" class="form-control" value="{{ $contact->label }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Value</label>
                            <input type="text" name="value" class="form-control" value="{{ $contact->value }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Icon Class</label>
                            <input type="text" name="icon_class" class="form-control" value="{{ $contact->icon_class }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="display_order" class="form-control" value="{{ $contact->display_order }}" min="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-gradient">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
