<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background: url('./ecommcer.webp') no-repeat center center fixed; /* Background image */
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7); /* Dark overlay for contrast */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
            font-weight: bold;
        }
        .form-label {
            color: #ddd;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent input fields */
            border: none;
        }
        .form-control:focus {
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.7);
            border-color: #6c757d;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
        }
        .navbar {
        background-color: #333;
        padding: 10px 20px;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%; /* Make the navbar span the entire width */
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
    <!-- Navigation bar aligned to the right -->
    <div class="navbar">
        <ul>
            <li><a href="products.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Contact Form -->
    <div class="container">
        <h2>Contact Us</h2>
        <form action="submit_contact.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
