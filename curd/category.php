<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="file.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        



.order form{
    max-width: 90rem;
    border-radius: 20px;
    box-shadow: var(--box-shadow);
    border: .5rem solid yellow;
    background: white;
    padding: 1.6rem;
    margin: 0 auto;

}
.order form .inputBox{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.order form .inputBox .input{
    width: 45%;
}
.order form .inputBox .input span{
display: block;
padding: 2rem 0;
font-size: 25px;
color: black;
}
.order form .inputBox .input input{
    border-radius: 10px;
    background: #27ae60;
    color: white;
    text-transform: none;
    padding: 1.1rem;
    margin-bottom: 1rem;
    width: 100%;

}
.order form .inputBox .input textarea{
    border-radius: 10px;
    background: #27ae60;
    color: white;
    text-transform: none;
    padding: 1.1rem;
    margin-bottom: 1rem;
    width: 100%;
    height: 20rem;
    resize: none;
}

.order form .btn{
    margin-top: none;
}
.order form .inputBox .input textarea:focus,
.order form .inputBox .input input:focus{
    border: 2px solid brown ;
}
table{
                
    padding: 10px 12px;
      margin:  10px;
     width:50%;
    height: 10%;
     color:white;
    font-size:20px;
     position: relative;
     text-align:center;            
}


    </style>

 

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
                <li><a href="index.html">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Catagrory</span>
                </a></li>
                <li><a href="fooditem.php">
                    <i class="uil uil-home"></i>
                    <span class="link-name">Food Item</span>
                </a></li>
            
            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php">
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
                       
                        <span class="text">Total Food Item</span>
                        <span class="number"></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Total orders</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text"></span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class=""></i>
                    <!-- <button   class="text"> Add CATEGORY</button> -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add-Category</button>
                  
                </div>




                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add-Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="category_process.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category Name</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description</label>
            <textarea class="form-control" name="description"></textarea>
          </div>

          <div class="form-group">
                        <label for="imageFile">Choose Image</label>
                        <input type="file" class="form-control-file" id="imageFile" name="image" accept="image/*" required>
                    </div>

                    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        <!-- <input type="submit" name="submit" value="Add"> -->
      </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>


<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');
            var image = $(this).data('image');

            $('#edit_id').val(id);
            $('#edit_name').val(name);
            $('#edit_description').val(description);
            $('#edit_image').val(image);
            // Populate other modal fields as needed
        });
    });
</script>
                 <section class="order" id="order">
  
</section>

    
                <?php 
                $con = mysqli_connect("localhost:3306","root","","restaurant");

                $query = "SELECT * FROM category";

               $result = mysqli_query($con,$query);

               ?>
                <table border="1px"><thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action EDIT</th>
                        <th>Action DELETE</th>


                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                           ?> <tr>
                           <td><?php echo $row['id']; ?></td>
                           <td><?php echo $row['name']; ?></td>
                           <td><?php echo $row['description']; ?></td>
                           <!-- <td> <a href="" >Edit</a></td> -->
                        <td>  <?php echo "<p>{$row['name']} - <button class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editModal' data-id='{$row['id']}' data-name='{$row['name']}' data-description='{$row['description']}' data-image='{$row['image']}'  >Edit</button></p>"; ?></td>
                        <?php  $c_id= $row['id']; ?>   
                        <td><a href="delete_category.php?id=<?= $c_id ?>" >DELETE</a></td>
                          </tr> <?php
                        }
                        ?>
                    
                    <tbody>
                </table>

                <div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
   <?php     
             $con = mysqli_connect("localhost:3306","root","","restaurant");

              $query = "SELECT * FROM category";

              $result = mysqli_query($con,$query);

      ?>

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Form for updating category item -->
                <form action="update_category.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" id="edit_id">

                    <!-- Form fields for editing -->
                    <div class="form-group">
                        <label for="edit_name">Category Name:</label>
                        <input type="text" class="form-control" name="edit_name" id="edit_name" required>
                    </div>

                    <div class="form-group">
                     <label for="message-text" class="col-form-label">Description</label>
                     <textarea class="form-control" name="edit_description" id="edit_description"></textarea>
                   </div>

                   <div class="form-group">
                        <label for="imageFile">Choose Image</label>
                        <input type="file" class="form-control-file"  name="image" accept="image/*">
                    </div>

        
                    

                    <!-- Add other form fields as needed -->

                    <!-- Form submission button -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
               <?php
                
                ?>
            </div>
        </div>
    </section>

    <script src="index.js"></script>
</body>
</html>