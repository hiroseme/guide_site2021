<?php

include 'connection.php';

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
            <form class="search_nav" action="search_results.php" method="post">
                <input class="search_text_nav" type="text" value="Search... " name='search_product'
                       onclick="value=''">
                <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
            </form>
        <a class="a_nav" href="login.php"> LOGIN </a>
        <a class="a_nav" href="index.php"> ABOUT </a>
            <a class="a_nav" href="places.php"> PLACES </a>
            <a class="a_nav a_nav_clicked" href="index.php"> HOME </a>
        </div>
    </nav>
    <nav>
        <a class="a_nav2" href="index.php"> Northland </a>
        <a class="a_nav2" href="index.php"> Auckland </a>
        <a class="a_nav2" href="index.php"> Wellington </a>
        <a class="a_nav2" href="index.php"> Waikoto </a>
        <a class="a_nav2" href="index.php"> Bay of Plenty </a>
        <a class="a_nav2" href="index.php"> Otago </a>
        <a class="a_nav2" href="index.php"> Southland </a>
    </nav>
    <div class="head-img">
        <h1 class="h1_head"> Find your next adventure. </h1>
    </div>
</header>
<main>
    <div>
        <p class="welcome_p">Welcome to GuideSITE. New Zealand's most trusted tourist guide.
            Hear real opinions from locals and tourists. Find your next adventure you will never forget.
        Read reviews and search places to go. Be it mountains, museums or romantic retreats, GuideSITE allows you to browse through them all. </p>
    </div>
    <div class="container1">
        <div class="w30 float_left">
                <img class='profile_img' src="https://cdn.morguefile.com/imageData/public/files/k/kconnors/12/l/14194538217to3g.jpg">
                <h2 class="h2_head">Cultural</h2>
        </div>
        <div class="w30 margin_middle">
            <img class='profile_img' src="https://images.unsplash.com/photo-1592275388256-c32cef8c7e16?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80">
        <h2 class="h2_head">Outdoors</h2>
        </div>
        <div class="w30 float_right">
            <img class='profile_img' src="https://images.unsplash.com/photo-1582555172866-f73bb12a2ab3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YXJ0JTIwZ2FsbGVyeXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60">
        <h2 class="h2_head">Indoors</h2>
        </div>
    </div>
</main>
</body>
</html>




