<?php 
    session_start();
    $previous_url = isset($_SERVER['HTTP_REFERER']) ? urlencode($_SERVER['HTTP_REFERER']) : '';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['product_id'])) {
        // Get the product type from the query string
        $pID = $_GET['product_id'];

        // Ensure the variable is safe to use
        $pID = htmlspecialchars($pID);

        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "angel_24");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else 

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("SELECT Product_Name, Product_Image, Description, Price, Stock FROM products WHERE Product_ID = ?");
        $stmt->bind_param("i", $pID);

        // Execute the statement
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result($pName, $pImage, $description, $price, $stock);

        // Fetch the result
        if ($stmt->fetch()) {

        } else {
            echo "<p>No product found with the given ID.</p>";
        }


        $stmt -> close();
        $conn -> close();

        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo htmlspecialchars($pName); ?></title>
        <link rel="stylesheet" href="../style/mystyle1.css">
        <link rel="stylesheet" href="../style/itemDetail.css">
        <link rel="stylesheet" href="../style/quantitySelector.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        </style>
        </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>
        <button onclick="history.back()"><i class="fa fa-arrow-left"></i></button>
        <div class="item-description-container">
            <div class="image-detail-container">
                <div class="image-container">
                    <img src="<?php echo htmlspecialchars($pImage); ?>" alt="<?php echo htmlspecialchars($pName); ?>">
                </div>
                <div class="detail-container">
                    <h3><?php echo htmlspecialchars($pName); ?></h3>
                    <p>RM<?php echo htmlspecialchars($price); ?></p>
                    <p>Stock left: <?php echo htmlspecialchars($stock); ?></p>
                    <h3>Description:</h3>
                    <article><?php echo htmlspecialchars($description); ?></article>


                    <?php if($stock > 0){ ?>
                        <form action="cart_update.php" method="post" class="quantity-form">
                            <label for="quantity">Quantity:</label>
                            <div class="quantity-selector">
                                <button type="button" class="quantity-btn" id="decrease">-</button>
                                <input type="number" id="quantity" name="quantity" value="0" min="0" max="<?php echo htmlspecialchars($stock); ?>">
                                <button type="button" class="quantity-btn" id="increase">+</button>
                            </div>
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($pID) ?>"> <!-- Hidden field for product ID -->
                            <input type="hidden" name="return_url" value="<?php echo htmlspecialchars($previous_url); ?>">
                            <button type="submit" value="quantity" id="add-to-cart">Add to Cart</button>
                        </form>
                    <?php } else { ?>
                        <p class="out-of-stock">Out of Stock</p>
                    <?php } ?>

                    <script src="quantitySelector.js"></script>

                </div>
            </div>
        </div>
    </body>
</html>