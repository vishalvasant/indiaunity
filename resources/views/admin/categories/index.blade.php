@extends('admin.layouts.app')

@section('title', 'Categories Management')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Categories Management</h1>
            <p class="mb-0 text-muted">Create and manage blog categories</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                <i class="fas fa-plus me-2"></i>Create New Category
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total'] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Active Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['active'] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Blogs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_blogs'] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-blog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Most Popular</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                {{ $stats['most_popular']->name ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.categories.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           value="{{ request('search') }}" placeholder="Search by name or description...">
                </div>
                
                <div class="col-md-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="sort" class="form-label">Sort By</label>
                    <select class="form-select" id="sort" name="sort">
                        <option value="sort_order" {{ request('sort') == 'sort_order' ? 'selected' : '' }}>Sort Order</option>
                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                        <option value="blogs_count" {{ request('sort') == 'blogs_count' ? 'selected' : '' }}>Blog Count</option>
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                    </select>
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

    <!-- Categories Table -->
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Categories List</h6>
            <div>
                <button type="button" class="btn btn-sm btn-outline-secondary" id="reorderBtn">
                    <i class="fas fa-sort me-2"></i>Reorder Categories
                </button>
            </div>
        </div>
        <div class="card-body">
            @if($categories->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="categoriesTable">
                        <thead class="table-light">
                            <tr>
                                <th width="50">Order</th>
                                <th width="80">Color</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Blogs</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th width="120">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-categories">
                            @foreach($categories as $category)
                                <tr data-id="{{ $category->id }}">
                                    <td class="text-center">
                                        <i class="fas fa-grip-vertical text-muted handle" style="cursor: move;"></i>
                                        <span class="ms-2">{{ $category->sort_order }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="color-preview me-2" 
                                                 style="width: 30px; height: 30px; background-color: {{ $category->color }}; border-radius: 50%; border: 2px solid #ddd;"></div>
                                            @if($category->icon)
                                                <i class="{{ $category->icon }} text-muted"></i>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-bold">{{ $category->name }}</div>
                                        <small class="text-muted">{{ $category->slug }}</small>
                                    </td>
                                    <td>
                                        @if($category->description)
                                            {{ Str::limit($category->description, 60) }}
                                        @else
                                            <span class="text-muted">No description</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $category->blogs_count ?? 0 }}</span>
                                        @if($category->blogs_count > 0)
                                            <a href="{{ route('admin.blogs.index', ['category' => $category->id]) }}" 
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($category->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>{{ $category->created_at->format('M j, Y') }}</div>
                                        <small class="text-muted">{{ $category->created_at->format('g:i A') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-outline-primary" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editCategoryModal"
                                                    data-category="{{ json_encode($category) }}"
                                                    title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                            @if($category->blogs_count == 0)
                                                <form action="{{ route('admin.categories.destroy', $category) }}" 
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this category?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <button type="button" class="btn btn-sm btn-outline-danger" 
                                                        title="Cannot delete - has blogs" disabled>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($categories instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div>
                            <p class="text-muted mb-0">
                                Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} 
                                of {{ $categories->total() }} results
                            </p>
                        </div>
                        <div>
                            {{ $categories->appends(request()->query())->links() }}
                        </div>
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <i class="fas fa-tags fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No categories found</h5>
                    <p class="text-muted">
                        @if(request('search') || request('status'))
                            No categories match your current filters.
                        @else
                            No categories have been created yet.
                        @endif
                    </p>
                    @if(request('search') || request('status'))
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-times me-2"></i>Clear Filters
                        </a>
                    @else
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                            <i class="fas fa-plus me-2"></i>Create Your First Category
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Create Category Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Create New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="create_name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="create_name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="create_slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="create_slug" name="slug">
                        <div class="form-text">Leave empty to auto-generate</div>
                    </div>

                    <div class="mb-3">
                        <label for="create_description" class="form-label">Description</label>
                        <textarea class="form-control" id="create_description" name="description" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="create_color" class="form-label">Color</label>
                                <input type="color" class="form-control form-control-color" id="create_color" name="color" value="#007bff">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="create_icon" class="form-label">Icon (Font Awesome)</label>
                                <input type="text" class="form-control" id="create_icon" name="icon" placeholder="fas fa-newspaper">
                                <div class="form-text">e.g., fas fa-newspaper</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="create_is_active" name="is_active" value="1" checked>
                            <label class="form-check-label" for="create_is_active">
                                Active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="edit_slug" name="slug">
                    </div>

                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_color" class="form-label">Color</label>
                                <input type="color" class="form-control form-control-color" id="edit_color" name="color">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_icon" class="form-label">Icon (Font Awesome)</label>
                                <input type="text" class="form-control" id="edit_icon" name="icon" placeholder="fas fa-newspaper">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_is_active" name="is_active" value="1">
                            <label class="form-check-label" for="edit_is_active">
                                Active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-generate slug from name in create modal
        const createNameInput = document.getElementById('create_name');
        const createSlugInput = document.getElementById('create_slug');
        
        createNameInput.addEventListener('input', function() {
            if (!createSlugInput.value || createSlugInput.dataset.userModified !== 'true') {
                const slug = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');
                createSlugInput.value = slug;
            }
        });
        
        createSlugInput.addEventListener('input', function() {
            this.dataset.userModified = 'true';
        });
        
        // Handle edit modal
        const editModal = document.getElementById('editCategoryModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const category = JSON.parse(button.getAttribute('data-category'));
            
            document.getElementById('editCategoryForm').action = `/admin/categories/${category.id}`;
            document.getElementById('edit_name').value = category.name;
            document.getElementById('edit_slug').value = category.slug;
            document.getElementById('edit_description').value = category.description || '';
            document.getElementById('edit_color').value = category.color;
            document.getElementById('edit_icon').value = category.icon || '';
            document.getElementById('edit_is_active').checked = category.is_active;
        });
        
        // Auto-submit form on filter changes
        const statusSelect = document.getElementById('status');
        const sortSelect = document.getElementById('sort');
        
        [statusSelect, sortSelect].forEach(element => {
            element.addEventListener('change', function() {
                this.closest('form').submit();
            });
        });
        
        // Sortable functionality
        let sortable;
        const reorderBtn = document.getElementById('reorderBtn');
        const tbody = document.getElementById('sortable-categories');
        
        reorderBtn.addEventListener('click', function() {
            if (sortable) {
                // Disable sorting
                sortable.destroy();
                sortable = null;
                this.innerHTML = '<i class="fas fa-sort me-2"></i>Reorder Categories';
                this.classList.remove('btn-warning');
                this.classList.add('btn-outline-secondary');
            } else {
                // Enable sorting
                sortable = Sortable.create(tbody, {
                    handle: '.handle',
                    animation: 150,
                    onEnd: function(evt) {
                        // Update sort order
                        const items = Array.from(tbody.querySelectorAll('tr[data-id]'));
                        const sortData = items.map((item, index) => ({
                            id: item.dataset.id,
                            sort_order: index + 1
                        }));
                        
                        // Send AJAX request to update sort order
                        fetch('/admin/categories/reorder', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({ categories: sortData })
                        });
                    }
                });
                
                this.innerHTML = '<i class="fas fa-save me-2"></i>Finish Reordering';
                this.classList.remove('btn-outline-secondary');
                this.classList.add('btn-warning');
            }
        });
    });
</script>
@endpush
@endsection