<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_GET["id"];
    // Retrieve form data
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $category_id = $_POST["category"];



    // Handle image upload
    // $image = $_FILES["image"];
    // $imageName = $image["name"];
    // $imageTmpName = $image["tmp_name"];
    // $imageType = $image["type"];

    // Specify the directory where you want to store the uploaded images
    $uploadDirectory = "uploads/";


    // Yeh code kis nay likha tha? chat gpt nay. hmm maltab ap nay kaafi try kia :D HMM Good Job !!!
    // Check if an image file is uploaded
    if (!empty($_FILES["image"]["name"])) {
        // Handle image upload
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);

        // You may want to add additional checks and validations for the image file here

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Image uploaded successfully, update with image
            updateCategoryWithImage($category_id, $name, $description, $price ,$_FILES["image"]["name"], $id);
        } else {
            // Handle image upload failure
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // No image file provided, update without image
        updateCategoryWithoutImage($category_id, $name, $description, $price, $id);
    }
}

// Function to update category with image
function updateCategoryWithImage($category_id, $name, $description, $price,$imagePath, $id)
{
    // Implement your database update logic here
    // Update the category with the provided image path
    // Example SQL query:
    // UPDATE categories SET name = '$categoryName', description = '$categoryDescription', image = '$imagePath' WHERE id = $categoryId;

    // Redirect or output success message as needed

    $con = mysqli_connect("localhost:3306","root","","restaurant");
    $query = "UPDATE category_item SET item_name='$name',description='$description',image='$imagePath', price='$price', category_id='$category_id' WHERE id='$id'";
        

    $result = mysqli_query($con,$query);
    if($result){
        header("location:fooditem.php");
    }
}

// Function to update category without image
function updateCategoryWithoutImage($category_id, $name, $description, $price, $id)
{
    // Implement your database update logic here
    // Update the category without changing the image
    // Example SQL query:
    // UPDATE categories SET name = '$categoryName', description = '$categoryDescription' WHERE id = $categoryId;

    // Redirect or output success message as needed
    $con = mysqli_connect("localhost:3306","root","","restaurant");
    $query = "UPDATE category_item SET item_name='$name',description='$description', price='$price', category_id='$category_id' WHERE id='$id'";
    $result = mysqli_query($con,$query);
    if($result){
        header("location:fooditem.php");
    }
}

?>
