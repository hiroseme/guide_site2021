<?php

include 'connection.php';

$id = '1';
$password = 'sesame';
$bycrypt_password = password_hash($password, PASSWORD_BCRYPT);
echo "<br>Bcrypt Password:".$bycrypt_password;

$reviews_query = "SELECT * FROM reviews WHERE PlaceID = '$id'";
$reviews_result = mysqli_query($con, $reviews_query);

$_input_bday = '2003-07-07';
$_age = floor((time() - strtotime($_input_bday)) / 31556926);
echo "<h1>".$_age."</h1>";


?>
