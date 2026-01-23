<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Collections Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>
<body>

<div class="container my-5">
    <h2 class="mb-4">Collections List</h2>

    <!-- Add Collections Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCollectionModal">Add Collections</button>

    <!-- Collections List -->
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Collection Name</th>
                        <th>Action</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collections as $collection)
                   <tr data-id="{{ $collection->id }}">
                        <td>1</td>
                        <td>{{$collection->name}}</td>
                        <td>{{$collection->actions}}</td>
                        <td>
    <div class="d-flex gap-2">
        <a href="{{ route('zpayd.resurcePage', $collection->id) }}">
            <button class="btn btn-sm btn-primary">Add Resource</button>
        </a>

        <form onsubmit="deleteCollection(event, {{ $collection->id }}, this)">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>

        <button type="button" class="btn btn-sm btn-warning"
                onclick="openEditModal({{ $collection->id }}, '{{ $collection->name }}', '{{ $collection->actions }}')">
            Edit
        </button>
    </div>
</td>
                    </tr>
                                           
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Collection Modal -->
<div class="modal fade" id="addCollectionModal" tabindex="-1" aria-labelledby="addCollectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Collection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="zpayd.add_collection" onsubmit="add_collection(event)">
                    <div class="mb-3">
                        <label for="collectionName" class="form-label">Collection Name</label>
                        <input type="text" class="form-control" id="collectionName" name="name" placeholder="Enter collection name">
                    </div>
                    <div class="mb-3">
                        <label for="collectionDesc" class="form-label">Action</label>
                        <input type="text" class="form-control" id="Action" name="description" placeholder="Enter description">
                    </div>
                    <button type="submit" class="btn btn-success">Add Collection</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Collection Modal -->
<div class="modal fade" id="editCollectionModal" tabindex="-1" aria-labelledby="editCollectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Collection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCollectionForm">
                    <input type="hidden" id="editCollectionId">
                    <div class="mb-3">
                        <label for="editCollectionName" class="form-label">Collection Name</label>
                        <input type="text" class="form-control" id="editCollectionName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="editCollectionAction" class="form-label">Action</label>
                        <input type="text" class="form-control" id="editCollectionAction" name="actions">
                    </div>
                    <button type="submit" class="btn btn-success">Update Collection</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function () {

    $('#addCollectionModal form').on('submit', function (e) {
        e.preventDefault();

        var form = this;
        var formData = new FormData(form);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: '{{ route("zpayd.add_collection") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,

            success: function (data) {
                if (data.success) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Collection added successfully!',
                        confirmButtonText: 'OK'
                    });

                    $('#addCollectionModal').modal('hide');

                    var rowCount = $('table tbody tr').length + 1;
                    var url = 'resurce/' + data.resource.id;

 $('table tbody').append(
    '<tr data-id="' + data.resource.id + '">' +
        '<td>' + ($('table tbody tr').length + 1) + '</td>' +
        '<td>' + data.resource.name + '</td>' +
        '<td>' + data.resource.actions + '</td>' +
        '<td>' +
            '<div class="mb-1">' +
                '<a href="resurce/' + data.resource.id + '" class="d-block">' +
                    '<button type="button" class="btn btn-sm btn-primary w-100">Add Resource</button>' +
                '</a>' +
            '</div>' +
            '<div class="mb-1">' +
                '<form onsubmit="deleteCollection(event, ' + data.resource.id + ', this)" class="d-block">' +
                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                    '<button type="submit" class="btn btn-sm btn-danger w-100">Delete</button>' +
                '</form>' +
            '</div>' +
            '<div class="mb-1">' +
                '<button type="button" class="btn btn-sm btn-warning w-100"' +
                    ' onclick="openEditModal(' + data.resource.id + ', \'' + data.resource.name.replace(/'/g, "\\'") + '\', \'' + data.resource.actions.replace(/'/g, "\\'") + '\')">' +
                    'Edit' +
                '</button>' +
            '</div>' +
        '</td>' +
    '</tr>'
);
                    form.reset();

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message || 'Error adding collection!',
                        confirmButtonText: 'OK'
                    });
                }
            },

            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Something went wrong!',
                    text: error,
                    confirmButtonText: 'OK'
                });
            }
        });
    });

});
</script>

<script>
function deleteCollection(e, id, form) {
    e.preventDefault(); // normal submit stop

    Swal.fire({
        title: 'Are you sure?',
        text: "This collection will be deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

           $.ajax({
   url: '{{ url("zpayd/collections") }}/' + id,
    type: 'POST',
    data: {
        _token: '{{ csrf_token() }}',
        _method: 'DELETE'
    },
                success: function(response) {
                    if (response.success) {

                        // remove row
                        $(form).closest('tr').remove();

                        Swal.fire(
                            'Deleted!',
                            'Collection deleted successfully.',
                            'success'
                        );

                        console.log('Deleted Data:', response.deleted); // PUT / edit ke liye
                    }
                },
              error: function(xhr) {
    console.log(xhr.responseText);
    Swal.fire('Error!', xhr.responseText, 'error');
}
            });

        }
    });
}
function openEditModal(id, name, actions) {
    $('#editCollectionId').val(id);
    $('#editCollectionName').val(name);
    $('#editCollectionAction').val(actions);
    $('#editCollectionModal').modal('show');
}

$('#editCollectionForm').on('submit', function(e) {
    e.preventDefault();

    var id = $('#editCollectionId').val();
    var name = $('#editCollectionName').val();
    var actions = $('#editCollectionAction').val();

    $.ajax({
        url: '{{ url("zpayd/collections/update") }}/' + id,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            _method: 'POST',
            name: name,
            actions: actions
        },
        success: function(data){
            if(data.success){
                Swal.fire('Updated!', 'Collection updated successfully', 'success');
                $('#editCollectionModal').modal('hide');

                // ✅ Update table row dynamically
                var row = $('table tbody tr[data-id="' + id + '"]');
                row.find('td:eq(1)').text(data.resource.name);    // Collection Name
                row.find('td:eq(2)').text(data.resource.actions); // Action
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
