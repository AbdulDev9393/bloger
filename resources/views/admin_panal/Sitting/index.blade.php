@extends('admin_panal.mainbar')

@section('title', 'Settings')

@section('main-section')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    :root {
        --primary-color: #4e73df;
        --primary-hover: #3a5ccc;
        --success-color: #1cc88a;
        --warning-color: #f6c23e;
        --danger-color: #e74a3b;
        --info-color: #36b9cc;
        --dark-color: #2c3e50;
        --light-color: #f8f9fc;
        --gray-color: #858796;
        --border-color: #e3e6f0;
        --shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }

    body {
        background-color: #f5f7fa;
        color: var(--dark-color);
    }

    /* Top Header */
    .top-header {
        background: white;
        padding: 20px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 0;
        z-index: 100;
        margin-bottom: 30px;
    }

    .page-title {
        font-size: 24px;
        font-weight: 700;
        color: var(--dark-color);
    }

    .page-title i {
        color: var(--primary-color);
        margin-right: 10px;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 15px;
        background: var(--light-color);
        border-radius: 8px;
        cursor: pointer;
    }

    .avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
    }

    /* Page Content */
    .page-content {
        padding: 0 30px 30px;
        display: flex;
        gap: 30px;
    }

    /* Settings Navigation */
    .settings-nav {
        width: 280px;
        flex-shrink: 0;
    }

    .nav-card {
        background: white;
        border-radius: 12px;
        box-shadow: var(--shadow);
        overflow: hidden;
    }

    .nav-header {
        padding: 25px;
        border-bottom: 1px solid var(--border-color);
    }

    .nav-header h3 {
        font-size: 18px;
        font-weight: 700;
        color: var(--dark-color);
    }

    .nav-list {
        list-style: none;
    }

    .nav-item {
        display: flex;
        align-items: center;
        padding: 18px 25px;
        color: var(--dark-color);
        text-decoration: none;
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
        cursor: pointer;
    }

    .nav-item:hover {
        background: #f8f9fc;
        color: var(--primary-color);
    }

    .nav-item.active {
        background: #f0f7ff;
        color: var(--primary-color);
        border-left-color: var(--primary-color);
        font-weight: 600;
    }

    .nav-item i {
        width: 25px;
        margin-right: 12px;
        font-size: 18px;
    }

    .nav-item span {
        font-size: 15px;
    }

    /* Settings Content */
    .settings-content {
        flex: 1;
    }

    /* Settings Card */
    .settings-card {
        background: white;
        border-radius: 12px;
        box-shadow: var(--shadow);
        margin-bottom: 30px;
        overflow: hidden;
    }

    .card-header {
        padding: 25px 30px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-header h3 {
        font-size: 20px;
        font-weight: 700;
        color: var(--dark-color);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-header h3 i {
        color: var(--primary-color);
    }

    .card-body {
        padding: 30px;
    }

    /* Form Styles */
    .form-section {
        margin-bottom: 30px;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 20px;
        color: var(--dark-color);
        padding-bottom: 10px;
        border-bottom: 1px solid var(--border-color);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 500;
        color: var(--dark-color);
        font-size: 15px;
    }

    .form-group .label-help {
        color: var(--gray-color);
        font-size: 13px;
        margin-top: 5px;
        font-weight: normal;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.3s ease;
        color: var(--dark-color);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
    }

    .form-col {
        flex: 1;
    }

    /* Checkbox & Radio */
    .checkbox-group, .radio-group {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .checkbox-item, .radio-item {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }

    .checkbox-item input, .radio-item input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .checkbox-item label, .radio-item label {
        margin-bottom: 0;
        cursor: pointer;
        font-weight: normal;
    }

    /* Select with Icon */
    .select-with-icon {
        position: relative;
    }

    .select-with-icon select {
        padding-left: 45px;
    }

    .select-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-color);
        font-size: 16px;
    }

    /* Color Picker */
    .color-picker-container {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .color-preview {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        border: 2px solid var(--border-color);
        cursor: pointer;
        flex-shrink: 0;
    }

    .color-input {
        flex: 1;
    }

    /* File Upload */
    .file-upload {
        border: 2px dashed var(--border-color);
        border-radius: 8px;
        padding: 30px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-upload:hover {
        border-color: var(--primary-color);
        background: #f8f9fc;
    }

    .file-upload i {
        font-size: 48px;
        color: var(--gray-color);
        margin-bottom: 15px;
    }

    .file-upload p {
        color: var(--gray-color);
        margin-bottom: 10px;
    }

    .file-upload small {
        color: var(--gray-color);
        font-size: 13px;
    }

    .current-file {
        margin-top: 15px;
        padding: 10px;
        background: #f8f9fc;
        border-radius: 6px;
        font-size: 14px;
        color: var(--dark-color);
    }

    /* Preview Image */
    .preview-image {
        width: 120px;
        height: 120px;
        border-radius: 8px;
        object-fit: cover;
        border: 2px solid var(--border-color);
        margin-top: 15px;
    }

    /* Social Media Inputs */
    .social-input-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
        flex-shrink: 0;
    }

    .facebook-bg { background: #3b5998; }
    .twitter-bg { background: #1da1f2; }
    .instagram-bg { background: #e4405f; }
    .linkedin-bg { background: #0077b5; }
    .youtube-bg { background: #ff0000; }

    /* Switch Toggle */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 30px;
        margin-right: 10px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 22px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: var(--success-color);
    }

    input:checked + .slider:before {
        transform: translateX(30px);
    }

    /* Button Styles */
    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        font-size: 15px;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
    }

    .btn-success {
        background-color: var(--success-color);
        color: white;
    }

    .btn-danger {
        background-color: var(--danger-color);
        color: white;
    }

    .btn-sm {
        padding: 8px 16px;
        font-size: 14px;
    }

    /* Danger Zone */
    .danger-zone {
        border: 2px solid #fee;
        background: #fff5f5;
        border-radius: 8px;
        padding: 25px;
        margin-top: 30px;
    }

    .danger-zone h4 {
        color: var(--danger-color);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .danger-zone p {
        color: #666;
        margin-bottom: 20px;
    }

    /* Preview Card */
    .preview-card {
        background: #f8f9fc;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 20px;
        margin-top: 20px;
    }

    .preview-card h5 {
        margin-bottom: 15px;
        color: var(--dark-color);
    }

    /* Code Preview */
    .code-preview {
        background: #2d3748;
        color: #e2e8f0;
        padding: 15px;
        border-radius: 6px;
        font-family: monospace;
        font-size: 14px;
        margin-top: 10px;
        overflow-x: auto;
    }

    /* Responsive Styles */
    @media (max-width: 1200px) {
        .page-content {
            flex-direction: column;
        }
        
        .settings-nav {
            width: 100%;
        }
        
        .nav-list {
            display: flex;
            overflow-x: auto;
            padding: 10px 0;
        }
        
        .nav-item {
            white-space: nowrap;
            border-left: none;
            border-bottom: 3px solid transparent;
            padding: 15px 20px;
        }
        
        .nav-item.active {
            border-left: none;
            border-bottom-color: var(--primary-color);
        }
    }

    @media (max-width: 768px) {
        .top-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
            padding: 15px 20px;
        }
        
        .page-content {
            padding: 0 20px 20px;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .form-row {
            flex-direction: column;
            gap: 0;
        }
    }

    @media (max-width: 576px) {
        .page-content {
            padding: 0 15px 15px;
        }
        
        .card-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
    }
    .medium-bg { background: #000000; }
</style>

<!-- Top Header -->
<div class="top-header">
    <h1 class="page-title"><i class="fas fa-cog"></i> Website Settings</h1>
    <div class="user-info">
       
    </div>
</div>

<!-- Page Content -->
<div class="page-content">
  
    <!-- Settings Content -->
    <div class="settings-content">
     

     
     

        <!-- Social Media Tab -->
        <div class="tab-content" id="social-tab">
            <div class="settings-card">
                <div class="card-header">
                    <h3><i class="fas fa-share-alt"></i> Social Media Settings</h3>
                 
                </div>
                <div class="card-body">
                    <form id="social-settings-form" action="{{route('media_post')}}" method="POST">
                        @csrf
                        <div class="form-section" >
                            <h4 class="section-title">Social Media Profiles</h4>
                            
                            <div class="form-group">
                                <label for="facebook-url">Facebook</label>
                                <div class="social-input-group">
                                    <div class="social-icon facebook-bg">
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                  <input type="url"
       name="facebook"
       id="facebook-url"
       class="form-control"
       placeholder="https://facebook.com/yourpage"
       value="{{ $data->facebook ?? '' }}">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="twitter-url">Twitter / X</label>
                                <div class="social-input-group">
                                    <div class="social-icon twitter-bg">
                                        <i class="fab fa-twitter"></i>
                                    </div>
                                  <input type="url"
       name="twitter"
       id="twitter-url"
       class="form-control"
       placeholder="https://twitter.com/yourprofile"
       value="{{ $data->twitter ?? '' }}">

                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="instagram-url">Instagram</label>
                                <div class="social-input-group">
                                    <div class="social-icon instagram-bg">
                                        <i class="fab fa-instagram"></i>
                                    </div>
                                  <input type="url"
       name="instagram"
       id="instagram-url"
       class="form-control"
       placeholder="https://instagram.com/yourprofile"
       value="{{ $data->instagram ?? '' }}">

                                </div>
                            </div>
                            
                     <div class="form-group">
    <label for="medium-url">Medium</label>
    <div class="social-input-group">
        <div class="social-icon medium-bg">
            <i class="fab fa-medium-m"></i>
        </div>
       <input type="url"
       id="medium-url"
       name="medium"
       class="form-control"
       placeholder="https://medium.com/@yourprofile"
       value="{{ $data->medium ?? '' }}">

    </div>
</div>
                            
                            <div class="form-group">
                                <label for="youtube-url">YouTube</label>
                                <div class="social-input-group">
                                    <div class="social-icon youtube-bg">
                                        <i class="fab fa-youtube"></i>
                                    </div>
                                   <input type="url"
       name="youtube"
       id="youtube-url"
       class="form-control"
       placeholder="https://youtube.com/c/yourchannel"
       value="{{ $data->youtube ?? '' }}">

                                </div>
                            </div>
                        </div>
                        
                        <div class="form-section">
                           
                          
                            
                       
                            
                          
                        </div>
                           <button class="btn btn-primary" type="submit" id="save-social-btn">
                        <i class="fas fa-save"></i> Save Changes
                        
                    </button>
                    </form>
                </div>
            </div>
        </div>

  

      
       
    </div>
</div>


@endsection