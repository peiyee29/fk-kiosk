<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kiosk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$menuName = $_POST['menuName'];
$qty = $_POST['qty'];
$price = $_POST['price'];

$sql = "INSERT INTO list_of_menu (menu_name, quantity, price) VALUES ('$menuName', '$qty', '$price')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../addMenu.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
