<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>API Doc Resources</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery and SweetAlert2 -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>
<body>

<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>API Doc Resources</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addResourceModal">
            Add Resource
        </button>
    </div>

    <!-- Resources Table -->
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        
                        <th>Name</th>
                        <th>Description</th>
                        <th>url</th>
                        <th>type</th>
                        <th>request_sample</th>
                        <th>response_sample</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resources as $key => $resource)
                    <tr data-id="{{ $resource->id }}">
                        <td>{{ $key + 1 }}</td>
                      
                        <td>{{ $resource->name }}</td>
                        <td>{{ $resource->description }}</td>
                      <td style="max-width:190px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
    {{ $resource->url }}
</td>

                        <td>{{ $resource->type }}</td>
                        <td>{{ $resource->request_sample }}</td>
                        <td>{{ $resource->response_sample }}</td>
                       
                      <td>
    <a href="{{ route('api.resource.params', $resource->id) }}" class="btn btn-sm btn-primary">Add Inputs</a>
    <form onsubmit="deleteResource(event, {{ $resource->id }}, this)" style="display:inline;">
    @csrf @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>
<button class="btn btn-sm btn-warning edit-btn"
    data-id="{{ $resource->id }}"
    data-name="{{ $resource->name }}"
    data-description="{{ $resource->description }}"
    data-url="{{ $resource->url }}"
    data-type="{{ $resource->type }}"
    data-actions="{{ $resource->actions }}"
    data-request="{{ $resource->request_sample }}"
    data-response="{{ $resource->response_sample }}">
    Edit
</button>
</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Resource Modal -->
<div class="modal fade" id="addResourceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form id="addResourceForm">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Add API Resource</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- Collection ID -->
                 

                    <!-- Collection Name -->
                    <div class="mb-3">
                        <label class="form-label">Collection</label>
<input type="hidden" name="api_doc_resource_id" value="{{ $collections->id }}">
<input type="text" class="form-control" value="{{ $collections->name }}" readonly>
                    </div>

                    <!-- Endpoint Name -->
                    <div class="mb-3">
                        <label class="form-label">Endpoint Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <!-- Endpoint Type -->
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select class="form-control" name="type">
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>

                    <!-- URL -->
                    <div class="mb-3">
                        <label class="form-label">Endpoint URL</label>
                        <input type="text" class="form-control" name="url" placeholder="/partner/account">
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>

                    <!-- Actions -->
                    <div class="mb-3">
                        <label class="form-label">HTTP Method</label>
                        <select class="form-control" name="actions" required>
                            <option value="GET">GET</option>
                            <option value="POST">POST</option>
                            <option value="PUT">PUT</option>
                            <option value="DELETE">DELETE</option>
                        </select>
                    </div>

                    <!-- Request Sample -->
                    <div class="mb-3">
                        <label class="form-label">Request Sample (JSON)</label>
                        <textarea class="form-control" name="request_sample" rows="4"
                                  placeholder='{"account_id":"123"}'></textarea>
                    </div>

                    <!-- Response Sample -->
                    <div class="mb-3">
                        <label class="form-label">Response Sample (JSON)</label>
                        <textarea class="form-control" name="response_sample" rows="4"
                                  placeholder='{"status":"success"}'></textarea>
                    </div>

                    <hr>

                    

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Resource</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>

            </form>

        </div>
    </div>
</div>


<!-- Edit Resource Modal -->
<div class="modal fade" id="editResourceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editResourceForm">
                <div class="modal-header">
                    <h5 class="modal-title">Edit API Resource</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editResourceId">

                    <div class="mb-3">
                        <label class="form-label">Resource Name</label>
                        <input type="text" id="editResourceName" class="form-control" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea id="editResourceDescription" class="form-control" name="description" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Endpoint URL</label>
                        <input type="text" id="editResourceUrl" class="form-control" name="url">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select id="editResourceType" class="form-control" name="type">
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">HTTP Method</label>
                        <input type="text" id="editResourceActions" class="form-control" name="actions" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Request Sample (JSON)</label>
                        <textarea id="editResourceRequest" class="form-control" name="request_sample" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Response Sample (JSON)</label>
                        <textarea id="editResourceResponse" class="form-control" name="response_sample" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update Resource</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JS Section -->
