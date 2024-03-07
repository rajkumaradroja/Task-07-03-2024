<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form align="center" action="" method="post">
        Login Page<br><br>
        <div>
            User Email:
            <input type="email" name="user_email" placeholder="Enter Valid Email" required><br><br>
            Password:
            <input type="password" name="user_pass" placeholder="Enter You Password Here" required><br><br>
            CheckBox:
            <input type="checkbox" id="remember_me" name="remember_me"> Remember me
            <input type="submit" name="login_submit" id="login_submit">

        </div>
    </form>
</body>
<?php

if (isset($_POST['login_submit'])) {
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $remember_me = isset($_POST['remember_me']) ? $_POST['remember_me'] : false;

    $query = "SELECT * FROM User_data WHERE useremail = '$user_email' AND userpass='$user_pass'";
    $result = mysqli_query($mysqli, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['useremail'] = $user_email;
        $_SESSION['userpass'] = $user_pass;

        if ($remember_me) {
            setcookie('user_email', $user_email, time() + (86400 * 30));
            setcookie('user_pass', $user_pass, time() + (86400 * 30));
        }
        header("Location: display.php");
        exit();
    } else {
        echo "<script>alert('User not found or incorrect credentials');</script>";
    }
}

?>

</html>