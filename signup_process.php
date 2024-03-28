<?php
$con = mysqli_connect("localhost:3306","root","","restaurant");


if(isset($_POST['submit'])){
//    echo "<pre>";

// print_r($_POST); 

 extract($_POST);

     if($password == $cpassword){
        $query = "INSERT INTO resgister (name,email,password,number) VALUES ('".$name."','".$email."','".$password."','".$number."')";
        $result = mysqli_query($con, $query);   
        if($result){
            header("location:index.php?msg='Registered Successfully'");
        }
        else{
            header("location:inde2.php?msg='Record Failed to insert'");
        }    

     }
     else{
        header("location:inde2.php?msg='Password Not Matched'");
     }
}


?>