<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/mystyle2.css">
    </head>
    <body>
        <?php include("../includes/header.php"); ?>

        <video id="wallpaper" autoplay muted loop poster="../wallpaper.jpeg">
            <source src="../wallpaper.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        
        <?php include("registerForm.php"); ?>
        
    </body>
</html>