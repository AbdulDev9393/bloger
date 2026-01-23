@extends('admin_panal.mainbar')

@section('title', 'Blog SEO')

@section('main-section')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-1 text-dark">
                                <i class="fas fa-search me-2 text-primary"></i>SEO Settings
                            </h4>
                            <p class="text-muted mb-0">Optimize "{{ $blog->name }}" for search engines</p>
                        </div>
                        <a href="{{ route('admin.blogs') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back to Blogs
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.blogs.update.seo', $blog->id) }}" method="POST" id="seoForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Left Column - Main SEO Fields -->
                            <div class="col-lg-8">
                                <div class="seo-preview-card mb-4 p-4 border rounded bg-light">
                                    <h6 class="text-muted mb-3">
                                        <i class="fas fa-eye me-2"></i>Search Engine Preview
                                    </h6>
                                    <div class="preview-container">
                                        <div class="preview-title text-primary mb-1" id="previewTitle">
                                            {{ old('meta_title', $blog->meta_title) ?: Str::limit($blog->name, 60) }}
                                        </div>
                                        <div class="preview-url text-success small mb-2" id="previewUrl">
                                            {{ config('app.url') }}/blogs/{{ old('slug', $blog->slug) ?: Str::slug($blog->name) }}
                                        </div>
                                        <div class="preview-description text-muted" id="previewDescription">
                                            {{ old('meta_description', $blog->meta_description) ?: Str::limit(strip_tags($blog->description), 160) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="meta_title" class="form-label fw-semibold">
                                        <i class="fas fa-heading me-1 text-info"></i>Meta Title
                                        <span class="text-muted float-end">
                                            <span id="titleCounter">0</span>/60 characters
                                        </span>
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg border-primary-subtle" 
                                           id="meta_title" 
                                           name="meta_title" 
                                           value="{{ old('meta_title', $blog_seo->title ?? '') }}"
                                           placeholder="Enter a compelling title for search results"
                                          
                                           data-preview="title">
                                    <div class="form-text">
                                        The title tag is displayed in search engine results. Keep it under 60 characters.
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="meta_description" class="form-label fw-semibold">
                                        <i class="fas fa-align-left me-1 text-info"></i>Meta Description
                                        <span class="text-muted float-end">
                                            <span id="descCounter">0</span>/160 characters
                                        </span>
                                    </label>
                                    <textarea class="form-control border-primary-subtle" 
                                              id="meta_description" 
                                              name="meta_description" 
                                              rows="4" 
                                              placeholder="Write a brief and engaging description that encourages clicks"
                                             
                                              data-preview="description">{{ old('meta_description', $blog_seo->Description ?? '') }}</textarea>

                                    <div class="form-text">
                                        This description appears in search results. Aim for 150-160 characters.
                                    </div>
                                </div>

                             
                            </div>

                            <!-- Right Column - Slug and Actions -->
                            <div class="col-lg-4">
                                <div class="sticky-top" style="top: 20px;">
                                  

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                            <i class="fas fa-save me-2"></i>Save SEO Settings
                                        </button>
                                        <button type="reset" class="btn btn-outline-secondary">
                                            <i class="fas fa-redo me-2"></i>Reset Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .preview-container {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 16px;
    }
    .preview-title {
        font-size: 18px;
        font-weight: 600;
        color: #1a0dab;
        line-height: 1.3;
        cursor: pointer;
    }
    .preview-title:hover {
        text-decoration: underline;
    }
    .preview-url {
        color: #006621;
        font-size: 14px;
    }
    .preview-description {
        font-size: 14px;
        line-height: 1.4;
        color: #545454;
    }
    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
    }
    .card {
        border-radius: 12px;
        overflow: hidden;
    }
    .card-header {
        border-radius: 12px 12px 0 0 !important;
    }
</style>


@endsection