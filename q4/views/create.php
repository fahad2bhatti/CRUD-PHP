<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand">🛒 Product Manager</a>
        <a href="index.php?action=index" class="btn btn-outline-light btn-sm">← Back</a>
    </div>
</nav>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">➕ Add New Product</h5>
                </div>
                <div class="card-body">
                    <form action="index.php?action=store" method="POST" id="productForm" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Product Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required minlength="3" placeholder="Enter product name">
                            <div class="invalid-feedback">Please enter product name.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Product description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price (Rs.) <span class="text-danger">*</span></label>
                            <input type="number" name="price" class="form-control" required min="0" step="0.01" placeholder="0.00">
                            <div class="invalid-feedback">Please enter a valid price.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity <span class="text-danger">*</span></label>
                            <input type="number" name="quantity" class="form-control" required min="0" placeholder="0">
                            <div class="invalid-feedback">Please enter quantity.</div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-dark">Save Product</button>
                            <a href="index.php?action=index" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('productForm').addEventListener('submit', function(e) {
    if (!this.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
    }
    this.classList.add('was-validated');
});
</script>
</body>
</html>
