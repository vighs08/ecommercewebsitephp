<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background-image: url('./ecommcer.webp'); /* Set background image */
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the background image */
            color: white;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        p {
            font-size: 1.2rem;
            margin: 20px 0;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .btn-custom {
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-size: 1.2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-custom:hover {
            transform: scale(1.1);
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.5);
        }

        .container {
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            padding: 4rem 2rem;
            border-radius: 15px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1>Welcome to the E-commerce Platform</h1>
        <p class="lead mt-3">A perfect place to buy and sell your favorite products!</p>
        <a href="signup.php" class="btn btn-success btn-custom mt-4">Sign Up</a>
        <a href="login.php" class="btn btn-primary btn-custom mt-4">Login</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
