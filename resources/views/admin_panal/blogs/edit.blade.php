@extends('admin_panal.mainbar')

@section('title', 'Edit Blog')

@section('main-section')

<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<style>
:root {
    --primary-color: #4e73df;
    --primary-hover: #3a5ccc;
    --success-color: #1cc88a;
    --danger-color: #e74a3b;
    --dark-color: #2c3e50;
    --light-color: #f8f9fc;
    --border-color: #e3e6f0;
}

.main-content {
    padding: 30px;
    transition: all 0.3s;
    margin-left: 110px;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.page-header h2 {
    font-size: 24px;
    font-weight: 700;
    color: var(--dark-color);
}

.btn-primary {
    background-color: var(--primary-color);
    color: white;
    padding: 10px 18px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-primary:hover { background-color: var(--primary-hover); }

.form-container {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}

.form-group { margin-bottom: 20px; }
.form-label { font-weight: 500; margin-bottom: 5px; display: block; }

.form-control, .form-select {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    box-sizing: border-box;
}

.form-control:focus, .form-select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
}

.title-with-generate {
    display: flex;
    align-items: center;
    gap: 10px;
}

#blog-title {
    flex: 1;
    padding: 12px 15px;
    border: 2px solid var(--border-color);
    border-radius: 8px;
    font-size: 16px;
}

#blog-title:focus {
    border-color: var(--primary-color);
    outline: none;
    box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
}

#generate-ai {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 6px rgba(102, 126, 234, 0.25);
}

#generate-ai:hover {
    background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(102, 126, 234, 0.3);
}

#generate-ai:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

#word-count {
    font-size: 13px;
    color: #888;
}

.text-danger { color: var(--danger-color); font-size: 13px; margin-top: 4px; display: block; }
.mt-2 { margin-top: 8px; }
</style>

<div class="main-content">
    <div class="page-header">
        <h2><i class="fas fa-edit"></i> Edit Blog</h2>
        <a href="{{ route('admin.blogs') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="form-container">
        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Blog Title --}}
            <div class="form-group">
                <label class="form-label" for="blog-title">Blog Title</label>
                <div class="title-with-generate">
                    <input
                        type="text"
                        name="name"
                        id="blog-title"
                        class="form-control"
                        value="{{ old('name', $blog->name) }}"
                        required
                    >
                    <button type="button" id="generate-ai">
                        🤖 Generate (AI)
                    </button>
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Category --}}
            <div class="form-group">
                <label class="form-label" for="blog-category">Category</label>
                <select name="category" id="blog-category" class="form-control" required>
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category', $blog->Category->id ?? '') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label class="form-label" for="blog-status">Status</label>
                <select name="Status" id="blog-status" class="form-select" required>
                    <option value="draft"     {{ old('Status', $blog->Status) == 'draft'     ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('Status', $blog->Status) == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="scheduled" {{ old('Status', $blog->Status) == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                </select>
                @error('Status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Short Description (CKEditor) --}}
            <div class="form-group">
                <label class="form-label" for="editor">Short Description</label>
                <textarea name="Description" id="editor" class="form-control" rows="5" required>
                    {!! old('Description', $blog->Description) !!}
                </textarea>
                <div class="mt-2">
                    <span id="word-count">Word Count: 0</span>
                </div>
                @error('Description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Thumbnail Image --}}
            <div class="form-group">
                <label class="form-label">Thumbnail Image</label>
                <input type="file" name="Thumbnail_Image" class="form-control" accept="image/*">
                @if($blog->Thumbnail_Image)
                    <div class="mt-2">
                        <img src="{{ asset($blog->Thumbnail_Image) }}" alt="Thumbnail" style="width:100px; height:auto; border-radius:5px;">
                        <small class="d-block">Current thumbnail</small>
                    </div>
                @endif
                @error('Thumbnail_Image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Banner Image --}}
            <div class="form-group">
                <label class="form-label">Banner Image</label>
                <input type="file" name="Banner_Image" class="form-control" accept="image/*">
                @if($blog->Banner_mage)
                    <div class="mt-2">
                        <img src="{{ asset($blog->Banner_mage) }}" alt="Banner" style="width:200px; height:auto; border-radius:5px;">
                        <small class="d-block">Current banner</small>
                    </div>
                @endif
                @error('Banner_Image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Resizeable Image --}}
            <div class="form-group">
                <label class="form-label">Resizeable Image</label>
                <input type="file" name="Resizeable_Image" class="form-control" accept="image/*">
                @if($blog->resize_image)
                    <div class="mt-2">
                        <img src="{{ asset($blog->resize_image) }}" alt="Resizeable" style="width:200px; height:auto; border-radius:5px;">
                        <small class="d-block">Current resizeable image</small>
                    </div>
                @endif
                @error('Resizeable_Image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Blog
            </button>
        </form>
    </div>
</div>

{{-- ✅ صرف ایک Script Block --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    let editorInstance = null;

    // ===========================
    // CKEditor Initialize
    // ===========================
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            editorInstance = editor;

            const wordCountEl = document.getElementById('word-count');

            function updateWordCount() {
                const text = editor.getData().replace(/<[^>]*>/g, '').replace(/\s+/g, ' ').trim();
                const count = text ? text.split(' ').length : 0;
                wordCountEl.textContent = 'Word Count: ' + count;
            }

            updateWordCount();
            editor.model.document.on('change:data', updateWordCount);
        })
        .catch(error => console.error('CKEditor Error:', error));


    // ===========================
    // AI Generate Button
    // ===========================
    const aiBtn = document.getElementById('generate-ai');

    aiBtn.addEventListener('click', function () {

        const title = document.getElementById('blog-title').value.trim();

        if (!title) {
            alert('پہلے title لکھیں');
            return;
        }

        if (!editorInstance) {
            alert('Editor ابھی load ہو رہا ہے، تھوڑا انتظار کریں');
            return;
        }

        // Loading state
        aiBtn.disabled = true;
        aiBtn.innerHTML = '⏳ Generating...';
        editorInstance.setData('<p>Content generate ہو رہا ہے... ⏳</p>');

        fetch("{{ route('admin.ai.generate') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ title: title })
        })
        .then(async res => {
            const text = await res.text();
            try {
                return JSON.parse(text);
            } catch (e) {
                console.error('Invalid JSON:', text);
                throw new Error('Server سے invalid response آیا');
            }
        })
        .then(data => {
            if (data.content) {
                editorInstance.setData(data.content);
            } else {
                editorInstance.setData('<p style="color:red;">Content نہیں ملا ❌</p>');
            }

            if (data.title) {
                document.getElementById('blog-title').value = data.title;
            }
        })
        .catch(err => {
            console.error('Error:', err);
            editorInstance.setData('<p style="color:red;">Error آ گیا: ' + err.message + ' ❌</p>');
        })
        .finally(() => {
            aiBtn.disabled = false;
            aiBtn.innerHTML = '🤖 Generate (AI)';
        });

    });

});
</script>

@endsection
