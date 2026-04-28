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
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background: url('./ecommcer.webp') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
        }
        .product-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            overflow: hidden;
            max-width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-card h3 {
            color: #007bff;
            margin: 15px 0;
        }
        .product-card p {
            padding: 0 15px;
            color: #6c757d;
        }
        .product-card strong {
            color: #28a745;
        }
        .product-card .btn {
            background-color: #007bff;
            color: white;
            margin-bottom: 15px;
            border-radius: 20px;
            padding: 10px 20px;
        }
        .product-card .btn:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        /* Responsive grid */
        @media (max-width: 768px) {
            .col-md-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
        .navbar {
            background-color: #333;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            z-index: 1;
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
    </style>
</head>
<body>
<div class="navbar">
        <ul>
            <li><a href="products.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <h2>Shop</h2>
    <div class="container">
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="product-card">
                            <img src="assets/<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image">
                            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                            <p><?php echo htmlspecialchars($row['description']); ?></p>
                            <p><strong>$<?php echo htmlspecialchars($row['price']); ?></strong></p>
                            <a href="cart.php?action=add&id=<?php echo $row['id']; ?>" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">No products available.</p>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
