<?php

$servername = "localhost";
$username1 = "root";
$password = "";
$dbname = "kiosk";

$conn = new mysqli($servername, $username1, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$menuName = $_POST['menuName'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$vendorID = $_POST['vendorID'];

$sql = "INSERT INTO list_of_menu (menu_name, quantity, price, vendor_id) VALUES ('$menuName', '$qty', '$price', '$vendorID')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../addMenu.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
