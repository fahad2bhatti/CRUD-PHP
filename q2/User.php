<?php
require_once 'db.configure.php';

class User {
    private $conn;
    private $table = 'users';

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Login user by email and password
    public function login($email, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email AND password = :password LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get all borrowed books
    public function getAllBooks() {
        $query = "SELECT * FROM Books_borrowed ORDER BY student_id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add new book/student record
    public function addBook($data) {
        $query = "INSERT INTO Books_borrowed 
                  (student_name, father_name, cnic, email, password, address, age, bs_program, book_title, borrow_date, return_date)
                  VALUES (:student_name, :father_name, :cnic, :email, :password, :address, :age, :bs_program, :book_title, :borrow_date, :return_date)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_name', $data['student_name']);
        $stmt->bindParam(':father_name', $data['father_name']);
        $stmt->bindParam(':cnic', $data['cnic']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':age', $data['age']);
        $stmt->bindParam(':bs_program', $data['bs_program']);
        $stmt->bindParam(':book_title', $data['book_title']);
        $stmt->bindParam(':borrow_date', $data['borrow_date']);
        $stmt->bindParam(':return_date', $data['return_date']);
        return $stmt->execute();
    }

    // Get single book by ID
    public function getBookById($id) {
        $query = "SELECT * FROM Books_borrowed WHERE student_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update book record
    public function updateBook($id, $data) {
        $query = "UPDATE Books_borrowed SET 
                  student_name = :student_name,
                  book_title = :book_title,
                  bs_program = :bs_program,
                  return_date = :return_date
                  WHERE student_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_name', $data['student_name']);
        $stmt->bindParam(':book_title', $data['book_title']);
        $stmt->bindParam(':bs_program', $data['bs_program']);
        $stmt->bindParam(':return_date', $data['return_date']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete book record
    public function deleteBook($id) {
        $query = "DELETE FROM Books_borrowed WHERE student_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
