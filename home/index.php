<!DOCTYPE html>
<html>
    <head>
        <title>Angel 24</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/mystyle1.css?v=2.0">
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>

        <!-- Slide show for popular item -->
        <div class="popular_product">
            <h3>Popular product</h3>
            <div class="slideshow-container">
                <div class="product">
                    <img src="../shin_ramyum.jpeg">
                </div>
                <div class="product">
                    <img src="../prego_carbonara.jpeg">
                </div>
                <div class="product">
                    <img src="../shika.gif">
                </div>
                <a class="prev" onclick="plusSlides(-1)"><</a>
                <a class="next" onclick="plusSlides(1)">></a>
            </div>
        </div>
        <br>

        <div style="text-align: center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
        </div>


        <script>
            let productIndex = 1;
            showSlides(productIndex);

            function plusSlides(n) {
                showSlides(productIndex += n);
            }

            function currentSlide(n) {
                showSlides(productIndex = n);
            }

            function showSlides(n) {
                let i;
                let products = document.getElementsByClassName("product");  // store all elements which class is 'product' (image) in
                                                                            // an array called products
                let dots = document.getElementsByClassName("dot");  // store all elements which class is 'dot' in
                                                                    // an array called dots
                if (n > products.length) {  // if n exceed total number of product image, set to the 1 which is first product
                    productIndex = 1;
                }    
                if (n < 1) {    // if n smaller than 1, set to total number of product image which is the last product
                    productIndex = products.length;
                }
                for (i = 0; i < products.length; i++) {     // set all images to none (invisible/remove)
                    products[i].style.display = "none";  
                }
                for (i = 0; i < dots.length; i++) {     // replace 'active' class in dot to ''
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                products[productIndex-1].style.display = "block";   // display the chosen image
                dots[productIndex-1].className += " active";    // add new class 'active' to chosen dot
            }
        </script>
    </body>
</html>