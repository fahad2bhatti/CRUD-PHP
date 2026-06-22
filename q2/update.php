<?php
session_start();
require_once 'User.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$user = new User();
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: Display_allocated_books.php");
    exit();
}

$book = $user->getBookById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'student_name' => $_POST['student_name'],
        'book_title'   => $_POST['book_title'],
        'bs_program'   => $_POST['bs_program'],
        'return_date'  => $_POST['return_date'],
    ];
    $user->updateBook($id, $data);
    header("Location: Display_allocated_books.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand"><img src="numl_logo.jpeg" height="45" class="me-2">NUML Library</a>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h5 class="mb-0">✏️ Update Book Record</h5>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Student Name</label>
                            <input type="text" name="student_name" class="form-control" required
                                   value="<?php echo htmlspecialchars($book['student_name']); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Book Title</label>
                            <input type="text" name="book_title" class="form-control"
                                   value="<?php echo htmlspecialchars($book['book_title']); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">BS Program</label>
                            <select name="bs_program" class="form-select">
                                <?php foreach(['BSCS','BSIT','BSSE','BSAI','BBA','BS English'] as $prog): ?>
                                    <option value="<?php echo $prog; ?>" <?php echo $book['bs_program'] == $prog ? 'selected' : ''; ?>>
                                        <?php echo $prog; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Return Date</label>
                            <input type="date" name="return_date" class="form-control"
                                   value="<?php echo $book['return_date']; ?>">
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning">Update</button>
                            <a href="Display_allocated_books.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
