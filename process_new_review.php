
<?php
include 'connection.php';
session_start();

//checks if user is logged in
if(isset($_SESSION['logged_in'])){
    $username = $_SESSION['logged_in'];
}
else {
    //if not logged in, user is taken to the log in page
    echo header("Location: login.php");
}

//gets user input and stores values in variables, trim to get rid of excess spaces
$date = trim($_POST['date']);
$description = trim($_POST['description']);
$reviewid = trim($_POST['reviewid']);
$placeid = trim($_POST['placeid']);
$rating = trim($_POST['star']);

//selects all userids from database
$all_username_query = "SELECT UserID FROM users";
$all_username_result = mysqli_query($con, $all_username_query);
$all_username_record =mysqli_fetch_assoc($all_username_result);

//gets the reviewid of the reviews of the selected place
$review_query = "SELECT ReviewID FROM reviews WHERE ReviewID = '.$reviewid.'";
$review_result = mysqli_query($con, $review_query);

//checking if user has already written a review
while($review_record = mysqli_fetch_assoc($review_result)){
    if($reviewid==$review_record['ReviewID']){
        //if user has written a review, error message and user gets taken back to places_info.php
        echo "You have already written a review!";
        header("refresh:1;url=places_info.php");
    }
}

//query to insert review into database
$insert_user = "INSERT INTO reviews (ReviewID, PlaceID, UserID, Description, Rating, date) VALUES ('$reviewid', '$placeid','$username','$description','$rating','$date')";
if(!mysqli_query($con, $insert_user))
{
    //if review failed..
    echo 'Not Inserted';
    header("refresh:1;url=write_review.php");
}
else{
    //if review was successfully inserted...
    echo 'Inserted';
    header("refresh:1;url=places_info.php");
}

?>