<?php
session_start();

// Get settings from session
$font_size = $_SESSION['font_size'] ?? '16px';
$font_color = $_SESSION['font_color'] ?? '#000000';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
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
        <a class="navbar-brand">📞 Contact Page</a>
        <a href="index.php" class="btn btn-outline-light btn-sm">← Back to Settings</a>
    </div>
</nav>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <!-- Session Settings Info -->
            <div class="alert alert-info">
                🎨 Settings applied from session — 
                Font Size: <strong><?php echo $font_size; ?></strong> | 
                Color: <strong><?php echo $font_color; ?></strong>
            </div>

            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">📞 Contact Us</h5>
                </div>
                <div class="card-body">
                    <p>This page uses the font settings you selected on the main page via PHP sessions.</p>

                    <form>
                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="4" placeholder="Write your message..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark">Send Message</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
