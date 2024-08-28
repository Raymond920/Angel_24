<!DOCTYPE html>
<html>
    <head>
        <title>Angel 24 - Contact Us</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/mystyle1.css">
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>

        <div class="contact-container">
            <h1>Contact Us</h1>
            <p>If you have any questions or need further assistance, feel free to reach out to us through the form below.</p>

            <div class="contact-info">
                <p><i class="fa fa-map-marker"></i> 1234 Shopping Lane, E-commerce City, EC 56789</p>
                <p><i class="fa fa-phone"></i> +123 456 7890</p>
                <p><i class="fa fa-envelope"></i> support@angel24.com</p>
            </div>

            <form action="/submit_contact_form.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="6" required></textarea>

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>

        <?php include("../includes/footer.php"); ?>
    </body>
</html>
