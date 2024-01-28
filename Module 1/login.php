<?php
session_start();
session_destroy();
session_start();
$link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
mysqli_select_db($link, "kiosk") or die(mysqli_error());
if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $selectedValues = isset($_POST["usertype"]) ? $_POST["usertype"] : [];
    $serializedSelections = implode(",", $selectedValues);

    if ($serializedSelections == 'administrator') {
        $query = "SELECT * FROM administrator WHERE admin_name='$username' AND admin_password='$password'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if ($password == $row['admin_password']) {

                $_SESSION['username'] = $row['admin_name'];
                header('location: adminDashboard.php');
            }
        } else {
            $error = "Invalid User ID or Password!";
        }
    } elseif ($serializedSelections == 'user') {
        $query = "SELECT * FROM user WHERE user_name='$username' AND user_password='$password'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if ($password == $row['user_password']) {

                $_SESSION['username'] = $row['user_name'];
                header('location: userDashboard.php');
            }
        } else {
            $error = "Invalid Username or Password!";
        }
    } elseif ($serializedSelections == 'foodvendor') {
        $query = "SELECT * FROM food_vendor WHERE vendor_name='$username' AND vendor_password='$password'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if ($password == $row['vendor_password']) {
                $_SESSION['username'] = $row['vendor_name'];
                $_SESSION['vendorID'] = $row['vendor_id'];
                if ($row['approvalStatus'] == 'Pending') {
                    ?>
                    <script>
                        alert("Your account has not been approved by the administrator. Your approval will be processed in 3 working days.");
                    </script>
                    <?php
                } else {
                    header('location: ../Module 2/addMenu.php');
                }
            }
        } else {
            $error = "Invalid User ID or Password!";
        }

    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/mystyle.css?v=<?php echo time(); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
        <div class="row">
            <div class="line"><img src="Image/fk logo.png" alt="Logo" height="85px"></div>
            <div class="line1">
                <span style="font-size: 55px">K&ensp;I&ensp;O&ensp;S&ensp;K</span>
                <br>UMPSA Faculty of Computing
            </div>
            <div class="line2">
                <a href="register.php">Register</a>
                <img src="Image/profileicon.png" alt="ProfileIcon" height="45px">
            </div>
        </div>
    </header>

    <div class="background">
        <div class="row1">
            <div class="column">
                Welcome to UMPSA FK KIOSK!
                <br>KIOSK provides comprehensive access to the food menu list at different stalls and enables online
                food ordering.
            </div>
            <div class="column1">
                <span style="font-size: 36px; padding: 10px 195px;"><b>LOGIN</b></span>
                <form class="loginForm" action="" method="post">
                    <?php
                    // Display error message if set
                    if (isset($error)) {
                        echo "<p style='color: red;'>$error</p>";
                    }
                    ?>
                    <label>Username&ensp;&ensp;:</label><input type="text" name="username">
                    <br><label>Password&emsp;:</label><input type="password" name="password" minlength="8">
                    <br><br><select name="usertype[]" required>
                        <option value="select" disabled selected required>Select user type</option>
                        <option value="administrator">Administrator</option>
                        <option value="user">User</option>
                        <option value="foodvendor">Food Vendor</option>
                    </select>
                    <br><br><input type="submit" name="submit" value="Login" class="submit" onclick="" />
                    <br><br>Login as a <a href="generalDashboard.php">Guest</a>
                    <br><br>New User? <a href="register.php">Register</a>
                </form>
            </div>
        </div>
    </div>

    <footer>
        Copyright
        <script>document.write(new Date().getFullYear())</script>. University Malaysia Pahang Al-Sultan Abdullah. All
        Right Reserved.</span>
    </footer>
</body>

</html>