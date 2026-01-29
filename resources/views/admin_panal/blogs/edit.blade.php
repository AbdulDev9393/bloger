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

.page-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:30px; }
.page-header h2 { font-size:24px; font-weight:700; color:var(--dark-color); }
.btn-primary { background-color: var(--primary-color); color:white; padding:10px 18px; border-radius:8px; border:none; }
.btn-primary:hover { background-color: var(--primary-hover); }

.form-container {
    background: white;
    padding: 30px;
    border-radius:12px;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}
.form-group { margin-bottom:20px; }
.form-label { font-weight:500; margin-bottom:5px; display:block; }
.form-control, .form-select { width:100%; padding:10px 15px; border:1px solid var(--border-color); border-radius:8px; }
.form-control:focus, .form-select:focus { outline:none; border-color:var(--primary-color); box-shadow:0 0 0 3px rgba(78,115,223,0.1); }

/* Auto Generate Button Styles */
#generate-content {
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

#generate-content:hover {
    background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(102, 126, 234, 0.3);
}

#generate-content:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(102, 126, 234, 0.25);
}

#generate-content i {
    font-size: 16px;
}

/* For the title input and button container */
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
</style>

<div class="main-content">
    <div class="page-header">
        <h2><i class="fas fa-edit"></i> Edit Blog</h2>
        <a href="{{ route('admin.blogs') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="form-container">
        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Blog Title with Auto Generate Button -->
            <div class="form-group">
                <label class="form-label" for="blog-title">Blog Title</label>
                <div class="title-with-generate">
                    <input type="text" name="name" id="blog-title" value="{{ old('name', $blog->name) }}" required>
                   
                </div>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Category -->
            <div class="form-group">
                <label class="form-label" for="blog-category">Category</label>
                <select name="category" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category', $blog->Category->id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status -->
            <div class="form-group">
                <label class="form-label" for="blog-status">Status</label>
                <select name="Status" id="blog-status" class="form-select" required>
                    <option value="draft" {{ old('Status', $blog->Status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('Status', $blog->Status) == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="scheduled" {{ old('Status', $blog->Status) == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                </select>
                @error('Status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Short Description with CKEditor -->
            <div class="form-group">
                <label class="form-label" for="blog-description">Short Description</label>
                <textarea name="Description" id="editor" class="form-control" rows="5" required>{!! old('Description', $blog->Description) !!}</textarea>
                <div class="mt-2"><span id="word-count">Word Count: 0</span></div>
                @error('Description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Thumbnail Image -->
            <div class="form-group">
                <label class="form-label">Thumbnail Image</label>
                <input type="file" name="Thumbnail_Image" class="form-control" accept="image/*">
                @if($blog->Thumbnail_Image)
                    <div class="mt-2">
                        <img src="{{ asset($blog->Thumbnail_Image) }}" alt="Thumbnail" style="width:100px; height:auto; border-radius:5px;">
                        <small class="d-block">Current thumbnail image</small>
                    </div>
                @endif
                @error('Thumbnail_Image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Banner Image -->
            <div class="form-group">
                <label class="form-label">Banner Image</label>
                <input type="file" name="Banner_Image" class="form-control" accept="image/*">
                @if($blog->Banner_mage)
                    <div class="mt-2">
                        <img src="{{ asset($blog->Banner_mage) }}" alt="Banner" style="width:200px; height:auto; border-radius:5px;">
                        <small class="d-block">Current banner image</small>
                    </div>
                @endif
                @error('Banner_Image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Resizeable Image -->
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
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="hidden" id="old_description" value="{!! htmlspecialchars($blog->Description) !!}">
            
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Blog</button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let editorInstance;

    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => { 
            editorInstance = editor;

            // Word count function
            const wordCountEl = document.getElementById('word-count');

            const updateWordCount = () => {
                const text = editor.getData().replace(/<[^>]*>/g, '').trim();
                const words = text.length > 0 ? text.split(/\s+/).length : 0;
                wordCountEl.textContent = 'Word Count: ' + words;
            };

            updateWordCount();
            editor.model.document.on('change:data', updateWordCount);
        })
        .catch(error => { console.error(error); });

    // Auto Generate button
    const generateBtn = document.getElementById('generate-content');
    generateBtn.addEventListener('click', function () {
        const title = document.getElementById('blog-title').value;
        const oldDescription = document.getElementById('old_description').value;

        if (!title.trim()) {
            alert('Please enter a title first');
            return;
        }

        generateBtn.disabled = true;
        generateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating...';

        fetch("{{ route('admin.blogs.generate_content') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                title: title,
                old_description: oldDescription
            })
        })
        .then(response => response.json())
        .then(data => {
            generateBtn.disabled = false;
            generateBtn.innerHTML = '<i class="fas fa-robot"></i> Auto Generate';

            if (data.success) {
                editorInstance.setData(data.content);
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => {
            console.error(error);
            generateBtn.disabled = false;
            generateBtn.innerHTML = '<i class="fas fa-robot"></i> Auto Generate';
            alert("Something went wrong!");
        });
    });
});
</script>
@endsection