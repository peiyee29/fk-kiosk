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

$sql = "SELECT * FROM list_of_menu WHERE id = $id LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
} else {
    echo "User not found";
}

$conn->close();

?>
