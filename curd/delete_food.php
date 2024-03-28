<?php
$id=$_REQUEST['id'];
   $con = mysqli_connect("localhost:3306","root","","restaurant");
   $query = "DELETE FROM category_item  WHERE id='$id'";
   $result = mysqli_query($con,$query);
   if($result){
       header("location:fooditem.php");
   }

?>