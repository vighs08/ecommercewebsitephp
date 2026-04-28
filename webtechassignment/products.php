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

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('./ecommcer.webp') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .navbar {
            background-color: #333;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .navbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #ff6f61;
            border-radius: 5px;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #e95950;
            box-shadow: 0 4px 8px rgba(255, 110, 97, 0.3);
        }

        .header {
            text-align: center;
            color: white;
            padding: 100px 20px;
        }

        .header h1 {
            font-size: 3rem;
            font-weight: bold;
            margin: 0;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        .header .shop-btn {
            background-color: #ff6f61;
            color: #fff;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            font-size: 1.1rem;
            display: inline-block;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
        }

        .header .shop-btn:hover {
            background-color: #e95950;
        }

        .container {
            margin-top: 40px;
        }

        .product-grid {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .product-card {
            width: 30%;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-card h3 {
            font-size: 1.5rem;
            margin: 15px 0;
        }

        .product-card p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 15px;
        }

        .product-card .btn {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .product-card .btn:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .no-products {
            text-align: center;
            font-size: 1.5rem;
            color: #6c757d;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="product.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="header">
        <h1>Welcome to ShopNow for Students</h1>
        <p>Your one-stop online shop for all your needs!</p>
        <a href="#" class="shop-btn">Shop Now</a>
    </div>
    
    <div class="container">
        <h2 class="mb-4 text-white">Featured Products</h2>
        <a href="add_product.php" class="btn btn-success mb-3">Add New Product</a>
        <div class="product-grid">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="product-card">
                        <img src="assets/<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image" onerror="this.onerror=null; this.src='placeholder.jpg';"> <!-- Placeholder for broken images -->
                        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                        <p><strong>$<?php echo htmlspecialchars($row['price']); ?></strong></p>
                        <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                        <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"
                           onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-products">No products found. Please add some products!</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
