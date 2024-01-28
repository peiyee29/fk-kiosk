<?php
$servername = "localhost";
$username1 = "root";
$password = "";
$dbname = "kiosk";

$conn = new mysqli($servername, $username1, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_SESSION['vendorID'])){
    $id = $_SESSION['vendorID'];
}else{
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    //echo $id;
}
$sql = "SELECT * FROM list_of_menu WHERE vendor_id = '$id'";
$result = $conn->query($sql);

$datas = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $datas[] = $row;
    }
} else {
    //echo "0 results";
}

$conn->close();
?>
