<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Collections Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Example Collection 1</td>
                        <td>First collection description</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Example Collection 2</td>
                        <td>Second collection description</td>
                    </tr>
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
                <form>
                    <div class="mb-3">
                        <label for="collectionName" class="form-label">Collection Name</label>
                        <input type="text" class="form-control" id="collectionName" placeholder="Enter collection name">
                    </div>
                    <div class="mb-3">
                        <label for="collectionDesc" class="form-label">Description</label>
                        <input type="text" class="form-control" id="collectionDesc" placeholder="Enter description">
                    </div>
                    <button type="submit" class="btn btn-success">Add Collection</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
