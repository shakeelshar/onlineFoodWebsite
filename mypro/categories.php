
<?php
session_start();
if(isset($_SESSION['cart'])){
$cart_count = count($_SESSION['cart']);
}

$id=$_REQUEST['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="file.css">
    <script src="cart.js" defer></script>
</head>

<body>

    <header>
        <a href="#" class="logo"><i class="fas fa-utensils"></i>FOOD</a>
        <h1 style="color:green;"> <?php  echo "Welcome..".$_SESSION['user']['name'];?></h1>
        <nav class="navebar">
        
            <a class="active" href="#home">Home</a>
            <a href="#dishes">Dishes</a>
            <a href="#about">About</a>
        
            <a href="#review">Review</a>
         
            <?php if($_SESSION['user']['email']=="shakeel@gmail.com" && $_SESSION['user']['password']=="1234" ){ ?>
            <a href="../curd/index.html" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Admin Panel</a>
           <?php }?>
           <a href="../curd/logout.php">Logout</a>
        </nav>
      
        <div class="icons">
         
            <i class="fas fa-bars" id="bars-m"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <a href="#" class="fas fa-heart"></a>
            <a href="showCart.php"  class="fas fa-shopping-cart">(<span id="items-qty"><?php if(isset($_SESSION['cart'])){echo $cart_count; } else{echo "0";}?></span>)</a>
            
        </div>
    </header>

    <form action="" id="search-form">
        <input type="search" name="" id="search-box" placeholder="Search here...">
        <label for="serach-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>
  

 
    <?php 
                $con = mysqli_connect("localhost:3306","root","","restaurant");

                $query = "SELECT * FROM category_item WHERE category_id ='".$id."'";

               $result = mysqli_query($con,$query);

               ?>

    <section class="dishes" id="dishes">
        <h3 class="sub-heading">Our dishes</h3>
        <h3 class="heading" style="margin-top:30px;"><?php echo $_REQUEST['name']; ?> -Category List</h3>
       
        
        <div class="box-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
            <div class="box" data-product-id="<?php echo $row['id']; ?>" data-product-name="<?php echo $row['item_name']; ?>" data-product-price="<?php echo $row['price']; ?>" data-product-quantity="1">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="<?php echo $row['image']; ?>" alt="" width="200px" height="200px">
                <h2><?php echo $row['item_name']; ?></h2>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
                <span>Rs $ <?php echo $row['price']; ?> only</span>
                <button class="btn cart-button" data-id="<?php echo $row["id"] ?>" data-name="<?php echo $row["item_name"] ?>" data-price="<?php echo $row["price"] ?>" data-quantity="1">Add to Cart</button>

            </div>
             <?php 
            }
            ?>
        </div>

    </section>
    <section class="about" id="about">
        <h3 class="sub-heading">About Us</h3>
        <h1 class="heading"> Why do you choose us?</h1>
        <div class="row">
            <div class="image">
                <img src="about.avif" alt="">
            </div>
            <div class="content">
                <h2>Best food in the country</h2>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut velit molestias laboriosam pariatur
                    suscipit neque, architecto quod excepturi aliquid facilis blanditiis quaerat dolorum optio rerum,
                    ipsam
                    eligendi incidunt. Dignissimos, impedit.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam dicta dolore doloribus ab quo ipsa a
                    eos praesentium fuga illo!</p>
                <div class="icons-continer">
                    <div class="icons">
                        <i class="fas fa-shipping-fast"></i>
                        <span>Free Home Delivery</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-dollar-sign"></i>
                        <span>Easy Payments</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-headset"></i>
                        <span>24 Hours servers</span>
                    </div>
                </div>
                <a href="#" class="btn">Learn More</a>
            </div>
        </div>
    </section>




    <section class="review" id="review">

        <h3 class="sub-heading">Customer's Review</h3>
        <h1 class="heading"> What they have Said??</h1>
        
    

        <div class="swiper review-slider">
            <div class="swiper-wrapper">

           
            <div class="swiper-slide slide">
                <div class="user">
                    <i class="fas fa-quote-right"></i>
                    <img src="pic-1.avif" alt="">
                    <div class="user-info">
                        <h2>John Deo</h2>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p> Laborum corrupti quod asperiores, quos
                    perferendis numquam eaque sequi vitae quae autem?</p>
                </div>

                  
            <div class=" swiper-slide slide">
                <div class="user">
                    <i class="fas fa-quote-right"></i>
                    <img src="oic2.avif" alt="">
                    <div class="user-info">
                        <h2>Warner Deo</h2>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p> Laborum corrupti quod asperiores, quos
                    perferendis numquam eaque sequi vitae quae autem?</p>
                </div>
                  
            <div class=" swiper-slide slide">
                <div class="user">
                    <i class="fas fa-quote-right"></i>
                    <img src="pic3.avif" alt="">
                    <div class="user-info">
                        <h2>John Deo</h2>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum corrupti quod asperiores, quos
                    perferendis numquam eaque sequi vitae quae autem?</p>
                </div>
                  
            <div class=" swiper-slide slide">
                <div class="user">
                    <i class="fas fa-quote-right"></i>
                    <img src="pic4.avif" alt="">
                    <div class="user-info">
                        <h2>Divid Warner</h2>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Laborum corrupti quod asperiores, quos
                    perferendis numquam eaque sequi vitae quae autem?</p>
                </div>
            </div>
        </div>

    </section>
   



<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Locations</h3>
            <a href="#">Pakistan</a>
            <a href="#">India</a>
            <a href="#">Bangladesh</a>
            <a href="#">USA</a>
            <a href="#">UK</a>

        </div>
        <div class="box">
            <h3>Quick Links</h3>
            <a href="#">Home</a>
            <a href="#">deshes</a>
            <a href="#">About</a>
            <a href="#">Menu</a>
            <a href="#">Review</a>
            <a href="#">Order</a>
        </div>
        
        <div class="box">
            <h3>Contect Info</h3>
            <a href="#">+92-3072789871</a>
            <a href="#">+92-311-2004567</a>
            <a href="#">shakeelshar07@gmail.com</a>
            <a href="#">Karachi-Pakistan 74000</a>
        </div>
        
        <div class="box">
            <h3>Follow Us</h3>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">LinkedIn</a>
            <a href="#">Twitter</a>

        </div>
   
    </div>
    <div class="credit">copyright @ 2023 <span>Mr,Shakeel ahmed</span></div>
</section>

<!-- <div class="loader-container">
    <img src="loader.gif" alt="">
  </div> -->





 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.6.2/dist/axios.min.js"></script>
    <script>
        const buttons = document.querySelectorAll(".cart-button");

        buttons.forEach(button => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                console.log(button.dataset.id);
                console.log(button.dataset.name);
                console.log(button.dataset.price);
                console.log(button.dataset.quantity);
                axios.post("addToCart.php", {
                    productId: button.dataset.id,
                    productName: button.dataset.name,
                    productPrice: button.dataset.price,
                    productQuantity: button.dataset.quantity
                })
                    .then(res => {
                        const qty = document.getElementById("items-qty");
                        const totalItems = parseInt(qty.textContent) + 1;
                        qty.textContent = totalItems;
                    })
                    .catch(err => {
                        console.log(err)
                    })
            })
        })
    </script> 


</body>

</html>

