document.addEventListener('DOMContentLoaded', () => {
    const quantityInput = document.getElementById('quantity');
    const increaseBtn = document.getElementById('increase');
    const decreaseBtn = document.getElementById('decrease');
    const addToCartBtn = document.getElementById('add-to-cart');
    const formElement = document.querySelector('.quantity-form');

    // Ensure the quantity input has a max attribute and parse it
    const maxStock = parseInt(quantityInput.getAttribute('max'));

    // Create an element to show error messages
    const errorMsg = document.createElement('p');
    errorMsg.className = 'error-message';
    errorMsg.style.color = 'red';  // Make error message red for visibility
    errorMsg.style.display = 'none';  // Hide error message by default
    formElement.parentNode.insertBefore(errorMsg, formElement.nextSibling);

    // Function to update button states
    function updateButtonStates() {
        const currentQuantity = parseInt(quantityInput.value);

        // Ensure currentQuantity is a number
        if (isNaN(currentQuantity)) {
            quantityInput.value = 0;
        }

        // Update button states
        increaseBtn.disabled = currentQuantity >= maxStock;
        decreaseBtn.disabled = currentQuantity <= 0;
        addToCartBtn.disabled = currentQuantity === 0;

        // Debugging: Log button states
        console.log('Increase Button Disabled:', increaseBtn.disabled);
        console.log('Decrease Button Disabled:', decreaseBtn.disabled);
        console.log('Add to Cart Button Disabled:', addToCartBtn.disabled);
    }

    // Function to show error message
    function showError(message) {
        errorMsg.textContent = message;
        errorMsg.style.display = 'block';  // Show the error message
    }

    // Function to hide error message
    function hideError() {
        errorMsg.style.display = 'none';  // Hide the error message
    }

    increaseBtn.addEventListener('click', () => {
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity < maxStock) {
            quantityInput.value = currentQuantity + 1;
        }
        hideError();  // Hide error message on valid input
        updateButtonStates();  // Update button states after increment
    });

    decreaseBtn.addEventListener('click', () => {
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > 0) {
            quantityInput.value = currentQuantity - 1;
        }
        hideError();  // Hide error message on valid input
        updateButtonStates();  // Update button states after decrement
    });

    // Listen for direct input changes
    quantityInput.addEventListener('input', () => {
        let currentQuantity = parseInt(quantityInput.value);

        if (isNaN(currentQuantity) || currentQuantity < 0) {
            showError('Please enter a valid number greater than or equal to 0.');
            quantityInput.value = 0;  // Reset to 0 if input is invalid
        } else if (currentQuantity > maxStock) {
            showError(`Quantity cannot exceed ${maxStock}.`);
            quantityInput.value = maxStock;  // Reset to max if input is too high
        } else {
            hideError();  // Hide error message if input is valid
        }

        updateButtonStates();  // Update button states after input change
    });

    // Initialize button states on page load
    updateButtonStates();
});
