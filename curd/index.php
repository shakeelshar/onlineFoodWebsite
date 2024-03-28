<?php
// display.php
require_once 'db.php';

$query = "SELECT * FROM menu";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['description']}</td>";
    echo "<td>{$row['price']}</td>";
    echo "<td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}'>Delete</a></td>";
    echo "</tr>";
}

mysqli_close($connection);
?>
