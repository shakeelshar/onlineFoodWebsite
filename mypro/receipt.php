<?php
session_start();

// Check if the cart is not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cartItems = $_SESSION['cart'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
        }


                    .shar{
                        padding: 10px;
                        background:black;
                        border-radiusa:10px;
                        margin-right:10px;
                       
                    
                    
                    }

                        
                    

   
    </style>
</head>

<body>

    <h2>Receipt</h2>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalAmount = 0;

            foreach ($cartItems as $item) {
                $productName = $item['name'];
                $productPrice = $item['price'];
                 $productquantity = $item['quantity'];
                $total = $productPrice * $productquantity;

                // $totalAmount += $total;
                $totalAmount+=$total;
            ?>
            <tr>
               
                <td><?php echo $productName; ?></td>
                <td><?php echo '$' . number_format($productPrice, 2); ?></td>
                <td><?php echo $productquantity; ?></td>
                <td><?php echo '$' . number_format($total, 2); ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Amount</th>
                <th><?php echo '$' . number_format($totalAmount, 2);  ?></th>
            </tr>
        </tfoot>
    </table>

    <center><button class="shar" ><a style=" color:white; text-decoration:none;" href="checkout.php">Place Order</a></button></center>

    <p>Thank you for shopping with us!</p>

</body>

</html>

<?php
} else {
    echo "Your cart is empty. Add items to the cart before generating a receipt.";
}
?>
