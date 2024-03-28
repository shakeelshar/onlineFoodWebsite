<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="index.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="logo.png" alt="">
               <p><a href="#">Edit profile</a></p>
            </div>

            <span class="logo_name">Food Delivery</span>
        </div>

        <div class="menu-items active">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Catagrory</span>
                </a></li>
                <li><a href="index.html">
                    <i class="uil uil-home"></i>
                    <span class="link-name">Food Item</span>
                </a></li>
            
            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total Likes</span>
                        <span class="number">50,120</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Comments</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total Share</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class=""></i>
                    <button   class="text"> Add Food</button>
                </div>

                 <!-- <div class="activity-data"  id="active">
                    <div class="data names">
                        <span class="data-title">Foods</span>
                        <span class="data-list">Brayani</span>
                        <span class="data-list">Kharai</span>
                        <span class="data-list">chiken Korma</span>
                        <span class="data-list">halwa</span>
                        <span class="data-list">Nodels</span>
                        <span class="data-list">desi Prtha</span>
                        <span class="data-list">Fresh Juice</span>
                    </div>
                    <div class="data email">
                        <span class="data-title">Price</span>
                        <span class="data-list">$20</span>
                        <span class="data-list">$20</span>
                        <span class="data-list">$20</span>
                        <span class="data-list">$20</span>
                        <span class="data-list">$20</span>
                        <span class="data-list">$20</span>
                        <span class="data-list">$20</span>
                        
                    </div>
                    <div class="data joined">
                        <span class="data-title">Order date</span>
                        <span class="data-list">2023-02-12</span>
                        <span class="data-list">2023-02-12</span>
                        <span class="data-list">2023-02-13</span>
                        <span class="data-list">2023-02-13</span>
                        <span class="data-list">2023-02-14</span>
                        <span class="data-list">2023-02-14</span>
                        <span class="data-list">2023-02-15</span>
                    </div>
                    <div class="data type">
                         <button>  <span class="data-title">Delet</span></button>
                       <button> <span class="data-title">Delete</span></button>
                        <button> <span class="data-title">delete</span></button>
                       <button> <span class="data-title">delete</span></button>
                        <button>   <span class="data-title">delete</span></button>
                         <button>   <span class="data-title">delete</span></button>
                    </div>
                    <div class="data status">
                        <button> <span class="data-list">Edit</span></button>
                        <button> <span class="data-list">Edit</span></button>
                        <button> <span class="data-list">Edit</span></button>
                        <button> <span class="data-list">Edit</span></button>
                        <button> <span class="data-list">Edit</span></button>
                        <button> <span class="data-list">Edit</span></button>

                        
                    </div>
                </div>  -->
                <?php 
                $con = mysqli_connect("localhost:3306","root","","restaurant");

                $query = "SELECT * FROM fooditem";

               $result = mysqli_query($con,$query);

               ?>
                <table border="1px"><thead>
                    <tr>
                        <th>ID</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>desc</th>
                        <th>Action EDIT</th>
                        <th>Action DELETE</th>


                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                           ?> <tr>
                           <td><?php echo $row['id']; ?></td>
                           <td><?php echo $row['food']; ?></td>
                           <td><?php echo $row['price']; ?></td>
                           <td><?php echo $row['desc']; ?></td>
                           <td> <a href="" >Edit</a></td>
                           <td><a href="" >DELETE</a></td>
                          </tr> <?php
                        }
                        ?>
                    
                    <tbody>
                </table>
               <?php
                
                ?>
            </div>
        </div>
    </section>

    <script src="index.js"></script>
</body>
</html>