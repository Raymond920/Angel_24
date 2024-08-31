document.addEventListener('DOMContentLoaded', () => {
    const quantityInput = document.getElementById('quantity');
    const increaseBtn = document.getElementById('increase');
    const decreaseBtn = document.getElementById('decrease');
    const addToCartBtn = document.querySelector('button[type="submit"]');

    const maxStock = parseInt(quantityInput.getAttribute('max'));

    // Function to update button states
    function updateButtonStates() {
        const currentQuantity = parseInt(quantityInput.value);

        increaseBtn.disabled = currentQuantity >= maxStock;
        decreaseBtn.disabled = currentQuantity <= 0;
        addToCartBtn.disabled = currentQuantity > maxStock || currentQuantity <= 0;
    }

    increaseBtn.addEventListener('click', () => {
        if (parseInt(quantityInput.value) < maxStock) {
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }
        updateButtonStates(); // Update button states after increment
    });

    decreaseBtn.addEventListener('click', () => {
        if (parseInt(quantityInput.value) > 0) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
        updateButtonStates(); // Update button states after decrement
    });

    // Initialize button states on page load
    updateButtonStates();
});
