<?php

include 'connection.php';

$id = '1';
$password = 'sesame';
$bycrypt_password = password_hash($password, PASSWORD_BCRYPT);
echo "<br>Bcrypt Password:".$bycrypt_password;

$reviews_query = "SELECT * FROM reviews WHERE PlaceID = '$id'";
$reviews_result = mysqli_query($con, $reviews_query);

$rating = 0;
$count = 0;
while ($reviews_record = mysqli_fetch_assoc($reviews_result)) {
    echo "<br>Username: ".$reviews_record['UserID'];
    echo "<br>Date: ".$reviews_record['Date'];
    echo "<br>Description: ".$reviews_record['Description']."<br>";
    $rating = $rating + $reviews_record['Rating'];
    $count = $count +1 ;
    echo $count;
}

echo "<br>";
$num = $count;
if($num===0){
    $final_rating = "-";
    echo "$final_rating";
} else{
    echo $final_rating = round($rating/$num,2);
}
?>