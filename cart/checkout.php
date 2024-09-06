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
        <link rel="stylesheet" href="../style/previousButton.css">
        <link rel="stylesheet" href="../style/animation.css">
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>

        <article class="checkout-page">
            <section class="bg-frame">
                <button onclick="history.back()" class="previous-button"><i class="fa fa-arrow-left"></i></button>
                <h1 class="title"><div class="inner glitch"><span>Check Out</span></div></h1>
            <?php include("shippingForm.php"); ?>
            </section>
        </article>

    </body>
</html>