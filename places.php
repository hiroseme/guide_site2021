<?php

include 'connection.php';
$all_places_query = "SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID";
$all_places_result = mysqli_query($con, $all_places_query);

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
            <a class="a_nav a_nav_clicked" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
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
</header>
<main>
    <div class="column_left">
        <h2 class="filter_header">Filter</h2>
    </div>
    <div class="column_right">
        <div class="search_places_container">
        <form class="search_places" action="search_results.php" method="post">
            <input class="search_text_places" type="text" value="Search... " name='search_product'
                   onclick="value=''">
            <div class="search_btn_places_container">
            <input class="search_btn_places" type="submit" name="submit" value="&#x1F50D">
            </div>
        </form>
        </div>
        <h1 class="places_header">Top Picks...</h1>
        <div class="places_container_outer">
        <?php
        while ($all_places_record = mysqli_fetch_assoc($all_places_result)) {
            echo "<div class='places_container'>";
            echo "<div class='more_info'>Click for<br>more info</div>";
            echo "<img class='places_image' src='".$all_places_record['ImageFile']."'>";
            echo "<div class='places_text'>";
            echo "<p class='places_text_name'>".$all_places_record['PlaceName']."</p>";
            echo "<br>";
            echo "<p class='places_text_grey'>".$all_places_record['Town'].", ".$all_places_record['Name']."</p>";
            echo "</div></div>";
        }
        ?>
    </div>
    </div>
</main>
</body>
</html>




