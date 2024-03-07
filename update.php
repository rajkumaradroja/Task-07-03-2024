<?php
include("config.php");

if (isset($_POST['update_submit'])) {
    if (isset($_POST['userid'])) {
        $userid = $_POST['userid'];
        echo $userid;
        $uname = $_POST['name'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_pass = $_POST['user_pass'];
        $user_phone = $_POST['user_phone'];

        $query = "UPDATE User_data SET uname='$uname', username='$user_name', useremail='$user_email', userpass='$user_pass', userphone='$user_phone' WHERE userid='$userid'";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            echo "<script>alert('User information updated successfully');</script>";
        } else {
            echo "<script>alert('Failed to update user information');</script>";
        }
    }
} else {
    if (isset($_POST['userid'])) {
        $userid = $_POST['userid'];
        echo $userid;
        $query = "SELECT * FROM User_data WHERE userid = '$userid'";
        $result = mysqli_query($mysqli, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Update User Details</title>
            </head>

            <body>
                <h2 align="center">Update User Details</h2>
                <form align="center" action="" method="POST">
                    <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>">
                    Name:
                    <input type="text" name="name" id="name" value="<?php echo $row['uname']; ?>"
                        placeholder="Enter Your Name"><br><br>
                    User Name:
                    <input type="text" name="user_name" id="username" value="<?php echo $row['username']; ?>"
                        placeholder="Enter User Name" required><br><br>
                    Email:
                    <input type="email" name="user_email" id="useremail" value="<?php echo $row['useremail']; ?>"
                        placeholder="Enter Your Email" required><br><br>
                    Password:
                    <input type="password" name="user_pass" id="userpass" value="<?php echo $row['userpass']; ?>"
                        placeholder="Enter Your Password Here" required><br><br>
                    Phone Number:
                    <input type="number" name="user_phone" id="userphone" value="<?php echo $row['userphone']; ?>"
                        placeholder="Enter Your Number" required><br><br>
                    <input type="submit" name="update_submit" value="Submit">
                </form>
            </body>

            </html>
            <?php
        } else {
            echo "User not found.";
        }
    }
}


?>