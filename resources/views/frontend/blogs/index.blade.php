@include('frontend.header')

<style>
.search_system {
    width: 100%;
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.search-box {
    width: 500px;
    height: 55px;
    display: flex;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.search-box:hover {
    border: 2px solid #1450fb;
    box-shadow: 0 0 8px #1450fb;
}

.search-box:focus-within {
    border: 2px solid #1450fb;
    box-shadow: 0 0 12px rgba(255, 85, 0, 0.6);
}

.seach_engin {
    width: 85%;
    height: 100%;
    padding: 0 15px;
    font-size: 16px;
    border: none;
    outline: none;
    background: #f1f1f1;
}

.icon {
    width: 15%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #ff5500;
    cursor: pointer;
    border: none;
}

.icon i {
    font-size: 22px;
    color: #0480ff;
}

/* Loading spinner styles */
#loading-spinner {
    display: none;
    text-align: center;
    padding: 50px;
}

.spinner {
    border: 4px solid #f3f3f3;
    border-top: 4px solid #ff5500;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    margin: 0 auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Generated content styles */
#generated-content {
    display: none;
    margin: 20px;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.error-message {
    background: #ffebee;
    color: #c62828;
    padding: 15px;
    border-radius: 8px;
    margin: 20px;
    display: none;
}
</style>

<section class="search_system">
    <div class="search-box">
        <form id="search-form" style="display: flex; width: 100%;">
            <input type="text" name="query" id="search-input" class="seach_engin" placeholder="Enter blog title to generate..." required>
            <button type="submit" class="icon">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</section>

<div id="loading-spinner">
    <div class="spinner"></div>
    <p style="margin-top: 20px;">Generating your blog post... This may take a few seconds.</p>
</div>

<div id="error-message" class="error-message"></div>

<div id="generated-content"></div>

@include('frontend.blogs.list')
@include('frontend.footer')

<script>
document.getElementById('search-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const title = document.getElementById('search-input').value.trim();
    
    if (!title) {
        showError('Please enter a blog title');
        return;
    }
    
    // Hide any existing content and show loading
    document.getElementById('generated-content').style.display = 'none';
    document.getElementById('generated-content').innerHTML = '';
    document.getElementById('error-message').style.display = 'none';
    document.getElementById('loading-spinner').style.display = 'block';
    
    try {
        const response = await fetch('{{ route("frontend.search") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ title: title })
        });
        
        const data = await response.json();
        
        if (data.status) {
            // Display the generated content
            const contentDiv = document.getElementById('generated-content');
            contentDiv.innerHTML = `
                <h1>${escapeHtml(data.title)}</h1>
                ${data.content}
            `;
            contentDiv.style.display = 'block';
            
            // Scroll to the generated content
            contentDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else {
            showError(data.message || 'Failed to generate blog post');
        }
    } catch (error) {
        showError('An error occurred: ' + error.message);
    } finally {
        document.getElementById('loading-spinner').style.display = 'none';
    }
});

function showError(message) {
    const errorDiv = document.getElementById('error-message');
    errorDiv.textContent = message;
    errorDiv.style.display = 'block';
    errorDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
    
    // Hide after 5 seconds
    setTimeout(() => {
        errorDiv.style.display = 'none';
    }, 5000);
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
</script>