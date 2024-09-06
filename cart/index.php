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
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/mystyle1.css">
    <link rel="stylesheet" href="../style/displayItem.css">
    <link rel="stylesheet" href="../style/cart.css">
    <link rel="stylesheet" href="../style/animation.css">
    <link rel="stylesheet" href="../style/quantitySelector.css">
</head>
<body>
    <?php include("../includes/header.php"); ?>
    <?php include("../includes/navigation.php"); ?>

    <article class="cart-page">
        <section class="bg-frame">
        <h1 class="title"><div class="inner glitch"><span>Cart</span></div></h1>

        <div class='cart-item'>
            <?php include("list_cart.php"); ?>
        </div>
        </section>
    </article>

</body>
</html>
