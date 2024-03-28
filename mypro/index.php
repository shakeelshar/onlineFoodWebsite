
<?php
session_start();
if(isset($_SESSION['cart'])){
$cart_count = count($_SESSION['cart']);
}
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
    <?php 
                $con = mysqli_connect("localhost:3306","root","","restaurant");

                $query = "SELECT * FROM fooditem";

               $result = mysqli_query($con,$query);

               ?>
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

                $query = "SELECT * FROM category";

               $result = mysqli_query($con,$query);

               ?>

    <section class="home" id="home">
        <div class="  swiper home-slider">
            <div class=" swiper-wrapper wrpr">
            <?php
             while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <div class=" swiper-slide  slide">
                      <div class="content">
                          <span style="font-size:30px;">Our special Items</span>
                          <h2><?php echo $row['name']; ?></h2>
                          <p><?php echo $row['description']; ?></p>
                          <?php  $c_id= $row['id']; ?>
                          <a href="categories.php?id=<?= $c_id ?>&name=<?= $row['name'] ?>" class="btn">Click here...</a>
                      </div>
                      <div class="image">
                          <img src="<?php   echo "../curd/uploads/".$row['image']; ?>" style="width:700px; height:700px;" alt="">
                      </div>
                  </div>
                  <?php 
              }
            ?>
                <!-- <div class=" swiper-slide slide">
                    <div class="content">
                        <span>Our special dishes</span>
                        <h2>Fried Chicken</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, illum!</p>
                        <a href="#" class="btn">Order Now</a>
                    </div>
                    <div class="image">
                        <img src="home-imge2.avif" alt="">
                    </div>
                </div>
                <div class=" swiper-slide slide">
                    <div class="content">
                        <span>Our special dishes</span>
                        <h2>Special Pizza</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, illum!</p>
                        <a href="#" class="btn">Order Now</a>
                    </div>
                    <div class="image">
                        <img src="home-image3.avif" alt="">
                    </div>
                </div> -->
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </section>


    <section class="dishes" id="dishes">
        <h3 class="sub-heading">Our dishes</h3>
        <h3 class="heading"> Paplar dishes</h3>
        <?php 
                $con = mysqli_connect("localhost:3306","root","","restaurant");

                $query = "SELECT * FROM category_item";

               $result = mysqli_query($con,$query);

               ?>
        
        <div class="box-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
            <div class="box" data-product-id="<?php echo $row['category_id']; ?>" data-product-name="<?php echo $row['item_name']; ?>" data-product-price="<?php echo $row['price']; ?>" data-product-quantity="1">
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
                <h2 sytle=" font-family:bolder;">Best food in the country</h2>
                <p style="font-size:20px; color:black;"> 
                Biryani This flavorful rice dish cooked with meat, vegetables, and spices is considered the national dish of Pakistan. Its various regional variations, like Sindhi Biryani, Hyderabadi Biryani, and Lahori Biryani,
                 offer distinct flavors and aromas, making it a beloved choice for celebrations and everyday meals.</p>
                
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
<!-- 

    <section class="menu" id="menu">
        <h3 class="sub-heading">Our Menu</h3>
        <h1 class="heading"> Today Speciality</h1>
        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="meanu-imgae1.avif" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h2>Delicious Food</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil velit nulla quidem delectus
                        accusamus quia illo dignissimos possimus adipisci, debitis repellendus dolores reprehenderit ex
                        molestiae.</p>
                    <a href="#" class="btn">Add To Cart</a>
                    <span class="price">RS 399</span>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="menu-img2.avif" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h2>Delicious Food</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil velit nulla quidem delectus
                        accusamus quia illo dignissimos possimus adipisci, debitis repellendus dolores reprehenderit ex
                        molestiae.</p>
                    <a href="#" class="btn">Add To Cart</a>
                    <span class="price">RS 399</span>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="mane-img3.avif" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h2>Delicious Food</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil velit nulla quidem delectus
                        accusamus quia illo dignissimos possimus adipisci, debitis repellendus dolores reprehenderit ex
                        molestiae.</p>
                    <a href="#" class="btn">Add To Cart</a>
                    <span class="price">RS 399</span>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="menu-g.avif" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h2>Delicious Food</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil velit nulla quidem delectus
                        accusamus quia illo dignissimos possimus adipisci, debitis repellendus dolores reprehenderit ex
                        molestiae.</p>
                    <a href="#" class="btn">Add To Cart</a>
                    <span class="price">RS 399</span>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="menu-img6.avif" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h2>Delicious Food</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil velit nulla quidem delectus
                        accusamus quia illo dignissimos possimus adipisci, debitis repellendus dolores reprehenderit ex
                        molestiae.</p>
                    <a href="#" class="btn">Add To Cart</a>
                    <span class="price">RS 399</span>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="menu-img7.avif" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h2>Delicious Food</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil velit nulla quidem delectus
                        accusamus quia illo dignissimos possimus adipisci, debitis repellendus dolores reprehenderit ex
                        molestiae.</p>
                    <a href="#" class="btn">Add To Cart</a>
                    <span class="price">RS 399</span>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="menu-img8.avif" alt="" width=>
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h2>Delicious Food</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil velit nulla quidem delectus
                        accusamus quia illo dignissimos possimus adipisci, debitis repellendus dolores reprehenderit ex
                        molestiae.</p>
                    <a href="#" class="btn">Add To Cart</a>
                    <span class="price">RS 399</span>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="manu-img9.avif" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h2>Delicious Food</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil velit nulla quidem delectus
                        accusamus quia illo dignissimos possimus adipisci, debitis repellendus dolores reprehenderit ex
                        molestiae.</p>
                    <a href="#" class="btn">Add To Cart</a>
                    <span class="price">RS 399</span>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="juice.avif" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h2>Delicious Food</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil velit nulla quidem delectus
                        accusamus quia illo dignissimos possimus adipisci, debitis repellendus dolores reprehenderit ex
                        molestiae.</p>
                    <a href="#" class="btn">Add To Cart</a>
                    <span class="price">RS 399</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="tea1.avif" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h2>Delicious Food</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil velit nulla quidem delectus
                        accusamus quia illo dignissimos possimus adipisci, debitis repellendus dolores reprehenderit ex
                        molestiae.</p>
                    <a href="#" class="btn">Add To Cart</a>
                    <span class="price">RS 399</span>
                </div>
            </div>


    </section> -->

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
                <p> Very best home </p>
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
                <p> This the best  Resturent   food and  services also  </p>
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
                <p>Delectable food is delicious, tasty, mouth-watering, appetizing, scrumptious, 
                 luscious, enjoyable, palatable, delightful, toothsome, pleasing, satisfying.</p>
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
                <p>
