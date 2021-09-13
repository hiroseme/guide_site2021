<?php

include 'connection.php';
session_start();

if (isset($_GET['place'])) {
    $id = $_GET['place'];
} else {
    $id = 1;
}
//Query to get all the details of the selected product
$this_place_query = "SELECT PlaceID, PlaceName, Description,HouseNumber, StreetName,Town, PostCode, places.TypeID, ImageFile, regions.Name, placetypes.TypeName FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON places.TypeID=placetypes.TypeID WHERE PlaceID= '" . $id . "'";
$this_place_result = mysqli_query($con, $this_place_query);
$this_place_record = mysqli_fetch_assoc($this_place_result);

$reviews_query = "SELECT * FROM reviews WHERE PlaceID='$id'";
$reviews_result = mysqli_query($con, $reviews_query);


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
        <form class="search_nav" action="places.php" method="post">
            <input class="search_text_nav" type="text" value="Search... " name='search_place'
                   onclick="value=''">
            <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
        </form>
        <?php
        if(isset($_SESSION['logged_in'])){
            $username = $_SESSION['logged_in'];
            echo "<a class='a_nav font_small' href='login.php'> Logged in as<br>".$username." </a>";
        }
        elseif(isset($_SESSION['logged_in_admin'])){
            $username_admin = $_SESSION['logged_in_admin'];
            echo "<a class='a_nav' href='login.php'> Logged in as ".$username_admin." </a>";
        }
        else {
            echo "<a class='a_nav' href='login.php'> LOGIN </a>";
        }
        ?>
        <a class="a_nav" href="password_maker.php"> ABOUT </a>
        <a class="a_nav" href="places.php"> PLACES </a>
        <a class="a_nav a_nav_clicked" href="index.php"> HOME </a>
    </nav>
</header>
<main class="main_more_info">
    <div class="head_info_img" style="
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
            echo $this_place_record['Name'];
            echo ", ";
            echo $this_place_record['PostCode'];
            ?> </p>
        <p>Type: <?php
            echo $this_place_record['TypeName'];?> </p>
        <p>Description:</p>
        <p><?php echo $this_place_record['Description'];?></p>
    </div>
    <div class="rating_container">
        <p>Reviews</p>
        <?php
        $rating = 0;
        $count = 0;
        while ($reviews_record = mysqli_fetch_assoc($reviews_result)) {
            $count = $count + 1;
            $rating = $rating + $reviews_record['Rating'];
            echo "<div class='review_container'>";
            echo "<p>" . $reviews_record['UserID']." (".$reviews_record['Date'] . ")</p>";
            echo "<p>" . $reviews_record['Date'] . "</p>";
            echo "<p>Rating: " . $reviews_record['Rating'] . "</p>";
            echo "<p><b>" . $reviews_record['Description'] . "</b></p>";
            echo "</div>";
        }
        if($count === 0){
            $final_rating = '-';
        }
        else{
            $final_rating = round($rating/$count,2);
        }
        echo "<p>Rating: ".$final_rating."/5.00</p>";

        if($count === 0){
            echo "<p>No reviews to show</p>";
        }
        if(isset($_SESSION['logged_in'])){
        $username = $_SESSION['logged_in'];
        echo "<form action='write_review.php' method='post'>
                <input type='submit' name='place' value='Write a review' onclick='value=".$id."' >
            </form>";
        }
        else {
            echo "<a href='login.php'>Login to write a review</a>";
        }?>
    </div>
</main>
</body>
</html>
