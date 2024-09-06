<link rel="stylesheet" href="../style/form.css">

<div class="shipping-form-container">
    <form class="shipping-form" action="paymentSuccessful.php" method="post" onsubmit="return validatePaymentMethod();">
        <div class="shipping-form-grid">
            <input type="text" placeholder="First Name" name="first_name" class="two-column" required>
            <input type="text" placeholder="Last Name" name="last_name" class="two-column" required>
        </div>
        <input type="text" placeholder="Street Address" name="street" required><br>
        <input type="text" placeholder="Apt / Suite / Unit (Optional)" name="unit"><br>
        <div class="shipping-form-grid">
            <input type="text" placeholder="City" name="city" class="two-column" required>
            <input type="text" placeholder="State" name="state" class="two-column" required>
        </div>
        <input type="text" placeholder="Postcode" name="postcode" required>
        <?php include("list_checkout_item.php"); ?>

        <!-- Add payment method selection -->
        <div class='payment-method-container'>
            <div class='payment-options'>
            <h4>Select Payment Method:</h4>
                <div>
                    <label>
                        <input type='radio' name='payment_method' value='tng' required>
                        <div class="payment-method-image-container">
                            <img src='../images/payment/tng.png' alt='tng' class='payment-logo'>
                        </div>
                    </label>
                    <label>
                        <input type='radio' name='payment_method' value='fpx' required>
                        <div class="payment-method-image-container">
                        <img src='../images/payment/fpx.png' alt='FPX' class='payment-logo'>
                        </div>
                    </label>
                    <label>
                        <input type='radio' name='payment_method' value='mastercard' required>
                        <div class="payment-method-image-container">
                        <img src='../images/payment/mastercard.png' alt='Mastercard' class='payment-logo'>
                        </div>
                    </label>
                    <label>
                        <input type='radio' name='payment_method' value='paypal' required>
                        <div class="payment-method-image-container">
                        <img src='../images/payment/paypal.png' alt='PayPal' class='payment-logo'>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="payment-button">Proceed to Payment</button>
    </form>
</div>


<script>
    document.querySelector('form').addEventListener('submit', function(event) {
    const paymentMethods = document.getElementsByName('payment_method');
    let isChecked = Array.from(paymentMethods).some(input => input.checked);

    if (!isChecked) {
        alert('Please select a payment method.');
        event.preventDefault(); // Prevent form submission
    }
});

</script>