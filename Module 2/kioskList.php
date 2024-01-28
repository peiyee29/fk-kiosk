<?php
session_start();
$link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
mysqli_select_db($link, "kiosk") or die(mysqli_error());

$query = mysqli_query($link, "SELECT * FROM food_vendor");

while ($result = mysqli_fetch_assoc($query)) {
    $username = $result['vendor_name'];
    $userID = $result['vendor_id'];
}



$sql = "SELECT * FROM food_vendor";
$result = $link->query($sql);
?>

<?php include 'methods/get_kiosk.php'; ?>
<!DOCTYPE html>
<html>

<body>

    <head>
        <title class="title">Menu</title>
        <link rel="stylesheet" href="css2/dash2.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="side-menu">
                <ul>
                    <li onclick="redirectPage()">Dashboard</li>
                    <li onclick="redirectMenu()">Menu</li>
                    <li onclick="redirectProfile()">User Profile</li>
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


                <div class="content">
                    <br><br><span style="font-size: 36px; padding-left: 400px;"><b>SELECT KIOSK</b></span><br><br>
                    <div class="container">
                        <div class="row-bottom">
                            <?php foreach ($datas as $data) { ?>
                                <div class="col-md-4 col-xl-3">
                                    <a href="userView.php?id=<?php echo $data['vendor_id']; ?>">
                                        <div class="card bg-c-blue order-card" style="width: 100%; height:150px">
                                            <div class="card-block">
                                                <h2 class="text-right"><span>
                                                        <?php echo $data['vendor_id']; ?>
                                                    </span>
                                            </div>
                                        </div>
                                    </a>
                                </div> &nbsp;
                            <?php } ?>
                        </div>
                    </div>
                    <script>
                        function redirectPage() {
                            var nextPageUrl = '../Module 1/userDashboard.php';
                            window.location.href = nextPageUrl;
                        }
                        function redirectMenu() {
                            var nextPageUrl = '../Module 2/kioskList.php';
                            window.location.href = nextPageUrl;
                        }
                        function redirectProfile() {
                            var nextPageUrl = '../Module 1/userprofile.php';
                            window.location.href = nextPageUrl;
                        }
                        function redirectLogout() {
                            var nextPageUrl = '../Module 1/login.php';
                            window.location.href = nextPageUrl;
                        }
                    </script>