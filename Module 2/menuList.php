<?php
if (session_status() == PHP_SESSION_ACTIVE) {
    // Session is already active
    echo "Session is already active.";
    // You can add more code here if needed
} else {
    // Start the session
    session_start();
    echo "";
    // Rest of your code
}
$link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
mysqli_select_db($link, "kiosk") or die(mysqli_error());

$query = mysqli_query($link, "SELECT * FROM food_vendor");

while ($result = mysqli_fetch_assoc($query)) {
    $username = $result['vendor_name'];
    $userID = $result['vendor_id'];
}


   if(isset($_SESSION['username'])) {
       $username = $_SESSION['username'];
   } else {
       // Redirect to the login page if the user is not logged in
       header("Location: ../Module 1/login.php");
       exit();
   }
?>

<?php include 'methods/get_menu.php'; ?>
<!DOCTYPE html>
<html>

<body>

    <head>
        <title>Menu List</title>
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
                        <div class="line2" <label class="switch">
                            <a href="../Module 1/vendorProfile.php">
                                <?php if (isset($_SESSION['username'])) {
                                    $id = $_SESSION['username'];
                                } else {
                                    $id = 'F002';
                                }
                                echo $id;
                                ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <br><br><span style="font-size: 36px; padding-left: 400px;"><b>LIST OF MENU</b></span>
                    <table class="menuList">
                        <form action="">
                            <tr>
                                <th>Menu Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>QR Code</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($datas as $data) { ?>
                                <tr>
                                    <td>
                                        <?php echo $data['menu_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['quantity']; ?>
                                    </td>
                                    <td>
                                        <?php echo 'RM ' . $data['price']; ?>
                                    </td>
                                    <td>
                                        <input type="hidden" id="text_<?php echo $data['id']; ?>"
                                            value="<?php echo $data['id']; ?>">
                                        <div id="qrcode_<?php echo $data['id']; ?>"></div>
                                    </td>
                                    <td><a class="btn" href="editMenu.php?id=<?php echo $data['id']; ?>">Edit</a> <br><br>
                                        <a class="btn"
                                            href="methods/destroy_menu.php?id=<?php echo $data['id']; ?>">Delete</a>
                                    </td>
                                </tr>


                            <?php } ?>
                        </form>
                    </table>
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

                    <script type="application/ecmascript" src="qrcode.js"></script>

                    <script type="application/ecmascript">
                        <?php foreach ($datas as $data) { ?>
                            var elem_<?php echo $data['id']; ?> = document.getElementById("qrcode_<?php echo $data['id']; ?>");
                            var qrcode_<?php echo $data['id']; ?> = new QRCode(elem_<?php echo $data['id']; ?>, {
                                width: 100,
                                height: 100
                            });

                            function makeCode_<?php echo $data['id']; ?>() {
                                var elText_<?php echo $data['id']; ?> = document.getElementById("text_<?php echo $data['id']; ?>");

                                if (elText_<?php echo $data['id']; ?>.value === "") {
                                    //alert("Input a text");
                                    //elText.focus();
                                    return;
                                }

                                qrcode_<?php echo $data['id']; ?>.makeCode(elText_<?php echo $data['id']; ?>.value);
                            }

                            makeCode_<?php echo $data['id']; ?>();

                            document.getElementById("text_<?php echo $data['id']; ?>").onkeyup = function (e) {
                                makeCode_<?php echo $data['id']; ?>();
                            };
                        <?php } ?>
                    </script>