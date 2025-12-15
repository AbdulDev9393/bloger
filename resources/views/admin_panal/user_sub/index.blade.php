@extends('admin_panal.mainbar')

@section('title', 'Subscribers')

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
    }

    /* Stats Cards */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: var(--shadow);
        display: flex;
        align-items: center;
        gap: 20px;
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
    }

    .stat-icon.total {
        background: linear-gradient(135deg, var(--primary-color), #3a5ccc);
    }

    .stat-icon.active {
        background: linear-gradient(135deg, var(--success-color), #17a673);
    }

    .stat-icon.weekly {
        background: linear-gradient(135deg, var(--info-color), #258391);
    }

    .stat-icon.unsubscribed {
        background: linear-gradient(135deg, #6c757d, #545b62);
    }

    .stat-info h3 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .stat-info p {
        color: var(--gray-color);
        font-size: 15px;
    }

    /* Page Actions */
    .page-actions {
        background: white;
        border-radius: 12px;
        padding: 25px 30px;
        box-shadow: var(--shadow);
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .search-filter-section {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .search-box {
        position: relative;
        min-width: 300px;
    }

    .search-box input {
        padding: 12px 15px 12px 45px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        width: 100%;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
    }

    .search-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-color);
        font-size: 16px;
    }

    .filter-options {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 10px 20px;
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .filter-btn:hover, .filter-btn.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .action-buttons {
        display: flex;
        gap: 15px;
    }

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

    .btn-warning {
        background-color: var(--warning-color);
        color: white;
    }

    /* Subscribers Table */
    .table-container {
        background: white;
        border-radius: 12px;
        box-shadow: var(--shadow);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .table-header {
        padding: 25px 30px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-header h3 {
        font-size: 20px;
        font-weight: 700;
    }

    .table-actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .bulk-actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .select-all {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        margin-right: 15px;
    }

    .export-options {
        display: flex;
        gap: 10px;
    }

    .btn-sm {
        padding: 8px 16px;
        font-size: 14px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .subscribers-table {
        width: 100%;
        border-collapse: collapse;
    }

    .subscribers-table thead {
        background: var(--light-color);
    }

    .subscribers-table th {
        padding: 18px 20px;
        text-align: left;
        font-weight: 600;
        color: var(--dark-color);
        font-size: 14px;
        white-space: nowrap;
    }

    .subscribers-table th:first-child {
        width: 50px;
        padding-left: 30px;
    }

    .subscribers-table td {
        padding: 20px;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    .subscribers-table tr:last-child td {
        border-bottom: none;
    }

    .subscribers-table tr:hover {
        background: #f9fafc;
    }

    .subscribers-table td:first-child {
        padding-left: 30px;
    }

    /* Subscriber Item Styles */
    .subscriber-checkbox {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .subscriber-item {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .subscriber-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 18px;
        flex-shrink: 0;
    }

    .subscriber-info h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark-color);
    }

    .subscriber-info p {
        font-size: 14px;
        color: var(--gray-color);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .subscriber-info p i {
        font-size: 12px;
    }

    .subscriber-meta {
        display: flex;
        flex-direction: column;
        gap: 5px;
        font-size: 13px;
        color: var(--gray-color);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Status Badges */
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        text-align: center;
        min-width: 80px;
    }

    .status-active {
        background: rgba(28, 200, 138, 0.15);
        color: var(--success-color);
    }

    .status-inactive {
        background: rgba(108, 117, 125, 0.15);
        color: #6c757d;
    }

    .status-unsubscribed {
        background: rgba(231, 74, 59, 0.15);
        color: var(--danger-color);
    }

    /* Source Badges */
    .source-badge {
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .source-website {
        background: #e3f2fd;
        color: #1565c0;
    }

    .source-popup {
        background: #f3e5f5;
        color: #7b1fa2;
    }

    .source-api {
        background: #e8f5e9;
        color: #2e7d32;
    }

    /* Action Buttons */
    .subscriber-actions {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--light-color);
        color: var(--gray-color);
        cursor: pointer;
        transition: all 0.2s ease;
        border: none;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .email-btn:hover {
        background: var(--primary-color);
        color: white;
    }

    .delete-btn:hover {
        background: var(--danger-color);
        color: white;
    }

    .export-btn:hover {
        background: var(--success-color);
        color: white;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state i {
        font-size: 60px;
        color: var(--border-color);
        margin-bottom: 20px;
    }

    .empty-state h3 {
        font-size: 24px;
        margin-bottom: 10px;
        color: var(--dark-color);
    }

    .empty-state p {
        color: var(--gray-color);
        margin-bottom: 25px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 25px 30px;
        border-top: 1px solid var(--border-color);
        flex-wrap: wrap;
        gap: 15px;
    }

    .pagination-info {
        font-size: 14px;
        color: var(--gray-color);
    }

    .pagination-list {
        display: flex;
        gap: 8px;
        list-style: none;
    }

    .page-item {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .page-item:hover {
        background: var(--light-color);
    }

    .page-item.active {
        background: var(--primary-color);
        color: white;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: white;
        border-radius: 12px;
        width: 500px;
        max-width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        padding: 25px 30px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header h3 {
        font-size: 20px;
        font-weight: 700;
    }

    .close-modal {
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: var(--gray-color);
        transition: color 0.3s ease;
    }

    .close-modal:hover {
        color: var(--danger-color);
    }

    .modal-body {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 500;
        color: var(--dark-color);
        font-size: 15px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.3s ease;
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
        margin-bottom: 20px;
    }

    .form-col {
        flex: 1;
    }

    /* Email Preview */
    .email-preview {
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 20px;
        background: #f8f9fc;
        margin-top: 20px;
    }

    .email-preview h5 {
        margin-bottom: 15px;
        color: var(--dark-color);
        font-size: 16px;
    }

    .preview-content {
        background: white;
        padding: 20px;
        border-radius: 6px;
        font-size: 14px;
        line-height: 1.6;
        color: var(--dark-color);
    }

    .modal-footer {
        padding: 20px 30px;
        border-top: 1px solid var(--border-color);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    /* Subscription Chart */
    .subscription-chart {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: var(--shadow);
        margin-bottom: 30px;
    }

    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .chart-header h3 {
        font-size: 18px;
        font-weight: 700;
        color: var(--dark-color);
    }

    .chart-container {
        height: 300px;
        position: relative;
    }

    .chart-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        background: #f8f9fc;
        border-radius: 8px;
        color: var(--gray-color);
        font-size: 16px;
    }

    /* Quick Stats */
    .quick-stats {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 30px;
    }

    .quick-stat {
        flex: 1;
        min-width: 200px;
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: var(--shadow);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .quick-stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 15px;
    }

    .icon-blue { background: rgba(78, 115, 223, 0.1); color: var(--primary-color); }
    .icon-green { background: rgba(28, 200, 138, 0.1); color: var(--success-color); }
    .icon-orange { background: rgba(246, 194, 62, 0.1); color: var(--warning-color); }
    .icon-purple { background: rgba(111, 66, 193, 0.1); color: #6f42c1; }

    .quick-stat h4 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .quick-stat p {
        color: var(--gray-color);
        font-size: 14px;
    }

    /* Responsive Styles */
    @media (max-width: 1200px) {
        .search-box {
            min-width: 250px;
        }
        
        .page-actions {
            flex-direction: column;
            align-items: stretch;
        }
        
        .search-filter-section {
            width: 100%;
            justify-content: space-between;
        }
    }

    @media (max-width: 992px) {
        .stats-container {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .table-header {
            flex-direction: column;
            gap: 15px;
            align-items: stretch;
        }
        
        .table-actions {
            width: 100%;
            justify-content: space-between;
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
        
        .stats-container {
            grid-template-columns: 1fr;
        }
        
        .search-filter-section {
            flex-direction: column;
            align-items: stretch;
        }
        
        .search-box {
            min-width: 100%;
        }
        
        .subscribers-table th, .subscribers-table td {
            padding: 12px 15px;
        }
        
        .pagination {
            flex-direction: column;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .page-content {
            padding: 0 15px 15px;
        }
        
        .stat-card {
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }
        
        .action-buttons {
            width: 100%;
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
        
        .bulk-actions {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
        
        .select-all {
            margin-right: 0;
        }
    }
</style>

<!-- Top Header -->
<div class="top-header">
    <h1 class="page-title"><i class="fas fa-users"></i> Email Subscribers</h1>
    <div class="user-info">
       
    </div>
</div>

<!-- Page Content -->
<div class="page-content">
    
   



    <!-- Page Actions -->
    <div class="page-actions">
        <div class="search-filter-section">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="search-subscribers" placeholder="Search by email, name, or location...">
            </div>
         
        </div>
        <div class="action-buttons">
            <button class="btn btn-primary" id="send-email-btn">
                <i class="fas fa-paper-plane"></i> Send Email
            </button>
            <button class="btn btn-success" id="add-subscriber-btn">
                <i class="fas fa-plus"></i> Add Subscriber
            </button>
        </div>
    </div>

    <!-- Subscribers Table -->
    <div class="table-container">
        <div class="table-header">
            <h3>All Subscribers</h3>
            <div class="table-actions">
                <div class="bulk-actions">
                  
                   
                </div>
               
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="subscribers-table">
                <thead>
                    <tr>
                        <th>Subscriber</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Source</th>
                        <th>Join Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="subscribers-table-body">
                    <!-- Subscriber rows will be populated here -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
           
        </div>
    </div>
</div>

<!-- Send Email Modal -->
<div class="modal" id="send-email-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-paper-plane"></i> Send Email to Subscribers</h3>
            <button class="close-modal" id="close-email-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="send-email-form">
                <div class="form-group">
                    <label for="email-recipients">Recipients</label>
                    <div class="form-row">
                        <div class="form-col">
                            <div class="checkbox-item">
                                <input type="radio" id="recipients-all" name="recipients" value="all" checked>
                                <label for="recipients-all">All Active Subscribers (<span id="recipient-count">1,724</span>)</label>
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="checkbox-item">
                                <input type="radio" id="recipients-selected" name="recipients" value="selected">
                                <label for="recipients-selected">Selected Subscribers</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email-subject">Subject *</label>
                    <input type="text" id="email-subject" class="form-control" placeholder="Enter email subject" required>
                </div>
                
                <div class="form-group">
                    <label for="email-content">Email Content *</label>
                    <textarea id="email-content" class="form-control" rows="10" placeholder="Write your email content here..." required>Hi [Name],

We hope this email finds you well! Here's our latest update from the blog.

Best regards,
The Blog Team</textarea>
                    <div class="label-help">Use [Name] to personalize emails with subscriber's name.</div>
                </div>
                
                <div class="email-preview">
                    <h5>Preview:</h5>
                    <div class="preview-content" id="email-preview">
                        <strong>Subject:</strong> <span id="preview-subject">Your Email Subject</span><br><br>
                        <strong>Recipients:</strong> <span id="preview-recipients">All Active Subscribers (1,724)</span><br><br>
                        <div id="preview-content">Email content will appear here...</div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn" id="cancel-email-btn">Cancel</button>
            <button class="btn btn-primary" id="send-email-now-btn">
                <i class="fas fa-paper-plane"></i> Send Email Now
            </button>
        </div>
    </div>
</div>

<!-- Add Subscriber Modal -->
<div class="modal" id="add-subscriber-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-user-plus"></i> Add New Subscriber</h3>
            <button class="close-modal" id="close-add-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="add-subscriber-form">
                <div class="form-group">
                    <label for="subscriber-email">Email Address *</label>
                    <input type="email" id="subscriber-email" class="form-control" placeholder="subscriber@example.com" required>
                </div>
                
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="subscriber-first-name">First Name</label>
                            <input type="text" id="subscriber-first-name" class="form-control" placeholder="John">
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="subscriber-last-name">Last Name</label>
                            <input type="text" id="subscriber-last-name" class="form-control" placeholder="Doe">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="subscriber-location">Location</label>
                    <input type="text" id="subscriber-location" class="form-control" placeholder="City, Country">
                </div>
                
                <div class="form-group">
                    <label>Subscription Source</label>
                    <select id="subscription-source" class="form-control">
                        <option value="website" selected>Website Form</option>
                        <option value="popup">Popup Form</option>
                        <option value="manual">Manual Entry</option>
                        <option value="api">API Integration</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Send Welcome Email</label>
                    <div class="checkbox-item">
                        <input type="checkbox" id="send-welcome-email" checked>
                        <label for="send-welcome-email">Send welcome email to new subscriber</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn" id="cancel-add-btn">Cancel</button>
            <button class="btn btn-primary" id="save-subscriber-btn">Add Subscriber</button>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal" id="delete-confirm-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-exclamation-triangle"></i> Confirm Deletion</h3>
            <button class="close-modal" id="close-delete-modal">&times;</button>
        </div>
        <div class="modal-body">
            <div style="text-align: center; padding: 20px 0;">
                <i class="fas fa-trash-alt" style="font-size: 48px; color: var(--danger-color); margin-bottom: 20px;"></i>
                <h3 style="margin-bottom: 10px;">Delete Subscriber?</h3>
                <p id="delete-message">Are you sure you want to delete this subscriber? This action cannot be undone.</p>
                <p style="color: var(--danger-color); font-weight: 600;">This will permanently remove the subscriber from your list.</p>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" id="cancel-delete-btn">Cancel</button>
            <button class="btn btn-danger" id="confirm-delete-btn">Delete Subscriber</button>
        </div>
    </div>
</div>

@endsection