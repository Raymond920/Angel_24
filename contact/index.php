<!DOCTYPE html>
<html>
    <head>
        <title>Angel 24 - Contact Us</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/mystyle1.css"> <!-- Link to your external CSS -->
        <style>
            /* Add custom styles here or in your mystyle1.css file */

            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            .contact-container {
                width: 50%;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }

            h1 {
                text-align: center;
                color: #333;
            }

            p {
                text-align: center;
                color: #666;
            }

            .contact-info {
                margin-bottom: 20px;
            }

            .contact-info p {
                font-size: 16px;
                margin: 10px 0;
                color: #333;
            }

            .contact-info i {
                margin-right: 10px;
                color: #007BFF;
            }

            form {
                display: flex;
                flex-direction: column;
            }

            label {
                font-weight: bold;
                margin-bottom: 5px;
                color: #333;
            }

            input[type="text"],
            input[type="email"],
            textarea {
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 16px;
                width: 100%;
            }

            textarea {
                resize: none;
            }

            .submit-btn {
                background-color: #007BFF;
                color: white;
                padding: 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            .submit-btn:hover {
                background-color: #0056b3;
            }

            @media (max-width: 768px) {
                .contact-container {
                    width: 80%;
                }
            }
        </style>
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>

        <div class="contact-container">
            <h1>Contact Us</h1>
            <p>If you have any questions or need further assistance, feel free to reach out to us through the form below.</p>

            <div class="contact-info">
                <p><i class="fa fa-map-marker"></i> 12 Shopping Lane, E-commerce City, EC 56789</p>
                <p><i class="fa fa-phone"></i> +123 456 7890</p>
                <p><i class="fa fa-envelope"></i> support@angel24.com</p>
            </div>

            <form action="submit_contact_form.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="6" required></textarea>

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>

    </body>
</html>
