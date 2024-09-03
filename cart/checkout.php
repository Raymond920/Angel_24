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
        <title>Check Out</title>
        <link rel="stylesheet" href="../style/mystyle1.css">
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>
        <button onclick="history.back()"><i class="fa fa-arrow-left"></i></button>
        <h3>Check Out</h3>

        <?php include("shippingForm.php"); ?>

    </body>
</html>