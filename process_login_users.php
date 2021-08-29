
<?php
session_start();
include 'connection.php';

$user = trim($_POST['username']);
$pass = trim($_POST['password']);

$login_query = "SELECT password FROM users WHERE UserID = '".$user."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['password'];

$verify = password_verify($pass, $hash);
if($verify){
    $_SESSION['logged_in']=$user;
    header("Location: login.php");
}
else {
    header("Location: login_error.php");
   echo "Incorrect!";
}


