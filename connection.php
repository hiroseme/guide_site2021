<?php
//details to connect to database and school server
$con = mysqli_connect("localhost", "hiroseme", "megaship55", "hiroseme_travel");

//if failed to connect, error message is displayed
if (mysqli_connect_errno()) {
    echo "<p class='not_connected_msg'>Failed to connect to MySQL:" . mysqli_connect_error();
    die();
}
?>