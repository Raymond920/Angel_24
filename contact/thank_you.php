<!DOCTYPE html>
<html>
<head>
    <title>Thank You!</title>
    <link rel="stylesheet" href="../style/mystyle1.css"> <!-- Link to your stylesheet -->
    <style>
        /* Add custom styles here or in your mystyle1.css file */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .thank-you-container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 30px;
        }

        .return-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .return-link:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .thank-you-container {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <?php include("../includes/header.php"); ?>
    <?php include("../includes/navigation.php"); ?>

    <div class="thank-you-container">
        <h1>Thank You for Your Message!</h1>
        <p>We appreciate you contacting us. One of our customer service colleagues will get back in touch with you soon! Have a great day!</p>
        <a href="index.php" class="return-link">Return to Home</a>
    </div>

    <?php include("../includes/footer.php"); ?>
</body>
</html>