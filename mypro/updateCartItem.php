<?php
session_start();
// echo "<pre>";
// print_r($_POST);

$id=-1;



$cartItems=$_SESSION['cart'];
echo "<pre>";
foreach($cartItems as $key => $value) {
    if($value["id"] === $_POST["productId"]) {
        $id = $key;
    }
}
$_SESSION['cart'][$id]["quantity"] = $_POST["quantity"];
// Check if the required data is provided
if (isset($_POST['productId']) && isset($_POST['quantity'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Update the quantity of the item in the cart

     if($_SESSION['cart'][$id]['id']==$productId)
    $_SESSION['cart'][$id]['quantity'] = $quantity;

   

    // Check if a redirect URL is provided
    $redirectUrl = isset($_GET['redirect']) ? $_GET['redirect'] : 'showCart.php';

    // Redirect to the specified page
    header("Location: $redirectUrl");
    exit();
}
session_write_close();
?>