<?php
session_start();
require_once 'db.configure.php';

class ProductController {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // a. Display all products
    public function index() {
        $stmt = $this->conn->prepare("SELECT * FROM products ORDER BY id DESC");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/index.php';
    }

    // b. Show form to create new product
    public function create() {
        include 'views/create.php';
    }

    // c. Store new product in database
    public function store($data) {
        $stmt = $this->conn->prepare(
            "INSERT INTO products (name, description, price, quantity) 
             VALUES (:name, :description, :price, :quantity)"
        );
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':quantity', $data['quantity']);
        $stmt->execute();
        header("Location: index.php?action=index&success=1");
        exit();
    }

    // d. Show single product by ID
    public function show($id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        include 'views/show.php';
    }
}

// Router
$controller = new ProductController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store($_POST);
        break;
    case 'show':
        $controller->show($_GET['id']);
        break;
    default:
        $controller->index();
}
?>
