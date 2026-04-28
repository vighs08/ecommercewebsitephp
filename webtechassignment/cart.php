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

// Check if an item is being added to the cart
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    // Add product to the cart session
    $_SESSION['cart'][] = $product_id;
}

// Fetch product details from the cart
$cart_products = isset($_SESSION['cart']) ? array_unique($_SESSION['cart']) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background: url('./ecommcer.webp') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            position: relative;
        }

        /* Dark overlay on the background */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent overlay */
            z-index: -1;
        }

        /* Navbar styles */
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

        /* Product card and other styles */
        h2 {
            text-align: center;
            margin-top: 30px;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .product-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 15px;
            width: 100%;
            max-width: 320px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .product-card h3 {
            color: #343a40;
            margin-bottom: 10px;
        }

        .product-card p {
            color: #6c757d;
        }

        .product-card strong {
            color: #28a745;
            font-size: 1.2rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .empty-cart {
            text-align: center;
            color: #fff;
            font-size: 1.5rem;
            margin-top: 50px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .container {
            padding: 30px 0;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <div class="navbar">
        <ul>
            <li><a href="products.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>Your Cart</h2>
        <div class="product-grid">
            <?php if (count($cart_products) > 0): ?>
                <?php
                $ids = implode(',', $cart_products);
                $sql = "SELECT * FROM products WHERE id IN ($ids)";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()): ?>
                    <div class="product-card">
                        <img src="assets/<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image">
                        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                        <p><strong>$<?php echo htmlspecialchars($row['price']); ?></strong></p>
                        <a href="checkout.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Checkout</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="empty-cart">Your cart is empty.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
