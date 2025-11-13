@extends('admin.layouts.app')

@section('title', 'Inquiry Details')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.inquiries.index') }}">Inquiries</a></li>
                    <li class="breadcrumb-item active">Inquiry #{{ $inquiry->id }}</li>
                </ol>
            </nav>
            <h1 class="h3 mb-0 text-gray-800">Inquiry Details</h1>
        </div>
        <div>
            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Inquiries
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Inquiry Details -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Inquiry Information</h6>
                    @php
                        $statusClasses = [
                            'new' => 'bg-danger',
                            'in_progress' => 'bg-warning',
                            'resolved' => 'bg-success',
                            'closed' => 'bg-dark'
                        ];
                    @endphp
                    <span class="badge {{ $statusClasses[$inquiry->status] ?? 'bg-secondary' }} fs-6">
                        {{ ucfirst(str_replace('_', ' ', $inquiry->status)) }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Contact Information</h6>
                            <div class="mb-3">
                                <strong>Name:</strong> {{ $inquiry->name }}
                            </div>
                            <div class="mb-3">
                                <strong>Email:</strong> 
                                <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
                            </div>
                            @if($inquiry->phone)
                                <div class="mb-3">
                                    <strong>Phone:</strong> 
                                    <a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a>
                                </div>
                            @endif
                            @if($inquiry->country)
                                <div class="mb-3">
                                    <strong>Country:</strong> {{ $inquiry->country }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Inquiry Details</h6>
                            <div class="mb-3">
                                <strong>Submitted:</strong> {{ $inquiry->created_at->format('M j, Y \a\t g:i A') }}
                            </div>
                            <div class="mb-3">
                                <strong>Subject:</strong> {{ $inquiry->subject }}
                            </div>
                            @if($inquiry->responded_at)
                                <div class="mb-3">
                                    <strong>Responded:</strong> {{ $inquiry->responded_at->format('M j, Y \a\t g:i A') }}
                                </div>
                            @endif
                            @if($inquiry->respondedByAdmin)
                                <div class="mb-3">
                                    <strong>Responded by:</strong> {{ $inquiry->respondedByAdmin->name }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-muted mb-2">Message</h6>
                        <div class="p-3 bg-light rounded">
                            {{ $inquiry->message }}
                        </div>
                    </div>

                    @if($inquiry->admin_notes)
                        <div class="mb-4">
                            <h6 class="text-muted mb-2">Admin Notes</h6>
                            <div class="p-3 bg-info bg-opacity-10 rounded">
                                {{ $inquiry->admin_notes }}
                            </div>
                        </div>
                    @endif

                    @if($inquiry->ip_address || $inquiry->user_agent)
                        <div class="mb-4">
                            <h6 class="text-muted mb-2">Technical Information</h6>
                            @if($inquiry->ip_address)
                                <div class="mb-2">
                                    <strong>IP Address:</strong> <code>{{ $inquiry->ip_address }}</code>
                                </div>
                            @endif
                            @if($inquiry->user_agent)
                                <div>
                                    <strong>User Agent:</strong> <small class="text-muted">{{ $inquiry->user_agent }}</small>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Actions Sidebar -->
        <div class="col-lg-4">
            <!-- Status Update -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Status</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.inquiries.update', $inquiry) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                @foreach(App\Models\Inquiry::getStatuses() as $value => $label)
                                    <option value="{{ $value }}" {{ $inquiry->status == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="admin_notes" class="form-label">Admin Notes</label>
                            <textarea class="form-control" id="admin_notes" name="admin_notes" 
                                      rows="4" placeholder="Add notes about this inquiry...">{{ $inquiry->admin_notes }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save me-2"></i>Update Inquiry
                        </button>
                    </form>
                </div>
            </div>

            <!-- Quick Response -->
            @if($inquiry->status !== 'closed')
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Quick Response</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.inquiries.respond', $inquiry) }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="response_message" class="form-label">Response Message</label>
                                <textarea class="form-control" id="response_message" name="response_message" 
                                          rows="5" placeholder="Type your response here..." required></textarea>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mark_resolved" name="mark_resolved" value="1">
                                    <label class="form-check-label" for="mark_resolved">
                                        Mark as resolved after sending
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-paper-plane me-2"></i>Send Response
                            </button>
                        </form>
                    </div>
                </div>
            @endif

            <!-- Delete Inquiry -->
            @if($inquiry->status !== 'closed')
                <div class="card shadow border-danger">
                    <div class="card-header py-3 bg-danger text-white">
                        <h6 class="m-0 font-weight-bold">Danger Zone</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Once you delete this inquiry, there is no going back. Please be certain.</p>
                        
                        <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this inquiry? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash me-2"></i>Delete Inquiry
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Auto-scroll to notes section if there's an error
    @if($errors->any())
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('admin_notes').scrollIntoView({ behavior: 'smooth' });
        });
    @endif
</script>
@endpush
@endsection