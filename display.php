<?php
session_start();
include("config.php");

if (isset($_SESSION['useremail']) && isset($_SESSION['userpass'])) {
    $user_email = $_SESSION['useremail'];
    $user_pass = $_SESSION['userpass'];

    $query = "SELECT * FROM User_data WHERE useremail = '$user_email' AND userpass = '$user_pass'";
    $result = mysqli_query($mysqli, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Display User Details</title>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }

                table,
                th,
                td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: center;
                }

                th {
                    background-color: #f2f2f2;
                }
            </style>
        </head>

        <body>
            <h1 align="center">User Details</h1>
            <table align="center">
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone Number</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['userid']}</td>";
                    echo "<td>{$row['uname']}</td>";
                    echo "<td>{$row['username']}</td>";
                    echo "<td>{$row['useremail']}</td>";
                    echo "<td>{$row['userpass']}</td>";
                    echo "<td>{$row['userphone']}</td>";
                    echo "<td><form method='post' action='update.php'><input type='hidden' name='userid' value='{$row['userid']}'><input type='submit' name='update_submit_data' value='Update'></form></td>";

                    echo "</tr>";
                }
                ?>
            </table>
            <form method="post" action="">
                <input type="submit" name="logout" value="Logout">
            </form>
        </body>

        </html>
        <?php
    } else {
        echo "No records found for the logged-in user.";
    }
} else {
    echo "User not logged in";
}
if (isset($_POST['logout'])) {

    $_SESSION = array();
    setcookie('user_email', '', time() - 360000);
    setcookie('user_pass', '', time() - 360000);

    session_unset();
    session_destroy();

    header("Location: login_page.php");
    exit;
} ?>