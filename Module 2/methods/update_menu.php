<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kiosk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$menuName = $_POST['menuName'];
$qty = $_POST['qty'];
$price = $_POST['price'];

$sql = "UPDATE list_of_menu SET menu_name = '$menuName', quantity = '$qty', price = '$price' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../menuList.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
