<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $categoryId = $_POST["edit_id"];
    $categoryName = $_POST["edit_name"];
    $categoryDescription = $_POST["edit_description"];

    // Handle image upload
    // $image = $_FILES["image"];
    // $imageName = $image["name"];
    // $imageTmpName = $image["tmp_name"];
    // $imageType = $image["type"];

    // Specify the directory where you want to store the uploaded images
    $uploadDirectory = "uploads/";

    // Check if an image file is uploaded
    if (!empty($_FILES["image"]["name"])) {
        // Handle image upload
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);

        // You may want to add additional checks and validations for the image file here

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Image uploaded successfully, update with image
            updateCategoryWithImage($categoryId, $categoryName, $categoryDescription, $_FILES["image"]["name"]);
        } else {
            // Handle image upload failure
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // No image file provided, update without image
        updateCategoryWithoutImage($categoryId, $categoryName, $categoryDescription);
    }
}

// Function to update category with image
function updateCategoryWithImage($categoryId, $categoryName, $categoryDescription, $imagePath)
{
    // Implement your database update logic here
    // Update the category with the provided image path
    // Example SQL query:
    // UPDATE categories SET name = '$categoryName', description = '$categoryDescription', image = '$imagePath' WHERE id = $categoryId;

    // Redirect or output success message as needed

    $con = mysqli_connect("localhost:3306","root","","restaurant");
    $query = "UPDATE category SET name='$categoryName',description='$categoryDescription',image='$imagePath' WHERE id='$categoryId'";
    $result = mysqli_query($con,$query);
    if($result){
        header("location:category.php");
    }
}

// Function to update category without image
function updateCategoryWithoutImage($categoryId, $categoryName, $categoryDescription)
{
    // Implement your database update logic here
    // Update the category without changing the image
    // Example SQL query:
    // UPDATE categories SET name = '$categoryName', description = '$categoryDescription' WHERE id = $categoryId;

    // Redirect or output success message as needed

    $con = mysqli_connect("localhost:3306","root","","restaurant");
    $query = "UPDATE category SET name='$categoryName',description='$categoryDescription' WHERE id='$categoryId'";
    $result = mysqli_query($con,$query);
    if($result){
        header("location:category.php");
    }
}

?>
