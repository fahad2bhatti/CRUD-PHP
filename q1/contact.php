<?php
session_start();

// Initialize or increment contact page visit counter
if (!isset($_SESSION['contact_visits'])) {
    $_SESSION['contact_visits'] = 0;
}
$_SESSION['contact_visits']++;
$visits = $_SESSION['contact_visits'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">MyWebsite</a>
        <div>
            <a href="contact.php" class="btn btn-outline-light btn-sm me-2">Contact</a>
            <a href="services.php" class="btn btn-outline-light btn-sm">Services</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Visit Counter Alert -->
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>👋 Welcome!</strong> You have visited this <strong>Contact</strong> page
                <span class="badge bg-primary fs-6"><?php echo $visits; ?></span>
                <?php echo ($visits == 1) ? 'time.' : 'times.'; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">📞 Contact Us</h4>
                </div>
                <div class="card-body">
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
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Session Info Box -->
            <div class="card mt-4 border-info">
                <div class="card-body">
                    <h6 class="text-muted">📊 Session Visit Stats</h6>
                    <p class="mb-1">Contact Page Visits: <strong class="text-primary"><?php echo $visits; ?></strong></p>
                    <p class="mb-0">Services Page Visits: <strong class="text-success"><?php echo isset($_SESSION['services_visits']) ? $_SESSION['services_visits'] : 0; ?></strong></p>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
