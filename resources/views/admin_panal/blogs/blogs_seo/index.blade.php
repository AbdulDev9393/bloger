@extends('admin_panal.mainbar')

@section('title', 'Blog SEO')

@section('main-section')

<div class="container-fluid py-4">
    <div class="row">
                             <button type="button" id="generate-ai" class="btn btn-success mt-2">
                        🤖 Generate Content (AI)
                    </button>
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

                                <!-- Meta Keywords Field - Added -->
                                <div class="mb-4">
                                    <label for="meta_keywords" class="form-label fw-semibold">
                                        <i class="fas fa-tags me-1 text-info"></i>Meta Keywords
                                        <span class="text-muted float-end">
                                            <span id="keywordsCounter">0</span> keywords (comma separated)
                                        </span>
                                    </label>
                                    <input type="text" 
                                           class="form-control border-primary-subtle" 
                                           id="meta_keywords" 
                                           name="meta_keywords" 
                                           value="{{ old('meta_keywords', $blog_seo->keywords ?? '') }}"
                                           placeholder="SEO, laravel, meta tags, optimization, search engine"
                                           data-preview="keywords">
                                    <div class="form-text">
                                        Enter relevant keywords separated by commas. This helps search engines understand your content focus.
                                    </div>
                                    <div class="mt-2">
                                        <span class="badge bg-secondary" id="keywordSuggestionsTitle">Suggestions:</span>
                                        <div id="keywordSuggestions" class="mt-1">
                                            @php
                                                $titleWords = explode(' ', $blog->name);
                                                $suggestions = array_slice(array_unique($titleWords), 0, 5);
                                            @endphp
                                            @foreach($suggestions as $word)
                                                @if(strlen($word) > 3)
                                                    <span class="badge bg-light text-dark me-1 mb-1 suggestion-tag" style="cursor: pointer;" data-keyword="{{ strtolower($word) }}">{{ strtolower($word) }}</span>
                                                @endif
                                            @endforeach
                                        </div>
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
    .suggestion-tag:hover {
        background-color: #0d6efd !important;
        color: white !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Meta Title Character Counter
        const titleInput = document.getElementById('meta_title');
        const titleCounter = document.getElementById('titleCounter');
        const previewTitle = document.getElementById('previewTitle');
        
        function updateTitleCounter() {
            const length = titleInput.value.length;
            titleCounter.textContent = length;
            if (length > 60) {
                titleCounter.style.color = 'red';
                titleInput.classList.add('is-invalid');
            } else {
                titleCounter.style.color = '';
                titleInput.classList.remove('is-invalid');
            }
            // Update preview
            if (previewTitle) {
                previewTitle.textContent = titleInput.value.substring(0, 60) || '{{ Str::limit($blog->name, 60) }}';
            }
        }
        
        if (titleInput) {
            titleInput.addEventListener('input', updateTitleCounter);
            updateTitleCounter();
        }
        
        // Meta Description Character Counter
        const descInput = document.getElementById('meta_description');
        const descCounter = document.getElementById('descCounter');
        const previewDescription = document.getElementById('previewDescription');
        
        function updateDescCounter() {
            const length = descInput.value.length;
            descCounter.textContent = length;
            if (length > 160) {
                descCounter.style.color = 'red';
                descInput.classList.add('is-invalid');
            } else {
                descCounter.style.color = '';
                descInput.classList.remove('is-invalid');
            }
            // Update preview
            if (previewDescription) {
                previewDescription.textContent = descInput.value.substring(0, 160) || '{{ Str::limit(strip_tags($blog->description), 160) }}';
            }
        }
        
        if (descInput) {
            descInput.addEventListener('input', updateDescCounter);
            updateDescCounter();
        }
        
        // Meta Keywords Counter
        const keywordsInput = document.getElementById('meta_keywords');
        const keywordsCounter = document.getElementById('keywordsCounter');
        
        function updateKeywordsCounter() {
            if (keywordsInput.value.trim() === '') {
                keywordsCounter.textContent = '0 keywords';
                return;
            }
            const keywordCount = keywordsInput.value.split(',').filter(k => k.trim().length > 0).length;
            keywordsCounter.textContent = keywordCount + (keywordCount === 1 ? ' keyword' : ' keywords');
        }
        
        if (keywordsInput) {
            keywordsInput.addEventListener('input', updateKeywordsCounter);
            updateKeywordsCounter();
        }
        
        // Keyword suggestion click handler
        const suggestionTags = document.querySelectorAll('.suggestion-tag');
        suggestionTags.forEach(tag => {
            tag.addEventListener('click', function() {
                const keyword = this.getAttribute('data-keyword');
                if (keywordsInput) {
                    let currentValue = keywordsInput.value.trim();
                    let keywords = currentValue ? currentValue.split(',').map(k => k.trim()) : [];
                    if (!keywords.includes(keyword)) {
                        keywords.push(keyword);
                        keywordsInput.value = keywords.join(', ');
                        updateKeywordsCounter();
                    }
                }
            });
        });
        
        // Reset button functionality
        const resetBtn = document.querySelector('button[type="reset"]');
        const form = document.getElementById('seoForm');
        
        if (resetBtn) {
            resetBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const originalTitle = '{{ old('meta_title', $blog_seo->title ?? '') }}';
                const originalDesc = '{{ old('meta_description', $blog_seo->Description ?? '') }}';
                const originalKeywords = '{{ old('meta_keywords', $blog_seo->keywords ?? '') }}';
                
                if (titleInput) titleInput.value = originalTitle;
                if (descInput) descInput.value = originalDesc;
                if (keywordsInput) keywordsInput.value = originalKeywords;
                
                updateTitleCounter();
                updateDescCounter();
                updateKeywordsCounter();
            });
        }
    });
document.addEventListener('DOMContentLoaded', function () {

    const aiBtn = document.getElementById('generate-ai');

    if (aiBtn) {
        aiBtn.addEventListener('click', function () {

            // ✅ BLOG ID from Blade (IMPORTANT FIX)
            const blogId = "{{ $blog->id }}";

            if (!blogId) {
                alert('Blog ID missing');
                return;
            }

            aiBtn.disabled = true;
            aiBtn.innerHTML = '⏳ Generating...';

            fetch("{{ route('admin.ai.generate') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    blog_id: blogId   // ✅ sending ID instead of title
                })
            })
            .then(res => res.json())
            .then(data => {

                console.log('AI Response:', data);

                if (typeof editorInstance !== 'undefined') {
                    editorInstance.setData(data.content ?? '<p>No content ❌</p>');
                }

                if (data.title && document.getElementById('meta_title')) {
                    document.getElementById('meta_title').value = data.title;
                }

                aiBtn.disabled = false;
                aiBtn.innerHTML = '🤖 Generate Content (AI)';

            })
            .catch(err => {
                console.error(err);

                if (typeof editorInstance !== 'undefined') {
                    editorInstance.setData('<p style="color:red;">Error generating content ❌</p>');
                }

                aiBtn.disabled = false;
                aiBtn.innerHTML = '🤖 Generate Content (AI)';
            });

        });
    }

});
</script>

@endsection