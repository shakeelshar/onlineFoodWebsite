<?php
// add_form.php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $query = "INSERT INTO menu (name, description, price) VALUES ('$name', '$description', '$price')";
    mysqli_query($connection, $query);
}
?>

<form method="post" action="">
    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Description:</label>
    <textarea name="description"></textarea>

    <label>Price:</label>
    <input type="text" name="price" required>

    <button type="submit">Add Item</button>
</form>
