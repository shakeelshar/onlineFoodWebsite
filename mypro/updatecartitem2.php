<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = isset($_POST['productId']) ? $_POST['productId'] : null;
    $newQuantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    if ($productId !== null) {
        // Loop through the cart items and update the quantity for the matching product ID
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] = $newQuantity;
                break;
            }
        }
        unset($item); // Unset the reference to avoid potential issues

        // Calculate the new total price for the product
        $newTotalPrice = $item['price'] * $newQuantity;

        // Respond with JSON data including the updated quantity and total price
        echo json_encode(['quantity' => $newQuantity, 'totalPrice' => $newTotalPrice]);

        // Optionally, you may want to perform additional validation or checks here
       header("location:showCart.php");
        exit();
    }
}

// Handle the case when the form is not submitted or the product ID is not provided
echo json_encode(['error' => 'Invalid request']);
exit();
?>
