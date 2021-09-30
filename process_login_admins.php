
<?php
session_start();
include 'connection.php';

//gets user input for log in details
$admin = trim($_POST['username']);
$pass = trim($_POST['password']);

//query to select password of the entered username
$login_query = "SELECT password FROM admins WHERE AdminID = '".$admin."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);


$hash = $login_record['password']; //hashing password

$verify = password_verify($pass, $hash); //checking entered password matches password in database
if($verify){
    //if details are correct...
    $_SESSION['logged_in_admin']=$admin;
    header("Location: login.php");
    $_SESSION['blank_admin']=null;
}
elseif($admin===""){
    //if user enters nothing in the 'username' field...
    $_SESSION['blank_admin']=1;
    $_SESSION['wrong_details_admin'] = null;
    header("Location: login.php");
}
elseif($pass===""){
    //if user enters nothing in the 'password' field...
    $_SESSION['blank_admin']=1;
    $_SESSION['wrong_details_admin'] = null;
    header("Location: login.php");
}
else {
    //if the details are wrong... 
    $_SESSION['blank_admin']=null;
    $_SESSION['wrong_details_admin']=1;
    header("Location: login.php");
}