<script>
    function truncateWords(str, numWords) {
    return str.split(' ').slice(0, numWords).join(' ') + (str.split(' ').length > numWords ? '...' : '');
}
   $('#addResourceForm').on('submit', function (e) {
        e.preventDefault();

        var form = this;
        var formData = new FormData(form);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: '{{ route("api.endpoint.store") }}', // apna route
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,

        success: function (data) {
    if (data.success) {

        Swal.fire({
            icon: 'success',
            title: 'Resource added successfully',
            confirmButtonText: 'OK'
        });

        $('#addResourceModal').modal('hide');

        var rowCount = $('table tbody tr').length + 1;

$('table tbody').append(
    '<tr data-id="' + data.resource.id + '">' +
        '<td>' + rowCount + '</td>' +
        '<td>' + data.resource.name + '</td>' +
        '<td>' + data.resource.description + '</td>' +
        '<td>' + data.resource.url + '</td>' +
        '<td>' + data.resource.type + '</td>' +
        '<td>' + data.resource.request_sample + '</td>' +
        '<td>' + data.resource.response_sample + '</td>' +
        '<td>' +
            '<a href="/api-resource/' + data.resource.id + '/params" class="btn btn-sm btn-primary">Add Inputs</a> ' +
            '<form onsubmit="deleteResource(event,' + data.resource.id + ', this)" style="display:inline;">' +
                '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                '<button type="submit" class="btn btn-sm btn-danger">Delete</button>' +
            '</form> ' +
            '<button class="btn btn-sm btn-warning edit-btn" ' +
                'data-id="' + data.resource.id + '" ' +
                'data-name="' + data.resource.name.replace(/"/g, '&quot;') + '" ' +
                'data-description="' + data.resource.description.replace(/"/g, '&quot;') + '" ' +
                'data-url="' + data.resource.url.replace(/"/g, '&quot;') + '" ' +
                'data-type="' + data.resource.type.replace(/"/g, '&quot;') + '" ' +
                'data-actions="' + data.resource.actions.replace(/"/g, '&quot;') + '" ' +
                'data-request="' + data.resource.request_sample.replace(/"/g, '&quot;') + '" ' +
                'data-response="' + data.resource.response_sample.replace(/"/g, '&quot;') + '">' +
                'Edit' +
            '</button>' +
        '</td>' +
    '</tr>'
);

        form.reset();
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: data.message || 'Something went wrong',
            confirmButtonText: 'OK'
        });
    }
},


            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Server Error',
                    text: 'Please try again',
                    confirmButtonText: 'OK'
                });
            }
        });
    });




// Delete Resource
function deleteResource(e, id, form){
    e.preventDefault();
    Swal.fire({
        title:'Are you sure?',
        text:'This resource will be deleted!',
        icon:'warning',
        showCancelButton:true,
        confirmButtonText:'Yes, delete it!',
        cancelButtonText:'Cancel'
    }).then((result)=>{
        if(result.isConfirmed){
$.ajax({
    url: '{{ url("endpoint/delete") }}/'+ id,
    type: 'POST',        // Laravel treats POST + _method DELETE as DELETE
    data: {
        _token: '{{ csrf_token() }}',
        _method: 'DELETE'
    },
    success: function(resp){
        if(resp.success){
            $(form).closest('tr').remove();
            Swal.fire('Deleted!', 'Resource deleted successfully', 'success');
        }
    },
    error: function(xhr){
        Swal.fire('Error!', xhr.responseText || 'Something went wrong', 'error');
    }
});
        }
    });
}

// Open Edit Modal
$(document).on('click', '.edit-btn', function() {
    var btn = $(this);
    $('#editResourceId').val(btn.data('id'));
    $('#editResourceName').val(btn.data('name'));
    $('#editResourceDescription').val(btn.data('description'));
    $('#editResourceUrl').val(btn.data('url'));
    $('#editResourceType').val(btn.data('type'));
    $('#editResourceActions').val(btn.data('actions'));
    $('#editResourceRequest').val(btn.data('request'));
    $('#editResourceResponse').val(btn.data('response'));
    $('#editResourceModal').modal('show');
});

$('#editResourceForm').on('submit', function(e){
    e.preventDefault();
    var id = $('#editResourceId').val();

    $.ajax({
        url: '{{ url("zpayd.endpoint.update") }}/' + id,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            name: $('#editResourceName').val(),
            description: $('#editResourceDescription').val(),
            url: $('#editResourceUrl').val(),
            type: $('#editResourceType').val(),
            actions: $('#editResourceActions').val(),
            request_sample: $('#editResourceRequest').val(),
            response_sample: $('#editResourceResponse').val()
        },
        success: function(data){
            if(data.success){
                Swal.fire('Updated!', 'Resource updated successfully', 'success');
                $('#editResourceModal').modal('hide');

                var row = $('table tbody tr[data-id="'+id+'"]');
                row.find('td:eq(1)').text(data.resource.name);
                row.find('td:eq(2)').text(data.resource.description);
                row.find('td:eq(3)').text(data.resource.url);
                row.find('td:eq(4)').text(data.resource.type);
                row.find('td:eq(5)').text(data.resource.request_sample);
                row.find('td:eq(6)').text(data.resource.response_sample);
                row.find('td:eq(7) button.btn-warning').attr('onclick',
                    "openEditResourceModal('"+data.resource.id+"', '"+data.resource.name+"', '"+data.resource.description+"', '"+data.resource.url+"', '"+data.resource.type+"', '"+data.resource.actions+"', '"+data.resource.request_sample+"', '"+data.resource.response_sample+"')"
                );
            } else {
                Swal.fire('Error!', data.message || 'Something went wrong', 'error');
            }
        },
        error: function(xhr){
            Swal.fire('Error!', xhr.responseText, 'error');
        }
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
