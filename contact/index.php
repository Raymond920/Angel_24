<?php 
session_start();
//Check if the user is not logged in
if(!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Angel 24 - Contact Us</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/mystyle1.css"> <!-- Link to your external CSS -->
        <link rel="stylesheet" href="../style/contactForm.css">
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>
        <div class="contact-page">
            <div class="contact-container">
                <h1>Contact Us</h1>
                <p>If you have any questions or need further assistance, feel free to reach out to us through the form below.</p>

                <div class="contact-info">
                    <p><i class="fa fa-map-marker"></i> 12 Shopping Lane, E-commerce City, EC 56789</p>
                    <p><i class="fa fa-phone"></i> +123 456 7890</p>
                    <p><i class="fa fa-envelope"></i> support@angel24.com</p>
                </div>

                <form action="submit_contact_form.php" class="contact-form" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" id="name" class="name-input" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="6" required></textarea>

                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
