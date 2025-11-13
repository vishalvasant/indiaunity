@extends('admin.layouts.app')

@section('title', 'Inquiries Management')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Inquiries Management</h1>
            <p class="mb-0 text-muted">Manage customer inquiries and responses</p>
        </div>
        <div>
            <span class="badge bg-primary fs-6">{{ $inquiries->total() }} Total Inquiries</span>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <ul class="nav nav-tabs card-header-tabs" id="inquiryTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request('status') == '' ? 'active' : '' }}" 
                       href="{{ route('admin.inquiries.index') }}">
                        <i class="fas fa-list me-2"></i>All Inquiries
                        <span class="badge bg-secondary ms-2">{{ $counts['all'] ?? 0 }}</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request('status') == 'new' ? 'active' : '' }}" 
                       href="{{ route('admin.inquiries.index', ['status' => 'new']) }}">
                        <i class="fas fa-exclamation-circle me-2"></i>New
                        <span class="badge bg-danger ms-2">{{ $counts['new'] ?? 0 }}</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request('status') == 'in_progress' ? 'active' : '' }}" 
                       href="{{ route('admin.inquiries.index', ['status' => 'in_progress']) }}">
                        <i class="fas fa-clock me-2"></i>In Progress
                        <span class="badge bg-warning ms-2">{{ $counts['in_progress'] ?? 0 }}</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request('status') == 'resolved' ? 'active' : '' }}" 
                       href="{{ route('admin.inquiries.index', ['status' => 'resolved']) }}">
                        <i class="fas fa-check-circle me-2"></i>Resolved
                        <span class="badge bg-success ms-2">{{ $counts['resolved'] ?? 0 }}</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request('status') == 'closed' ? 'active' : '' }}" 
                       href="{{ route('admin.inquiries.index', ['status' => 'closed']) }}">
                        <i class="fas fa-times-circle me-2"></i>Closed
                        <span class="badge bg-dark ms-2">{{ $counts['closed'] ?? 0 }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.inquiries.index') }}" class="row g-3">
                <input type="hidden" name="status" value="{{ request('status') }}">
                
                <div class="col-md-4">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           value="{{ request('search') }}" placeholder="Search by name, email, subject...">
                </div>
                
                <div class="col-md-3">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-select" id="country" name="country">
                        <option value="">All Countries</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="date_from" class="form-label">Date From</label>
                    <input type="date" class="form-control" id="date_from" name="date_from" 
                           value="{{ request('date_from') }}">
                </div>
                
                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search me-2"></i>Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Inquiries Table -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ request('status') ? ucfirst(str_replace('_', ' ', request('status'))) . ' ' : '' }}Inquiries
            </h6>
        </div>
        <div class="card-body">
            @if($inquiries->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inquiries as $inquiry)
                                <tr>
                                    <td>{{ $inquiry->id }}</td>
                                    <td>
                                        <strong>{{ $inquiry->name }}</strong>
                                        @if($inquiry->phone)
                                            <br><small class="text-muted">{{ $inquiry->phone }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $inquiry->email }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $inquiry->subject }}</div>
                                        <small class="text-muted">{{ Str::limit($inquiry->message, 50) }}</small>
                                    </td>
                                    <td>
                                        @if($inquiry->country)
                                            <span class="badge bg-light text-dark">{{ $inquiry->country }}</span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $statusClasses = [
                                                'new' => 'bg-danger',
                                                'in_progress' => 'bg-warning',
                                                'resolved' => 'bg-success',
                                                'closed' => 'bg-dark'
                                            ];
                                        @endphp
                                        <span class="badge {{ $statusClasses[$inquiry->status] ?? 'bg-secondary' }}">
                                            {{ ucfirst(str_replace('_', ' ', $inquiry->status)) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div>{{ $inquiry->created_at->format('M j, Y') }}</div>
                                        <small class="text-muted">{{ $inquiry->created_at->format('g:i A') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" 
                                               class="btn btn-sm btn-outline-primary" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            
                                            @if($inquiry->status !== 'closed')
                                                <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" 
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <p class="text-muted mb-0">
                            Showing {{ $inquiries->firstItem() }} to {{ $inquiries->lastItem() }} 
                            of {{ $inquiries->total() }} results
                        </p>
                    </div>
                    <div>
                        {{ $inquiries->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No inquiries found</h5>
                    <p class="text-muted">
                        @if(request('search') || request('status') || request('country'))
                            No inquiries match your current filters.
                        @else
                            No inquiries have been submitted yet.
                        @endif
                    </p>
                    @if(request('search') || request('status') || request('country'))
                        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-times me-2"></i>Clear Filters
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Auto-submit form on status change
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const countrySelect = document.getElementById('country');
        
        // Auto-submit on country change
        countrySelect.addEventListener('change', function() {
            this.closest('form').submit();
        });
        
        // Submit search on Enter key
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.closest('form').submit();
            }
        });
    });
</script>
@endpush
@endsection