
<?php
include 'connection.php';

$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$dob = trim($_POST['dob']);
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$bcrypt_password = password_hash($password, PASSWORD_BCRYPT);

$all_username_query = "SELECT UserID FROM users";
$all_username_result = mysqli_query($con, $all_username_query);
$all_username_record =mysqli_fetch_assoc($all_username_result);

$username_check_query = "SELECT UserID FROM users WHERE UserID='$username'";
$username_check_result = mysqli_query($con, $all_username_query);
$count = mysqli_num_rows($username_check_query);
if($count!=0){
    echo 'Username already taken';
}
else {
    $insert_user = "INSERT INTO users (UserID,FName, LName, DOB, email, password) VALUES ('$username', '$fname','$lname','$dob','$email','$bcrypt_password')";
    if (!mysqli_query($con, $insert_user)) {
        echo 'Not Inserted';
    } else {
        echo 'Inserted';
    }

    header("refresh:1;url=login.php");
}
?>