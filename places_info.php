<?php

include 'connection.php';
if (isset($_GET['place'])) {
    $id = $_GET['place'];
} else {
    $id = 1;
}
//Query to get all the details of the selected product
$this_place_query = "SELECT PlaceID, PlaceName, Description,HouseNumber, StreetName,Town, PostCode, places.TypeID, ImageFile, regions.Name, placetypes.TypeName FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON places.TypeID=placetypes.TypeID WHERE PlaceID= '" . $id . "'";
$this_place_result = mysqli_query($con, $this_place_query);
$this_place_record = mysqli_fetch_assoc($this_place_result);

//Query to get all productIDs and ProductNames
$all_places_query = "SELECT PlaceID, PlaceName FROM places";
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
</header>
<main class="main_more_info"><div class="places_info_container1">
    <div class="info_img_container" style="
        <?php
        echo "background-image: url('".$this_place_record['ImageFile']."')";
        ?>
            ">
        <h1 class="more_info_header">
            <?php
            echo $this_place_record['PlaceName'];
            ?>
        </h1>
    </div>
    <div class="places_details_container">
        <p><?php
            echo $this_place_record['HouseNumber'];
            echo " ";
            echo $this_place_record['StreetName'];
            echo ", ";
            echo $this_place_record['Town'];
            echo ", ";
            echo $this_place_record['PostCode'];
            ?> </p>
        <p>Type: <?php
            echo $this_place_record['TypeName'];?> </p>
        <p>Description:</p>
        <div class="description_container">
            <p><?php echo $this_place_record['Description'];?></p>
        </div>
    </div>
    </div>
    <div class="places_info_container1">
        <div class="rating_star_container_outer">
            <h1>Rating</h1>
        </div>
    </div>
</main>
</body>
</html>




