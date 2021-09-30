
<?php
include 'connection.php';

//gets user input of their details in stores values into variables
$fname = ucwords(trim($_POST['fname']));
$lname = ucwords(trim($_POST['lname']));
$dob = trim($_POST['dob']);
$age = floor((time() - strtotime($dob)) / 31556926);
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$bcrypt_password = password_hash($password, PASSWORD_BCRYPT); //bycrypts password

//query to select all userids
$all_username_query = "SELECT UserID FROM users";
$all_username_result = mysqli_query($con, $all_username_query);
$all_username_record =mysqli_fetch_assoc($all_username_result);

//checking to see if their are no blank fields
if(strlen($fname)===0 or strlen($lname)===0 or strlen($email)===0 or strlen($username)===0 or strlen($password)===0 ){
    //if there are blank fields...
    echo 'Fill out all details!';
    header("refresh:1;url=new_account.php");
}
//checking to see if username meets the required character length
elseif(strlen($username)<5 or strlen($username)>20){
    //if username is too short or long...
    echo 'Username must be >5 characters and <21 characters';
    header("refresh:1;url=new_account.php");
}
//checking to see if first name is a valid length
elseif(strlen($fname)<2 or strlen($fname)>20){
    //if first name is too long or too short...
    echo 'First name must be under 21 characters';
    header("refresh:1;url=new_account.php");
}
//checking to see if email is valid
elseif(strlen($email)<6){
    //if email is too short...
    echo 'Enter valid email';
    header("refresh:1;url=new_account.php");
}
//checking to see if last name is a valid length
elseif(strlen($lname)<5 or strlen($lname)>20){
    //if last name is too long or too short...
    echo 'Last name must be >5 characters and <21 characters';
    header("refresh:1;url=new_account.php");
}
//checking if password is long enough
elseif(strlen($password)<5){
    //if password is too short...
    echo 'password must be >5 characters';
    header("refresh:1;url=new_account.php");
}
//checking if user is old enough
elseif($age<18){
    //if user is too young...
    echo 'Sorry! You must be 18 or over to access this site. Grow up and try again!';
    header("refresh:5;url=index.php");
}
else {
    //if there are no errors, new account is made
    //query to insert new user into database
    $insert_user = "INSERT INTO users (UserID,FName, LName, DOB, email, password) VALUES ('$username', '$fname','$lname','$dob','$email','$bcrypt_password')";
    if (!mysqli_query($con, $insert_user)) {
        //if insert failed, error message
        echo 'Failed to make account...';
        header("refresh:1;url=new_account.php");
    } else {
        //if insert was a success...
        echo '<h1>Your account has been successfully made. You can now log in with your account.<br>Taking you have to the Login page now...</h1>';
        header("refresh:3;url=login.php");
}
}
?>