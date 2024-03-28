<?php
// db.php
$host = 'your_database_host';
$username = 'your_database_username';
$password = 'your_database_password';
$database = 'food_delivery';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
