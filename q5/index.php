<?php
session_start();

// Save settings if form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['font_size'] = $_POST['font_size'];
    $_SESSION['font_color'] = $_POST['font_color'];
    header("Location: index.php?saved=1");
    exit();
}

// Default values
$font_size = $_SESSION['font_size'] ?? '16px';
$font_color = $_SESSION['font_color'] ?? '#000000';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: <?php echo $font_size; ?>;
            color: <?php echo $font_color; ?>;
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand">⚙️ Font Settings</a>
        <a href="contact.php" class="btn btn-outline-light btn-sm">Go to Contact Page →</a>
    </div>
</nav>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <?php if (isset($_GET['saved'])): ?>
                <div class="alert alert-success">✅ Settings saved! Visit Contact page to see effect.</div>
            <?php endif; ?>

            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">🎨 Customize Font Settings</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="index.php">

                        <div class="mb-3">
                            <label class="form-label">Font Size</label>
                            <select name="font_size" class="form-select">
                                <?php
                                $sizes = ['12px','14px','16px','18px','20px','24px','28px','32px'];
                                foreach ($sizes as $size) {
                                    $selected = ($font_size == $size) ? 'selected' : '';
                                    echo "<option value='$size' $selected>$size</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Font Color</label>
                            <div class="d-flex align-items-center gap-3">
                                <input type="color" name="font_color" class="form-control form-control-color" 
                                       value="<?php echo $font_color; ?>" style="width: 80px; height: 45px;">
                                <span class="text-muted small">Pick any color</span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">Save Settings</button>
                    </form>
                </div>
            </div>

            <!-- Preview Box -->
            <div class="card mt-4 border-info">
                <div class="card-header">👁 Current Preview</div>
                <div class="card-body">
                    <p style="font-size: <?php echo $font_size; ?>; color: <?php echo $font_color; ?>;">
                        This is a preview of your selected font size and color. 
                        Visit the Contact page to see these settings applied there too!
                    </p>
                    <small class="text-muted">
                        Size: <strong><?php echo $font_size; ?></strong> | 
                        Color: <strong><?php echo $font_color; ?></strong>
                    </small>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
