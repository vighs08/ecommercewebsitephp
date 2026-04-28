<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'e-commerce_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: products.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
