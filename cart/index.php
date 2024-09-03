<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/mystyle1.css">
    <link rel="stylesheet" href="../style/cart.css">
    <link rel="stylesheet" href="../style/quantitySelector.css">
</head>
<body>
    <?php include("../includes/header.php"); ?>
    <?php include("../includes/navigation.php"); ?>

    <h3>Cart</h3>

    <div class='cart-item'>
        <?php include("list_cart.php"); ?>
    </div>


</body>
</html>
