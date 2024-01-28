<?php
session_start();
$link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
mysqli_select_db($link, "kiosk") or die(mysqli_error());

    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        // Redirect to the login page if the user is not logged in
        header("Location: ../Module 1/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>

<body>

    <head>
        <title>Add New Menu</title>
        <link rel="stylesheet" href="css2/dash2.css">
    </head>

    <body>
        <div class="container">
            <div class="side-menu">
                <ul>
                    <li onclick="redirectPage()">Dashboard</li>
                    <li onclick="redirectAddMenu()">Add New Menu</li>
                    <li onclick="redirectMenu()">Menu List</li>
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
                            <a href="../Module 1/vendorProfile.php">
                                <?php echo $_SESSION['username'] ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <br><br><span style="font-size: 36px; padding-left: 360px;"><b>ADD MENU HERE</b></span>
                    <table class="updateMenu">
                        <form action="./methods/store_menu.php" method="POST">
                            <tr>
                                <th>Menu Name</th>
                                <td><input type="text" name="menuName" value=""></td>
                            </tr>
                            <tr>
                                <th>Quantity</th>
                                <td><input type="number" name="qty" value=""></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><input type="text" name="price" value=""></td>
                            </tr>
                            <input type="hidden" name="vendorID" value="<?php echo $_SESSION['vendorID']; ?>">
                            <tr>
                                <td colspan="2"><input type="reset" value="Clear"> <input type="submit" value="Submit">
                                </td>
                            </tr>
                        </form>
                    </table>
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
                    function redirectOperation() {
                        var nextPageUrl = 'kioskOperation.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectProfile() {
                        var nextPageUrl = '../Module 1/vendorprofile.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectLogout() {
                        var nextPageUrl = '../Module 1/logout.php';
                        window.location.href = nextPageUrl;
                    }

                </script>