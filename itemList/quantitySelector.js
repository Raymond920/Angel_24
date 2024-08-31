document.addEventListener('DOMContentLoaded', () => {
    const quantityInput = document.getElementById('quantity');
    const increaseBtn = document.getElementById('increase');
    const decreaseBtn = document.getElementById('decrease');
    const addToCartBtn = document.getElementById('add-to-cart');

    // Ensure the quantity input has a max attribute and parse it
    const maxStock = parseInt(quantityInput.getAttribute('max'));

    // Function to update button states
    function updateButtonStates() {
        const currentQuantity = parseInt(quantityInput.value);

        // Debugging: Log current quantity and max stock
        console.log('Current Quantity:', currentQuantity);
        console.log('Max Stock:', maxStock);

        // Update button states
        increaseBtn.disabled = currentQuantity >= maxStock;
        decreaseBtn.disabled = currentQuantity <= 0;
        addToCartBtn.disabled = currentQuantity === 0;

        // Debugging: Log button states
        console.log('Increase Button Disabled:', increaseBtn.disabled);
        console.log('Decrease Button Disabled:', decreaseBtn.disabled);
        console.log('Add to Cart Button Disabled:', addToCartBtn.disabled);
    }

    increaseBtn.addEventListener('click', () => {
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity < maxStock) {
            quantityInput.value = currentQuantity + 1;
        }
        updateButtonStates(); // Update button states after increment
    });

    decreaseBtn.addEventListener('click', () => {
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > 0) {
            quantityInput.value = currentQuantity - 1;
        }
        updateButtonStates(); // Update button states after decrement
    });

    // Initialize button states on page load
    updateButtonStates();
});
