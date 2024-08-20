

<!DOCTYPE html>
<html>
    <head>
        <title>Angel 24</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/mystyle1.css">
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>
        <h1>Cart</h1>
        <form action="add_to cart.php">
            <input type="hidden" name="" value="<?php  echo row["prod_id"]?>">
            <input type="submit" >
        </form>
    </body>
</html>