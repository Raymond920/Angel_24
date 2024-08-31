document.addEventListener('DOMContentLoaded', () => {
    const quantityInput = document.getElementById('quantity');
    const increaseBtn = document.getElementById('increase');
    const decreaseBtn = document.getElementById('decrease');

    increaseBtn.addEventListener('click', () => {
        quantityInput.value = parseInt(quantityInput.value) + 1;
    });

    decreaseBtn.addEventListener('click', () => {
        if (parseInt(quantityInput.value) > 0) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    });
});
