<?php
session_start();
require_once 'User.php';

// Auth check
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$user = new User();
$success = '';

// Handle form submission from Students_books.html
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'student_name' => $_POST['student_name'],
        'father_name'  => $_POST['father_name'],
        'cnic'         => $_POST['cnic'],
        'email'        => $_POST['email'],
        'password'     => $_POST['password'],
        'address'      => $_POST['address'],
        'age'          => $_POST['age'],
        'bs_program'   => $_POST['bs_program'],
        'book_title'   => $_POST['book_title'] ?? '',
        'borrow_date'  => $_POST['borrow_date'] ?? null,
        'return_date'  => $_POST['return_date'] ?? null,
    ];
    if ($user->addBook($data)) {
        $success = "Record added successfully!";
    }
}

$books = $user->getAllBooks();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUML Library - Allocations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand"><img src="numl_logo.jpeg" height="45" class="me-2">NUML Library</a>
        <div>
            <a href="Students_books.html" class="btn btn-success btn-sm me-2">+ Add New</a>
            <a href="Display_allocated_books.php" class="btn btn-outline-light btn-sm me-2">View All Books</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h4 class="mb-3">📋 Students Book Allocations List</h4>

    <?php if ($success): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Father Name</th>
                            <th>CNIC</th>
                            <th>Email</th>
                            <th>Program</th>
                            <th>Book Title</th>
                            <th>Borrow Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($books)): ?>
                            <tr><td colspan="9" class="text-center text-muted py-4">No records found. <a href="Students_books.html">Add one!</a></td></tr>
                        <?php else: ?>
                            <?php foreach ($books as $book): ?>
                            <tr>
                                <td><?php echo $book['student_id']; ?></td>
                                <td><?php echo htmlspecialchars($book['student_name']); ?></td>
                                <td><?php echo htmlspecialchars($book['father_name']); ?></td>
                                <td><?php echo htmlspecialchars($book['cnic']); ?></td>
                                <td><?php echo htmlspecialchars($book['email']); ?></td>
                                <td><?php echo htmlspecialchars($book['bs_program']); ?></td>
                                <td><?php echo htmlspecialchars($book['book_title']); ?></td>
                                <td><?php echo $book['borrow_date']; ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $book['student_id']; ?>" class="btn btn-warning btn-sm">Update</a>
                                    <a href="delete.php?id=<?php echo $book['student_id']; ?>" class="btn btn-danger btn-sm"
                                       onclick="return confirm('Delete this record?')">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
