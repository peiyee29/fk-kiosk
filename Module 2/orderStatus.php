<?php
session_start();
$link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
mysqli_select_db($link, "kiosk") or die(mysqli_error());

$query = mysqli_query($link, "SELECT * FROM food_vendor");

while ($result = mysqli_fetch_assoc($query)) {
    $username = $result['vendor_name'];
    $userID = $result['vendor_id'];
}
?>

<!DOCTYPE html>
<html>

<body>

    <head>
        <title>Order Status</title>
        <link rel="stylesheet" href="css2/dash2.css">
    </head>

    <body>
        <div class="container">
            <div class="side-menu">
                <ul>
                    <li onclick="redirectPage()">Dashboard</li>
                    <li onclick="redirectAddMenu()">Add New Menu</li>
                    <li onclick="redirectMenu()">Menu List</li>
                    <li onclick="redirectOrderStatus()">Order Status</li>
                    <li onclick="redirectOperation()">Kiosk Operation</li>
                    <li onclick="redirectProfile()">Vendor Profile</li>
                    <li onclick="redirectLogout()">Log Out</li>
                </ul>
            </div>
            <div class="side-content">
                <div class="header">
                    <div class="row">
                        <div class="line"><img src="Image/fk logo.png" alt="Logo" height="85px"></div>
                        <div class="line1">
                            <span style="font-size: 55px">K&ensp;I&ensp;O&ensp;S&ensp;K</span>
                            <br>UMPSA Faculty of Computing
                        </div>
                        <div class="line2">
                            <a href="vendorProfile.php">
                            <?php echo $_SESSION['username'] ?>
                            </a>
                            <img src="Image/profileicon.png" alt="ProfileIcon" height="45px">
                        </div>
                    </div>
                </div>

                <script>
                    function redirectPage() {
                        var nextPageUrl = '../Module 1/vendorDashboard.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectAddMenu() {
                        var nextPageUrl = 'addMenu.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectMenu() {
                        var nextPageUrl = 'menuList.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectOrderStatus() {
                        var nextPageUrl = 'orderStatus.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectOperation() {
                        var nextPageUrl = 'kioskOperation.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectProfile() {
                        var nextPageUrl = '../Module 1/vendorprofile.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectLogout() {
                        var nextPageUrl = '../Module 1/login.php';
                        window.location.href = nextPageUrl;
                    }

                </script>