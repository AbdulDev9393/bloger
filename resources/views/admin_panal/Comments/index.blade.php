@extends('admin_panal.mainbar')

@section('title', 'Comments & Messages')

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

    .search-box {
        position: relative;
    }

    .search-box input {
        padding: 10px 15px 10px 40px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        width: 300px;
        font-size: 14px;
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

    .stat-icon.comments {
        background: linear-gradient(135deg, var(--primary-color), #3a5ccc);
    }

    .stat-icon.messages {
        background: linear-gradient(135deg, var(--info-color), #258391);
    }

    .stat-icon.pending {
        background: linear-gradient(135deg, var(--warning-color), #d4a82c);
    }

    .stat-icon.spam {
        background: linear-gradient(135deg, var(--danger-color), #c23321);
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

    /* Tabs Navigation */
    .tabs-navigation {
        background: white;
        border-radius: 12px;
        box-shadow: var(--shadow);
        margin-bottom: 30px;
        overflow: hidden;
    }

    .tabs-list {
        display: flex;
        list-style: none;
        border-bottom: 1px solid var(--border-color);
    }

    .tab-item {
        padding: 20px 30px;
        cursor: pointer;
        font-weight: 600;
        color: var(--gray-color);
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .tab-item:hover {
        color: var(--primary-color);
        background: #f8f9fc;
    }

    .tab-item.active {
        color: var(--primary-color);
        border-bottom-color: var(--primary-color);
        background: #f8f9fc;
    }

    .tab-badge {
        background: var(--light-color);
        color: var(--dark-color);
        padding: 2px 8px;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 600;
    }

    /* Content Sections */
    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    /* Table Container */
    .table-container {
        background: white;
        border-radius: 12px;
        box-shadow: var(--shadow);
        overflow: hidden;
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
    }

    .filter-options {
        display: flex;
        gap: 10px;
    }

    .filter-btn {
        padding: 8px 16px;
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .filter-btn:hover, .filter-btn.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        font-size: 14px;
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
        padding: 6px 12px;
        font-size: 13px;
    }

    /* Table Styles */
    .table-responsive {
        overflow-x: auto;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table thead {
        background: var(--light-color);
    }

    .data-table th {
        padding: 18px 20px;
        text-align: left;
        font-weight: 600;
        color: var(--dark-color);
        font-size: 14px;
        white-space: nowrap;
    }

    .data-table th:first-child {
        width: 50px;
        padding-left: 30px;
    }

    .data-table td {
        padding: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .data-table tr:last-child td {
        border-bottom: none;
    }

    .data-table tr:hover {
        background: #f9fafc;
    }

    .data-table td:first-child {
        padding-left: 30px;
    }

    /* Comment/Message Item Styles */
    .item-checkbox {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .message-item {
        display: flex;
        gap: 15px;
    }

    .user-avatar {
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

    .avatar-img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .message-content {
        flex: 1;
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .user-info-small h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark-color);
    }

    .user-info-small p {
        font-size: 13px;
        color: var(--gray-color);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .message-time {
        font-size: 12px;
        color: #b0b3c1;
        white-space: nowrap;
    }

    .message-text {
        color: var(--dark-color);
        line-height: 1.6;
        margin-bottom: 10px;
    }

    .message-meta {
        display: flex;
        gap: 15px;
        font-size: 13px;
        color: var(--gray-color);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .post-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
    }

    .post-link:hover {
        text-decoration: underline;
    }

    /* Status Badges */
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    .status-approved {
        background: rgba(28, 200, 138, 0.15);
        color: var(--success-color);
    }

    .status-pending {
        background: rgba(246, 194, 62, 0.15);
        color: var(--warning-color);
    }

    .status-spam {
        background: rgba(231, 74, 59, 0.15);
        color: var(--danger-color);
    }

    .status-read {
        background: rgba(108, 117, 125, 0.15);
        color: #6c757d;
    }

    .status-unread {
        background: rgba(78, 115, 223, 0.15);
        color: var(--primary-color);
        font-weight: 700;
    }

    /* Message Type Indicators */
    .type-badge {
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .type-comment {
        background: #e3f2fd;
        color: #1565c0;
    }

    .type-contact {
        background: #f3e5f5;
        color: #7b1fa2;
    }

    /* Action Buttons */
    .item-actions {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        width: 34px;
        height: 34px;
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

    .approve-btn:hover {
        background: var(--success-color);
        color: white;
    }

    .reply-btn:hover {
        background: var(--primary-color);
        color: white;
    }

    .delete-btn:hover {
        background: var(--danger-color);
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
        justify-content: center;
        padding: 25px;
        border-top: 1px solid var(--border-color);
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
        width: 600px;
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
        position: sticky;
        top: 0;
        background: white;
        z-index: 1;
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

    .message-details {
        border: 1px solid var(--border-color);
        border-radius: 8px;
        overflow: hidden;
    }

    .message-header-details {
        background: var(--light-color);
        padding: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .message-header-details h4 {
        font-size: 18px;
        margin-bottom: 10px;
        color: var(--dark-color);
    }

    .message-meta-details {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        font-size: 14px;
        color: var(--gray-color);
    }

    .message-body {
        padding: 25px;
        line-height: 1.8;
        color: var(--dark-color);
    }

    .reply-section {
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid var(--border-color);
    }

    .reply-section h4 {
        font-size: 16px;
        margin-bottom: 15px;
        color: var(--dark-color);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: var(--dark-color);
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 14px;
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

    .modal-footer {
        padding: 20px 30px;
        border-top: 1px solid var(--border-color);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        position: sticky;
        bottom: 0;
        background: white;
    }

    /* Quick Actions */
    .quick-actions {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .search-box input {
            width: 200px;
        }
        
        .stats-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .top-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
            padding: 15px 20px;
        }
        
        .user-info {
            width: 100%;
            justify-content: space-between;
        }
        
        .search-box input {
            width: 100%;
        }
        
        .page-content {
            padding: 0 20px 20px;
        }
        
        .table-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
        
        .table-actions {
            width: 100%;
            justify-content: space-between;
        }
        
        .tabs-list {
            flex-wrap: wrap;
        }
        
        .tab-item {
            flex: 1;
            min-width: 140px;
            justify-content: center;
        }
        
        .data-table th, .data-table td {
            padding: 12px 15px;
        }
    }

    @media (max-width: 576px) {
        .page-content {
            padding: 0 15px 15px;
        }
        
        .stats-container {
            grid-template-columns: 1fr;
        }
        
        .tab-item {
            padding: 15px;
            font-size: 14px;
        }
        
        .message-header {
            flex-direction: column;
            gap: 10px;
        }
        
        .message-meta {
            flex-direction: column;
            gap: 8px;
        }
        
        .item-actions {
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 8px 16px;
            font-size: 13px;
        }
    }
    .delete-btn:hover {
    background: var(--danger-color);
    color: white;
}

</style>

<!-- Top Header -->
<div class="top-header">
    <h1 class="page-title"><i class="fas fa-comments"></i> Comments & Messages</h1>
    
</div>

<!-- Page Content -->
<div class="page-content">
    <!-- Stats Cards -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon comments">
                <i class="fas fa-comment-alt"></i>
            </div>
            <div class="stat-info">
                <h3 id="total-comments">{{$totalComents}}</h3>
                <p>Total Comments</p>
            </div>
        </div>
 
      
      
    </div>

  

    <!-- All Items Tab -->
    <div class="tab-content active" id="all-tab">
        <div class="table-container">
            <div class="table-header">
                <h3>All Comments & Messages</h3>
                <div class="table-actions">
                    <form action="{{ route('admin.comments.deleteAll') }}" 
      method="get" 
      onsubmit="return confirm('Are you sure you want to delete ALL comments?')">
   

    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fas fa-trash-alt"></i> Delete All
    </button>
</form>
                   
                </div>
            </div>
            
           <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                           
                            <th>User / email</th>
                            <th>Message</th>
                            <th>Date Time</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody id="all-items-table">
                        @foreach ($getComents as $getComent)
                            <tr>
                      
                            <td>
                                <strong>{{$getComent->Name}}</strong><br>
                               {{$getComent->Email}}
                            </td>
                           <td>{{$getComent->Message}}</td>
                            <td>{{ $getComent->created_at->format('d M Y, h:i A') }}</td>
            <td>
                <form action="{{ route('admin.comments.delete', $getComent->id) }}" 
                      method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this comment?')">
                    @csrf
                    @method('DELETE')
            
                    <button type="submit" class="action-btn delete-btn" title="Delete Comment">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
                           
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>


            <div class="pagination">
             
            </div>
        </div>
    </div>

    

    <!-- Pending Tab -->

 
</div>



@endsection