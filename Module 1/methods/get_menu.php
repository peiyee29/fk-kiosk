<?php

$link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
mysqli_select_db($link, "kiosk") or die(mysqli_error());

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

$sql = "SELECT * FROM list_of_menu";
$result = $link->query($sql);

$datas = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $datas[] = $row;
    }
} else {
    echo "0 results";
}

$link->close();
?>
