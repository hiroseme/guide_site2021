
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
    </nav>
    <div class="nav_regions">
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='NTL' value="Northland">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='AUK' value="Auckland">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='HKB' value="Hawke's Bay">
        </form>
        <form class="region_button" action="places.php" method="post">
            <input class="region_button" type='submit' name='GIS' value="Gisborne">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WGN' value="Wellington">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='MBH' value="Marlborough">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='MWT' value="Manawatu-Wanganui">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WKO' value="Waikato">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='BOP' value="Bay of Plenty">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='NSN' value="Nelson">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='TKI' value="Taranaki">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='TAS' value="Tasman">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='CAN' value="Canterbury">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WTC' value="West Coast">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='OTA' value="Otago">
        </form>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='STL' value="Southland">
        </form>
    </div>
    <div class="head-img">
        <h1 class="h1_head"> Find your next adventure.<br>
            <form class="search_index" action="search_results.php" method="post">
                <input class="search_text_index" type="text" value="Search... " name='search_product'
                       onclick="value=''">
                <input class="search_btn_nav search_btn_index" type="submit" name="submit" value="&#x1F50D">
            </form>
        </h1>
    </div>
</header>
<main class="main_index">
    <div>
        <p class="welcome_p">Welcome to GuideSITE. New Zealand's most trusted tourist website.<br>
            Hear real opinions from locals and tourists.<br>Find your next adventure you will never forget.<br>
            Read reviews and search places to go.<br>Be it mountains, museums or romantic retreats, GuideSITE allows you to browse through them all. </p>
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