My Favourite Food in English for Classes 1-3: 10 Lines, Short ...
For this essay, they are expected to say which is their favourite food and why they like it. In a more descriptive essay, they can write where they ate it and other facts. Our country has a vast variety of foods, 
and each region has its own unique dishes. Everyone has different food preferences.</p>
                </div>
            </div>
        </div>

    </section>
   

<!-- <section class="order" id="order">
    <h3 class="sub-heading">Order Now</h3>
    <h1 class="heading"> Free and Fast Service</h1>
    <form action="">
       <div class="inputBox">
        <div class="input">
            <span> Your Name</span>
            <input type="text" placeholder="Enter Your Name...">
        </div>
        <div class="input">
            <span> Your Number</span>
            <input type="number" placeholder="Enter Your Number..." required>
        </div>
       </div>
       <div class="inputBox">
        <div class="input">
            <span> Your Name</span>
            <input type="text" placeholder="Enter Food Name...">
        </div>
        <div class="input">
            <span> Additional Food</span>
            <input type="test" placeholder=" Extra with food....">
        </div>
       </div>
       <div class="inputBox">
        <div class="input">
            <span> How Much</span>
            <input type="phone" placeholder="How many orders...">
        </div>
        <div class="input">
            <span> Date and Time</span>
            <input type="datetime-local">
        </div>
       </div>
       <div class="inputBox">
        <div class="input">
            <span> Your Addres</span>
           <textarea name=""  placeholder="Enter your address" cols="30" rows="10"></textarea>
        </div>
        <div class="input">
            <span> Your Message</span>
            <textarea name=""  placeholder="Enter your message" cols="30" rows="10"></textarea>
         </div>
       </div>
       <input type="submit" value="Order Now" class="btn">
    </form>
</section> -->


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
                        console.log(res);
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@1.6.2/dist/axios.min.js"></script>
<script src="script.js"></script>
<script>
    const buttons = document.querySelectorAll(".cart-button");

    buttons.forEach(button => {
        button.addEventListener("click", function(e) {
            e.preventDefault();
            const productId = button.dataset.id;
            const productName = button.dataset.name;
            const productPrice = button.dataset.price;

            // Check if the item is already in the cart
            axios.get(`showCart.php?productId=${productId}`)
                .then(response => {
                    if (response.data.exists) {
                        // If the item exists in the cart, update its quantity
                        axios.post("showCart.php", {
                            productId: productId,
                            quantity: response.data.quantity + 1
                        })
                            .then(() => {
                                updateItemsQuantity();
                            })
                            .catch(err => {
                                console.log(err);
                            });
                    } else {
                        // If the item is not in the cart, add it
                        axios.post("addToCart.php", {
                            productId: productId,
                            productName: productName,
                            productPrice: productPrice
                        })
                            .then(() => {
                                updateItemsQuantity();
                            })
                            .catch(err => {
                                console.log(err);
                            });
                    }
                })
                .catch(err => {
                    console.log(err);
                });
        });
    });

    function updateItemsQuantity() {
        const qty = document.getElementById("items-qty");
        const totalItems = parseInt(qty.textContent) + 1;
        qty.textContent = totalItems;
    }
</script> -->

</body>

</html>

