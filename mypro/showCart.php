<?php
session_start();

$con = mysqli_connect("localhost","root","","restaurant");


$productId = isset($_GET['productId']) ? $_GET['productId'] : null;
// echo $productId;
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo 'Your cart is empty.';
} 

else {
    $cartItems = $_SESSION['cart'];
    $cart_count = count($_SESSION['cart']);

    ?> 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Shopping Cart</title>
        <style>
          body{
              background:grey;
              width: 100%;
              height: 100vh;
             
                    }
                    table{
                        border:30px solid black;
                        padding: 10px 1px;
                        margin:  10px 12px;
                        width:50%;
                         height: 10%;
                         color:white;
                       font-size:20px;
                      position: relative;
                      text-align:center;
                    }
                    .shar{
                        padding: 10px;
                        background:black;
                        border-radiusa:10px;
                        margin-right:10px;
                    
                    
                    }
                    .shar a{
                        color:white;
                        text-decoration:none;
                        margin-right:10px
                    }

        </style>
    </head>
    <body>
        <center>
        <h2 style="background-color:blue; width:50%; padding:20px; border-radius:10px font-sizwe 25px; color: white">Shopping Cart</h2>
        <table border="2" >
            <thead >
                <tr >
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                <?php
  
                $grandtotal=0;
                foreach ($_SESSION["cart"] as $items) {
                    echo '<form action="updateCartItem.php" method="post">';
                    echo "<div style='display: none;' class='food-price-" . $items["id"] ."'>" . $items["price"] . "</div>";
                    echo '<tr>';
                    echo '<td>' . $items['name'] . '</td>';
                    // echo ' <td class="quantity-'. $items['id'] .'"><input type="number" name="price-"  data-id="'. $items["id"] .'" value="' .  $items['price'] * $items["quantity"]. '" min="1" />';
                    echo '<td>$<span class="price-' . $items["id"] . '">' . $items['price'] * $items["quantity"] . '</span></td>';
                    echo "<input type='hidden' value=". $items["price"] . " id='price-" . $items["id"] . "' />";
                    // echo ' <td><input type="number" name="quantity-"  data-id="'. $items["id"] .'" value="' . $items["quantity"] . '" min="1" />';
                    echo '<td class="quantity-'. $items['id'] .'">'. $items["quantity"] . '</td>';
                    echo '<td>';
                   
                    echo '<input type="number" name="quantity" class="change-product" data-id="'. $items["id"] .'" value="' . $items["quantity"] . '" min="1" />';
                    echo '<input type="hidden" name="productId" value="' .$items['id']. '" />';
                    echo '</form>';
                    echo '</td>';
                    echo '<td><a href="remove_item.php?productId=' . $items['id'] . '">Remove</a></td>';
                    echo '</tr>';
                    $total=$items['price']*1;
                    $grandtotal+=$total;
                    Echo "<br>";
                   
                    
                  
                //    if($c==$cart_count){
                //    $final = $grandtotal;
                //    }
                }
                
             
                ?>
            </tbody>
        </table>
        <button class="shar"><a href="index.php">Back to Product Catalog</a></button>
        <button class="shar"><a href="receipt.php">Generate Invoice</a></button>
        <button class="shar"><a href="update_cart.php">Update My Cart</a></button>
            </body>
            </html>
        <?php
        ?>
        
        </center>
  
    <?php
}

// echo "<pre>";
// print_r($_SESSION['cart']);


?>


<!-- <script>
            document.addEventListener('DOMContentLoaded', function () {
            var myInput = document.querySelectorAll('.change-product');

            const calculate_price = (id, quantity) => {
                const price = document.querySelector(".food-price-" + id);
                const priceLabel = document.querySelector(`.price-${id}`);
                const qty = document.querySelector(`.quantity-${id}`);

            if(!quantity) {
                priceLabel.textContent = " - ";
                return;
            }

                // console.log(parseInt(price.textContent));
                const total_value = parseInt(price.textContent) * parseInt(quantity);

                priceLabel.textContent = total_value;
                qty.textContent = quantity;
            }

        
            myInput.forEach(input => {
                

            // Add event listener for the 'input' event
            input.addEventListener('keyup', function () {
            calculate_price(input.dataset.id, input.value);
            // You can perform other actions here when the value changes
            });
            
            input.addEventListener('change', function () {
                
                calculate_price(input.dataset.id, input.value);
                // You can perform other actions here when the value changes
            });
            })

        });
        </script> -->

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.change-product').on('change', function () {
            var productId = $(this).data('id');
            var quantity = $(this).val();
            updateCartItem(productId, quantity);
        });

        function updateCartItem(productId, quantity) {
            $.ajax({
                type: 'POST',
                url: 'updateCartItem.php',
                data: {
                    productId: productId,
                    quantity: quantity
                },
                success: function () {
                    // Optionally, you can update the UI or perform other actions after a successful update
                }
            });
        }
    });
</script> -->

<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.change-product').on('change', function () {
            var productId = $(this).data('id');
            var quantity = $(this).val();
            updateCartItem(productId, quantity);
        });

        function updateCartItem(productId, quantity) {
            $.ajax({
                type: 'POST',
                url: 'updatecartitem2.php',
                data: {
                    productId: productId,
                    quantity: quantity
                },
                success: function (response) {
                    // Parse the JSON response from the server
                    var data = JSON.parse(response);

                    // Update the quantity and total price in the UI
                    $('.quantity-' + productId).text(data.quantity);
                    $('.price-' + productId).text(data.totalPrice);

                    // Optionally, you can update the UI or perform other actions after a successful update
                }
            });
        }
    });
</script>

<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('form').on('change', '.change-product', function () {
            var form = $(this).closest('form');
            var productId = form.find('[name="productId"]').val();
            var quantity = form.find('[name="quantity"]').val();
            updateCartItem(productId, quantity);
        });

        function updateCartItem(productId, quantity) {
            $.ajax({
                type: 'POST',
                url: 'updatecartitem2.php',
                data: {
                    productId: productId,
                    quantity: quantity
                },
                success: function (response) {
                    try {
                        var data = JSON.parse(response);

                        // Update the quantity and total price in the UI
                        var row = $('.quantity-' + productId).closest('tr');
                        row.find('.quantity-' + productId).text(data.quantity);
                        row.find('.price-' + productId).text(data.totalPrice);

                        // Optionally, you can update the UI or perform other actions after a successful update
                    } catch (error) {
                        console.error('Error parsing JSON:', error);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX request failed:', error);
                }
            });
        }
    });
</script> -->



