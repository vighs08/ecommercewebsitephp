<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Submission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background styling with gradient overlay */
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('./ecommcer.webp') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
        }

        /* Main container */
        .container {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #ffcb05;
            font-weight: bold;
            font-size: 2.5rem; /* Increased size for better visibility */
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Added shadow */
        }

        p {
            color: #f1f1f1;
            font-size: 1.2rem; /* Slightly larger for better readability */
            margin-bottom: 10px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7); /* Added shadow */
        }

        /* Styling the button */
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #ffcb05;
            color: #333;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2rem; /* Increased size for better visibility */
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        a:hover {
            background-color: #ffc107;
            transform: translateY(-2px);
        }

        /* Card styling for displaying message */
        .card {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            color: #333;
        }

        .icon {
            font-size: 50px;
            color: #ffcb05;
            margin-bottom: 20px;
        }

        .alert {
            background-color: rgba(255, 0, 0, 0.9);
            color: white;
            padding: 20px;
            margin-bottom: 15px;
            font-weight: bold;
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
        <?php
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the form data
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $message = htmlspecialchars(trim($_POST['message']));

            // Validate form data (optional)
            if (empty($name) || empty($email) || empty($message)) {
                echo "<div class='alert alert-danger'>All fields are required!</div>";
                exit;
            }

            // Display thank you message inside a Bootstrap card
            echo "<div class='card'>";
            echo "<div class='icon'>✨</div>"; // You can replace this with a FontAwesome icon or image
            echo "<h2>Thank you, " . $name . "!</h2>";
            echo "<p><strong>Email:</strong> " . $email . "</p>";
            echo "<p><strong>Message:</strong> " . $message . "</p>";
            echo "</div>";
            echo "<a href='contact.php'>Go back to Contact Page</a>";
        } else {
            // If accessed directly without submitting the form
            echo "<div class='alert alert-warning'>Invalid Request</div>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
