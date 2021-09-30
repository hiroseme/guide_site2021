<?php

include 'connection.php';
session_start();

//getting PlaceID of selected place
if (isset($_GET['place'])) {
    $id = $_GET['place'];
} else {
    $id = 1;
}
//Query to get all the details of the selected place
$this_place_query = "SELECT PlaceID, Rating, PlaceName, Description,HouseNumber,ALT,StreetName,Town, PostCode, places.TypeID, ImageFile, regions.Name, placetypes.TypeName FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON places.TypeID=placetypes.TypeID WHERE PlaceID= '" . $id . "'";
$this_place_result = mysqli_query($con, $this_place_query);
$this_place_record = mysqli_fetch_assoc($this_place_result);

//Query to get all the reviews of the selected place
$reviews_query = "SELECT * FROM reviews WHERE PlaceID='$id'";
$reviews_result = mysqli_query($con, $reviews_query);

$reviews_query2 = "SELECT * FROM reviews WHERE PlaceID='$id'";
$reviews_result2 = mysqli_query($con, $reviews_query2);


//Query to get all productIDs and ProductNames
$all_places_query = "SELECT PlaceID, PlaceName FROM places";
$all_places_result = mysqli_query($con, $all_places_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> GuideSITE | <?php
        //displaying the place name in the title
        echo $this_place_record['PlaceName'];
        ?> </title>
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
        //checking if user is logged in
        if(isset($_SESSION['logged_in'])){
            $username = $_SESSION['logged_in'];
            echo "<a class='a_nav font_small' href='login.php'> Logged in as ".$username." </a>";
        }
        elseif(isset($_SESSION['logged_in_admin'])){
            $username_admin = $_SESSION['logged_in_admin'];
            echo "<a class='a_nav' href='login.php'> Logged in as ".$username_admin." </a>";
        }
        else {
            echo "<a class='a_nav' href='login.php'> LOGIN </a>";
        }
        ?>
        <a class="a_nav" href="about.php"> ABOUT </a>
        <a class="a_nav a_nav_clicked" href="places.php"> PLACES </a>
        <a class="a_nav" href="index.php"> HOME </a>
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
            //Displaying places details
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
        <?php
        if($this_place_record['Rating']==0){
            echo "<p>Rating: -/5.00</p>";
        }
        else{
            echo "<p>Rating: ".$this_place_record['Rating']."/5.00</p>";
        }
        echo "<h1>Reviews</h1>";
        //displaying selected place's reviews and rating
        echo "<div class='review_container_outer'>";
        while ($reviews_record = mysqli_fetch_assoc($reviews_result)) {
            //displaying each review in a separate div
            echo "<div class='review_container'>";
            echo "<p><b>" . $reviews_record['UserID']."</b> (".$reviews_record['Date'] . ")</p>";
            echo "<p>" . $reviews_record['Date'] . "</p>";
            echo "<p>Rating: " . $reviews_record['Rating'] . "</p>";
            echo "<p><b>" . $reviews_record['Description'] . "</b></p>";
            echo "</div>";
        }
        echo "</div>";
        if($this_place_record['Rating']==0){
            //if there are no reviews
            echo "<p>No reviews to show</p>";
        }
        if(isset($_SESSION['logged_in'])){
            //checking if user is logged in
            $username = $_SESSION['logged_in'];
            $review_check = 0;
            while($reviews_record2 = mysqli_fetch_assoc($reviews_result2)){
                //checking if user has written a review for the selected place yet
                if($reviews_record2['UserID']==$username){
                    $review_check = $review_check + 1;
                        }
                    }
            if($review_check==0){
                //if the user hasn't written a review yet, button to write a review is displayed
                echo "<form action='write_review.php' method='post'>
                        <input type='submit' name='place' value='Write a review' onclick='value=".$id."' >
                    </form>";
                }
            else{
                //if user has written a review already, message is displayed
                echo "<p>You have already written a review</p>";
            }
            }
        else {
            //if user isn't logged in as a user, button to log in page displayed
            echo "<a class='button' href='login.php'>Login to write a review</a>";
        }?>
    </div>
</main>
<footer>
    <div class="footer_container">
        <div class="footer_text">
            <p><b>Contact Us:<br></b><br>Ph: 020 123 4567<br>Email: guidesite@info.co.nz<br>Office Hours: 7:00am ~ 5:00pm /7 days<br>PO Box:32134</p>
            <p><b>Address:</b><br>1 Kiwi Avenue, Wellington<br></p>
        </div>
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2998.536516319165!2d174.77800201539225!3d-41.27542644765783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38ae2f27710d0d%3A0x2d0763d38f00974b!2sWellington%20Girls&#39;%20College!5e0!3m2!1sen!2snz!4v1632524713252!5m2!1sen!2snz" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <p class="footer_small">By Megumi Hirose 2021</p>
</footer>
</body>
</html>
