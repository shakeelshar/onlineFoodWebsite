<?php
$categoryId=$_REQUEST['id'];
   $con = mysqli_connect("localhost:3306","root","","restaurant");
   $query = "DELETE FROM category  WHERE id='$categoryId'";
   $result = mysqli_query($con,$query);
   if($result){
       header("location:category.php");
   }

?>