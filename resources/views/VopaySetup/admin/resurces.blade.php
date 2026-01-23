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
                        <th>Collection</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Endpoints</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resources as $key => $resource)
                    <tr data-id="{{ $resource->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $resource->collection->name ?? '-' }}</td>
                        <td>{{ $resource->name }}</td>
                        <td>{{ $resource->description }}</td>
                        <td>{{ $resource->actions }}</td>
                        <td>
                            <a href="{{ route('zpayd.endpoint', $resource->id) }}" class="btn btn-sm btn-primary">Add Endpoint</a>
                            <form onsubmit="deleteResource(event, {{ $resource->id }}, this)" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            <button class="btn btn-sm btn-warning"
                                onclick="openEditResourceModal({{ $resource->id }}, '{{ $resource->name }}', '{{ $resource->description }}', '{{ $resource->actions }}')">
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
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addResourceForm">
                <div class="modal-header">
                    <h5 class="modal-title">Add API Resource</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="api_doc_collection_id" value="{{ $collections->id }}">
                    <div class="mb-3">
                        <label class="form-label">Collection</label>
                        <input type="text" class="form-control" value="{{ $collections->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Resource Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Endpoints / Actions</label>
                        <input type="text" class="form-control" name="actions" required>
                    </div>
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
    <div class="modal-dialog">
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
                        <label class="form-label">Endpoints / Actions</label>
                        <input type="text" id="editResourceActions" class="form-control" name="actions" required>
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
            url: '{{ route("api.resources.store") }}', // apna route
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
    '<tr>' +
        '<td>' + rowCount + '</td>' +
        '<td>' + data.resource.collection_name + '</td>' +
        '<td>' + data.resource.name + '</td>' +
        '<td>' + data.resource.description + '</td>' +
        '<td>' + data.resource.actions + '</td>' +
        '<td>' +
            '<a href="/endpoint/' + data.resource.id + '">' +
                '<button class="btn btn-sm btn-primary">Add Endpoint</button>' +
            '</a> ' +
            '<form onsubmit="deleteCollection(event, ' + data.resource.id + ', this)" style="display:inline;">' +
                '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                '<button type="submit" class="btn btn-sm btn-danger">Delete</button>' +
            '</form> ' +
            '<button class="btn btn-sm btn-warning" ' +
                'onclick="openEditResourceModal(' + data.resource.id + ', \'' + 
                data.resource.name.replace(/'/g, "\\'") + '\', \'' + 
                data.resource.description.replace(/'/g, "\\'") + '\', \'' + 
                data.resource.actions.replace(/'/g, "\\'") + '\')">' +
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
                url:'{{ url("zpayd/resource") }}/'+id,
                type:'POST',
                data:{_token:'{{ csrf_token() }}', _method:'DELETE'},
                success:function(resp){
                    if(resp.success){
                        $(form).closest('tr').remove();
                        Swal.fire('Deleted!', 'Resource deleted successfully', 'success');
                    }
                }
            });
        }
    });
}

// Open Edit Modal
function openEditResourceModal(id, name, description, actions){
    $('#editResourceId').val(id);
    $('#editResourceName').val(name);
    $('#editResourceDescription').val(description);
    $('#editResourceActions').val(actions);
    $('#editResourceModal').modal('show');
}
$('#editResourceForm').on('submit', function(e){
    e.preventDefault();

    var id = $('#editResourceId').val();

    $.ajax({
        url: '{{ url("api/resources/update") }}/' + id, // your route
        type: 'POST', // use POST (or PUT if you change route)
        data: {
            _token: '{{ csrf_token() }}',  // CSRF token
            name: $('#editResourceName').val(),
            description: $('#editResourceDescription').val(),
            actions: $('#editResourceActions').val()
        },
        success: function(data){
            if(data.success){
                Swal.fire('Updated!', 'Resource updated successfully', 'success');

                $('#editResourceModal').modal('hide');

                // Update row dynamically
                var row = $('table tbody tr[data-id="'+id+'"]');
row.find('td:eq(2)').text(data.resource.name.replace(/'/g, "\\'"));
row.find('td:eq(3)').text(data.resource.description.replace(/'/g, "\\'"));
row.find('td:eq(4)').text(data.resource.actions.replace(/'/g, "\\'"));

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
