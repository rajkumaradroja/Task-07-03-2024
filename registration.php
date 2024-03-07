<?php include("config.php"); ?>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <?php include('func.js'); ?>

</head>
<h1 align="center">Registration Form</h1>
<form align="center" action="" method="POST" name="myform" id="myform"><br><br>
    Name:
    <input type="text" name="name" id="name" placeholder="Enter Your Name"><br><br>
    User Name:
    <input type="text" name="user_name" id="username" placeholder="Enter User Name"><br><br>
    Email:
    <input type="email" name="user_email" id="useremail" placeholder="Enter Your Email"><br><br>
    Password:
    <input type="password" name="user_pass" id="userpass" placeholder="Enter You Password Here"><br><br>
    Phone Number:
    <input type="number" name="user_phone" id="userphone" placeholder="Enter Your Number"><br><br>
    <input type="submit" name="submit_details" value="Submit">
    <a href="login_page.php">Login!</a>
</form>
<?php
if (isset($_POST['submit_details'])) {
    $name = $_POST['name'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $user_phone = $_POST['user_phone'];

    $check_query = "SELECT * FROM User_data WHERE useremail = '$user_email' AND username ='$user_name'";
    $check_result = mysqli_query($mysqli, $check_query);


    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Email already exists. Please use a different email.');</script>";
    } else {


        echo "Name : " . $name . "<br>";
        echo "user Name : " . $user_name . "<br>";
        echo "user Email : " . $user_email . "<br>";
        echo "user pass : " . $user_pass . "<br>";
        echo "user Phone : " . $user_phone . "<br>";
        $query = "INSERT INTO User_data (uname, username, useremail, userpass, userphone) VALUES ('$name','$user_name','$user_email','$user_pass','$user_phone')";
        $result = mysqli_query($mysqli, $query);
        if ($result) {
            echo "Data Inserted";
        } else {
            echo "Failed";
        }
    }
}
?>