<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kiosk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id']; 

$sql = "DELETE FROM list_of_menu WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../menuList.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>
