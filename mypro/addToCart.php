<?php
// session_start();
// $data = json_decode(file_get_contents('php://input'), true);
// // Use $data as an associative array containing your POST data
// if (!isset($_SESSION['cart'])) {
//     $_SESSION['cart'] = [];
// }
// if (isset($data['productId']) && isset($data['productName']) && isset($data['productPrice']) ) {
//     $productId = $data['productId'];
//     $productName = $data['productName'];
//     $productPrice = $data['productPrice'];
//     $productQuantity = $data['productQuantity'];

//     // foreach ($_SESSION["cart"] as $item) {
//     //     if ($item['id'] == $productId) {
//     //         $item['quantity']++; // You can customize this logic based on your requirements
           

//     //         break;
//     //     }
//     // }

//     // Add the product to the cart
//     $_SESSION['cart'][] = [
//         'id' => $productId,
//         'name' => $productName,
//         'price' => $productPrice,
//         'quantity' =>$productQuantity
//     ];

//     // Check if a redirect URL is provided
//     $redirectUrl = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';

//     // Redirect to the specified page
//  } else {
//     // Handle invalid request
//     echo 'Invalid request';
// }
session_start();
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($data['productId']) && isset($data['productName']) && isset($data['productPrice']) && isset($data['productQuantity'])) {
    $productId = $data['productId'];
    $productName = $data['productName'];
    $productPrice = $data['productPrice'];
    $productQuantity = $data['productQuantity'];

    // Check if the product is already in the cart
    $productIndex = -1;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $productId) {
            $productIndex = $key;
            break;
        }
    }
    if ($productIndex !== -1) {
        // Product already exists, increase quantity
        $_SESSION['cart'][$productIndex]['quantity'] += $productQuantity;
    } else {
        // Product not in cart, add it
        $_SESSION['cart'][] = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => $productQuantity
        ];
    }

    // Check if a redirect URL is provided
    $redirectUrl = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';

    // Redirect to the specified page
    header("Location: $redirectUrl");
    exit();
} else {
    // Handle invalid request
    echo 'Invalid request';
}

?>