
<?php
include 'connection.php';
session_start();

if(isset($_SESSION['logged_in'])){
    $username = $_SESSION['logged_in'];
}
else {
    echo header("Location: login.php");
}

$date = trim($_POST['date']);
$description = trim($_POST['description']);
$reviewid = trim($_POST['reviewid']);
$placeid = trim($_POST['placeid']);
$rating = trim($_POST['star']);

$all_username_query = "SELECT UserID FROM users";
$all_username_result = mysqli_query($con, $all_username_query);
$all_username_record =mysqli_fetch_assoc($all_username_result);

$insert_user = "INSERT INTO reviews (ReviewID, PlaceID, UserID, Description, Rating, date) VALUES ('$reviewid', '$placeid','$username','$description','$rating','$date')";
if(!mysqli_query($con, $insert_user))
{
    echo 'Not Inserted';
}
else{
    echo 'Inserted';
}

header("refresh:1;url=login.php");
?>