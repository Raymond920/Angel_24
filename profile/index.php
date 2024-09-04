<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit profile</title>
        <link rel="stylesheet" href="../style/mystyle1.css">
        <link rel="stylesheet" href="../style/edit_profile.css">
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>
        <div class="present-profile">
            <img src="../includes/profile_pic.php" alt="Image from Database"><br>
            <?php
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            $email = $_SESSION['email'];
            $phoneno = $_SESSION['phoneno'];
            echo "Username: ". $username. "<br>";
            echo "Password: ". $password. "<br>";
            echo "Email: ". $email. "<br>";
            echo "Phone number: ". $phoneno. "<br>";
            ?>
        </div>

        <div class="edit-form">
            <form action="profile_edit_form.php" enctype="multipart/form-data" class="profile_edit_form" method="POST">
                <label for="name">New Username:</label><br>
                <input type="text" id="name" class="name" name="name"><br><br>

                <label for="password">New Password:</label><br>
                <input type="text" id="password" name="password"><br><br>

                <label for="email">New Email:</label><br>
                <input type="email" id="email" name="email"><br><br>

                <label for="phoneno">New Phone number:</label><br>
                <input type="tel" id="phoneno" name="phoneno"><br><br>

                <label for="image">New profile picture:</label><br>
                <input type="file" name="image" id="image" accept="image/*"><br><br><br>

                <button type="submit" class="editbtn">Edit profile</button>
            </form>
        </div>
    </body>
</html>
