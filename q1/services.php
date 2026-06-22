<?php
session_start();

// Initialize or increment services page visit counter
if (!isset($_SESSION['services_visits'])) {
    $_SESSION['services_visits'] = 0;
}
$_SESSION['services_visits']++;
$visits = $_SESSION['services_visits'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
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
        <div class="col-md-10">

            <!-- Visit Counter Alert -->
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>🛠️ Welcome!</strong> You have visited this <strong>Services</strong> page
                <span class="badge bg-success fs-6"><?php echo $visits; ?></span>
                <?php echo ($visits == 1) ? 'time.' : 'times.'; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>

            <h2 class="mb-4 text-success">🛠️ Our Services</h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <div class="display-4 mb-3">💻</div>
                            <h5 class="card-title">Web Development</h5>
                            <p class="card-text text-muted">Modern and responsive websites built with latest technologies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <div class="display-4 mb-3">📱</div>
                            <h5 class="card-title">Mobile Apps</h5>
                            <p class="card-text text-muted">Cross-platform mobile applications for iOS and Android.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <div class="display-4 mb-3">🎨</div>
                            <h5 class="card-title">UI/UX Design</h5>
                            <p class="card-text text-muted">Beautiful and intuitive user interfaces and experiences.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Session Info Box -->
            <div class="card mt-4 border-success">
                <div class="card-body">
                    <h6 class="text-muted">📊 Session Visit Stats</h6>
                    <p class="mb-1">Contact Page Visits: <strong class="text-primary"><?php echo isset($_SESSION['contact_visits']) ? $_SESSION['contact_visits'] : 0; ?></strong></p>
                    <p class="mb-0">Services Page Visits: <strong class="text-success"><?php echo $visits; ?></strong></p>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
