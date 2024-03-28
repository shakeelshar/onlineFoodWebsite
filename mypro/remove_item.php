<?php
session_start();





$cartItems=$_SESSION['cart'];

// Check if the required data is provided
if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    $id = -1;
    foreach($cartItems as $key => $value) {
        if($value["id"] === $_GET["productId"]) {
            $id = $key;
        }
    }

    // Update the quantity of the item in the cart

    if($_SESSION['cart'][$id]['id']==$productId)
    unset($_SESSION['cart'][$id]);

   

    // Check if a redirect URL is provided
    $redirectUrl = isset($_GET['redirect']) ? $_GET['redirect'] : 'showCart.php';

    // Redirect to the specified page
    header("Location: $redirectUrl");
    exit();
}
?>