<?php
session_start();
require_once 'User.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? null;

if ($id) {
    $user = new User();
    $user->deleteBook($id);
}

header("Location: Display_allocated_books.php");
exit();
?>
