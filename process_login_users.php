
<?php
session_start();
include 'connection.php';

//getting user input for log in
$user = trim($_POST['username']);
$pass = trim($_POST['password']);

//query to select password for entered username
$login_query = "SELECT password FROM users WHERE UserID = '".$user."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['password']; //hashing password

$verify = password_verify($pass, $hash); //checking if entered password matches password stored in the database
if($verify){
    //if username and password are correct
    $_SESSION['logged_in']=$user;
    header("Location: login.php");
    $_SESSION['blank']=null;
}
elseif($user===""){
    //if user enters nothing for the 'username' field
    $_SESSION['blank']=1;
    $_SESSION['wrong_details'] = null;
    header("Location: login.php");
}
elseif($pass===""){
    //if user enters nothing for the 'password' field
    $_SESSION['blank']=1;
    $_SESSION['wrong_details'] = null;
    header("Location: login.php");
}
else {
    //if user enters wrong details
   $_SESSION['blank']=null;
   $_SESSION['wrong_details']=1;
   header("Location: login.php");
}


