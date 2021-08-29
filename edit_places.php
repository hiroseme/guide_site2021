<?php

session_start();
include 'connection.php';
$all_places_query = "SELECT * FROM places";
$all_places_result = mysqli_query($con, $all_places_query);
$all_places_record = mysqli_fetch_assoc($all_places_result);

if(isset($_SESSION['logged_in_admin'])){
    $username_admin = $_SESSION['logged_in_admin'];
}
else {
    echo header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> GuideSITE | HOME </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <nav class="nav_navy">
        <div class="nav_container">
            <img class="logo_img" src="GuideSITE.png" alt="Guide Site Logo">
            <form class="search_nav" action="places.php" method="post">
                <input class="search_text_nav" type="text" value="Search... " name='search_place'
                       onclick="value=''">
                <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
            </form>
            <a class="a_nav" href="login.php"> LOGIN </a>
            <a class="a_nav" href="index.php"> ABOUT </a>
            <a class="a_nav a_nav_clicked" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
        </div>
    </nav>
</header>
<main class="main_places">
    <h1 class="places_header">Edit Places</h1>
        <?php
        while($row=mysqli_fetch_array($all_places_result))
        {
            echo "&#8226;<a href='edit_places_form.php'>".$row['PlaceName']."</a><br>";
        }
        ?>
</main>
</body>
</html>
