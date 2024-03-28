document.addEventListener('DOMContentLoaded', function () {
    // Add to Cart button click event
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            
            const productId = this.parentElement.getAttribute('data-product-id');
            const productName = this.parentElement.getAttribute('data-product-name');
            const productPrice = this.parentElement.getAttribute('data-product-price');
            const productQuantity = this.parentElement.getAttribute('data-product-quantity');

            // Send data to server (you can use AJAX or a form submission)
            addToCart(productId, productName, productPrice, productQuantity);
        });
    });

    // Function to send data to server (you can modify this based on your server-side implementation)
    function addToCart(productId, productName, productPrice, productQuantity) {
        // You can use AJAX to send the data to the server
        // For simplicity, let's use a basic query string in this example
        const url = 'addToCart.php?productId=' + encodeURIComponent(productId) +
                    '&productName=' + encodeURIComponent(productName) +
                    '&productPrice=' + encodeURIComponent(productPrice) +
                    '&productQuantity=' + encodeURIComponent(productQuantity);

        // Redirect to the server-side script (addToCart.php in this case)
        window.location.href = url + '&redirect=showCart.php';
    }
});