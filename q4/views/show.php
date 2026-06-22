<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand">🛒 Product Manager</a>
        <a href="index.php?action=index" class="btn btn-outline-light btn-sm">← Back to All</a>
    </div>
</nav>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if ($product): ?>
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">👁 Product Detail</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr><th>ID</th><td><?php echo $product['id']; ?></td></tr>
                        <tr><th>Name</th><td><?php echo htmlspecialchars($product['name']); ?></td></tr>
                        <tr><th>Description</th><td><?php echo htmlspecialchars($product['description']); ?></td></tr>
                        <tr><th>Price</th><td>Rs. <?php echo number_format($product['price'], 2); ?></td></tr>
                        <tr><th>Quantity</th><td><?php echo $product['quantity']; ?></td></tr>
                        <tr><th>Created At</th><td><?php echo $product['created_at']; ?></td></tr>
                    </table>
                    <a href="index.php?action=index" class="btn btn-dark">← Back</a>
                </div>
            </div>
            <?php else: ?>
                <div class="alert alert-danger">Product not found!</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
