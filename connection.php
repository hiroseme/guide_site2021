<?php
$con = mysqli_connect("localhost", "hiroseme", "megaship55", "hiroseme_travel");
if (mysqli_connect_errno()) {
    echo "<p class='not_connected_msg'>Failed to connect to MySQL:" . mysqli_connect_error();
    die();
} else {
    echo "<p class='connected_msg'>connected to database";
}
?>