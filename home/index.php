<?php 
session_start();
// Check if the user is not logged in
if(!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Angel 24</title>
        <link rel="stylesheet" href="../style/mystyle1.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>
        <div class="top-section-container fade-in">
            <div class="welcome-container">
            <video id="wallpaper" autoplay muted loop poster="../images/Sanctum_Tower_1.png">
                <source src="../home_background.mp4" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <div class="dot-background"></div>
            <h1>Welcome To Angel_24, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            </div>
        </div>

        <div class="content-container">
            <?php include('displayAll.php'); ?>
        </div>

    </body>
</html>