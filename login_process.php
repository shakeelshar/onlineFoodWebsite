<?php
print_r($_POST);
extract($_POST);
if($email=="shakeel@gmail.com" && $password == "1234"){
    header("location:mypro/index.html");
}
else{
    $msg="Incorrect password or email ";
    header("location:index.php?msg=$msg");
}
?>