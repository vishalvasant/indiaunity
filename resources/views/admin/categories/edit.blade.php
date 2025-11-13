@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li class="breadcrumb-item active">Edit: {{ $category->name }}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Categories
            </a>
            <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-info">
                <i class="fas fa-eye me-2"></i>View Category
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Information</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $category->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="color" class="form-label">Color</label>
                                    <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror" 
                                           id="color" name="color" value="{{ old('color', $category->color) }}">
                                    @error('color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                           id="slug" name="slug" value="{{ old('slug', $category->slug) }}">
                                    <div class="form-text">Leave empty to auto-generate from name</div>
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="icon" class="form-label">Icon (Font Awesome)</label>
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                           id="icon" name="icon" value="{{ old('icon', $category->icon) }}" placeholder="fas fa-newspaper">
                                    <div class="form-text">e.g., fas fa-newspaper</div>
                                    @error('icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                       value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active
                                </label>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </a>
                                @if($category->blogs_count == 0)
                                    <button type="button" class="btn btn-outline-danger ms-2" 
                                            onclick="confirmDelete()">
                                        <i class="fas fa-trash me-2"></i>Delete Category
                                    </button>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Category
                            </button>
                        </div>
                    </form>

                    @if($category->blogs_count == 0)
                        <form id="deleteForm" action="{{ route('admin.categories.destroy', $category) }}" 
                              method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Preview</h6>
                </div>
                <div class="card-body">
                    <div class="category-preview p-3 border rounded" id="categoryPreview">
                        <div class="d-flex align-items-center mb-2">
                            <div class="color-preview me-3" 
                                 style="width: 40px; height: 40px; background-color: {{ $category->color }}; border-radius: 50%; border: 2px solid #ddd;"></div>
                            <div>
                                <h6 class="mb-0" id="previewName">{{ $category->name }}</h6>
                                <small class="text-muted" id="previewSlug">{{ $category->slug }}</small>
                            </div>
                            <div class="ms-auto">
                                <i class="{{ $category->icon ?: 'fas fa-newspaper' }} text-muted" id="previewIcon"></i>
                            </div>
                        </div>
                        <p class="text-muted mb-0" id="previewDescription">{{ $category->description ?: 'No description available.' }}</p>
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Statistics</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="border-end">
                                <h4 class="text-primary mb-1">{{ $category->blogs_count ?? 0 }}</h4>
                                <small class="text-muted">Blog Posts</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <h4 class="text-{{ $category->is_active ? 'success' : 'secondary' }} mb-1">
                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                            </h4>
                            <small class="text-muted">Status</small>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="small text-muted">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Created:</span>
                            <span>{{ $category->created_at->format('M j, Y') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Updated:</span>
                            <span>{{ $category->updated_at->format('M j, Y') }}</span>
                        </div>
                    </div>

                    @if($category->blogs_count > 0)
                        <hr>
                        <a href="{{ route('admin.blogs.index', ['category' => $category->id]) }}" 
                           class="btn btn-outline-primary btn-sm w-100">
                            <i class="fas fa-blog me-2"></i>View Related Blogs
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const colorInput = document.getElementById('color');
        const iconInput = document.getElementById('icon');
        const descriptionInput = document.getElementById('description');
        
        const previewName = document.getElementById('previewName');
        const previewSlug = document.getElementById('previewSlug');
        const previewColor = document.querySelector('.color-preview');
        const previewIcon = document.getElementById('previewIcon');
        const previewDescription = document.getElementById('previewDescription');
        
        // Auto-generate slug from name
        nameInput.addEventListener('input', function() {
            if (!slugInput.dataset.userModified) {
                const slug = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');
                slugInput.value = slug;
                previewSlug.textContent = slug;
            }
            previewName.textContent = this.value;
        });
        
        slugInput.addEventListener('input', function() {
            this.dataset.userModified = 'true';
            previewSlug.textContent = this.value;
        });
        
        // Update color preview
        colorInput.addEventListener('input', function() {
            previewColor.style.backgroundColor = this.value;
        });
        
        // Update icon preview
        iconInput.addEventListener('input', function() {
            previewIcon.className = this.value || 'fas fa-newspaper text-muted';
        });
        
        // Update description preview
        descriptionInput.addEventListener('input', function() {
            previewDescription.textContent = this.value || 'No description available.';
        });
    });

    function confirmDelete() {
        if (confirm('Are you sure you want to delete this category? This action cannot be undone.')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@endpush
@endsection