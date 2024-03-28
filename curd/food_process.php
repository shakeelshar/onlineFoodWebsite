
<?php

$con = mysqli_connect("localhost:3306","root","","restaurant");

print_r($_POST);

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $category = $_POST["category"];

    
    // Handle image upload
    $image = $_FILES["image"];
    $imageName = $image["name"];
    $imageTmpName = $image["tmp_name"];
    $imageType = $image["type"];

    // Specify the directory where you want to store the uploaded images
    $uploadDirectory = "uploads/";

    // Move the uploaded image to the specified directory
    move_uploaded_file($imageTmpName, $uploadDirectory . $imageName);

    // Insert data into the database
    $sql = "INSERT INTO category_item (category_id, item_name, price, description, image) VALUES ('$category', '$name', '$price', '$description','$imageName')";
    if ($con->query($sql) === TRUE) {
        echo "Data inserted successfully.";
        header("location:foodItem.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$con->close();
?>