<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Params for: {{ $resource->name }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>
<body>
<div class="container my-5">
    <h3>Params for: {{ $resource->name }}</h3>

    <!-- Add Param Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addParamModal">Add Param</button>

    <!-- Params Table -->
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="paramsTable">
                    @foreach($params as $key => $param)
                    <tr data-id="{{ $param->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $param->name }}</td>
                        <td>{{ $param->type }}</td>
                        <td>{{ $param->description }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning"
                                onclick="openEditParamModal({{ $param->id }}, '{{ $param->name }}', '{{ $param->type }}', '{{ $param->description }}')">
                                Edit
                            </button>
                            <form onsubmit="deleteParam(event, {{ $param->id }}, this)" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Param Modal -->
<div class="modal fade" id="addParamModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addParamForm">
                <div class="modal-header">
                    <h5 class="modal-title">Add Param</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="api_doc_resource_id" value="{{ $resource->id }}">
                    <div class="mb-3">
                        <label class="form-label">Param Name</label>
                        <input type="text" class="form-control" name="param_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Param Type</label>
                        <select class="form-control" name="param_type" required>
                            <option value="">Select Type</option>
                            <option value="string">String</option>
                            <option value="integer">Integer</option>
                            <option value="boolean">Boolean</option>
                            <option value="array">Array</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Required</label>
                        <select class="form-control" name="required" required>
                            <option value="">Select Requirement</option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Param</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Param Modal -->
<div class="modal fade" id="editParamModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editParamForm">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Param</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editParamId">
                    <div class="mb-3">
                        <label class="form-label">Param Name</label>
                        <input type="text" id="editParamName" class="form-control" name="param_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Param Type</label>
                        <select id="editParamType" class="form-control" name="param_type" required>
                            <option value="string">String</option>
                            <option value="integer">Integer</option>
                            <option value="boolean">Boolean</option>
                            <option value="array">Array</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea id="editParamDescription" class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update Param</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

    // Add Param
    $('#addParamForm').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: '{{ route("api.resource.params.store") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.success){
                    $('#addParamModal').modal('hide');
                    Swal.fire('Success!', 'Param added', 'success');

                    var rowCount = $('#paramsTable tr').length + 1;
                    $('#paramsTable').append(`
                        <tr data-id="${data.param.id}">
                            <td>${rowCount}</td>
                            <td>${data.param.name}</td>
                            <td>${data.param.type}</td>
                            <td>${data.param.description}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="openEditParamModal(${data.param.id}, '${data.param.name}', '${data.param.type}', '${data.param.description}')">Edit</button>
                                <form onsubmit="deleteParam(event, ${data.param.id}, this)" style="display:inline;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    `);
                    form.reset();
                }
            },
            error: function(xhr){
                Swal.fire('Error!', 'Server Error', 'error');
            }
        });
    });

});

// Delete Param
function deleteParam(e, id, form){
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: 'This param will be deleted!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url: '{{ url("zpayd/param") }}/' + id,
                type: 'POST',
                data: {_token:'{{ csrf_token() }}', _method:'DELETE'},
                success: function(resp){
                    if(resp.success){
                        $(form).closest('tr').remove();
                        Swal.fire('Deleted!', 'Param deleted successfully', 'success');
                    }
                }
            });
        }
    });
}

// Open Edit Param Modal
function openEditParamModal(id, name, type, description){
    $('#editParamId').val(id);
    $('#editParamName').val(name);
    $('#editParamType').val(type);
    $('#editParamDescription').val(description);
    $('#editParamModal').modal('show');
}

// Update Param
$('#editParamForm').on('submit', function(e){
    e.preventDefault();
    var id = $('#editParamId').val();

    $.ajax({
        url: '{{ url("api/resource/params/update") }}/' + id,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            param_name: $('#editParamName').val(),
            param_type: $('#editParamType').val(),
            description: $('#editParamDescription').val()
        },
        success: function(data){
            if(data.success){
                Swal.fire('Updated!', 'Param updated successfully', 'success');
                $('#editParamModal').modal('hide');

                // Update table row dynamically
                var row = $('#paramsTable tr[data-id="'+id+'"]');
                row.find('td:eq(1)').text(data.param.name);
                row.find('td:eq(2)').text(data.param.type);
                row.find('td:eq(3)').text(data.param.description);
            } else {
                Swal.fire('Error!', data.message || 'Something went wrong', 'error');
            }
        },
        error: function(xhr){
            Swal.fire('Error!', 'Server Error', 'error');
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
