
<?php

include 'connection.php';
session_start();

//placeid of selected place
if (isset($_POST['place'])) {
    $id = $_POST['place'];
} else {
    //if there is no selected placeid, default is 1
    $id = 1;
}

//query to select details of selected place
$this_place_query = "SELECT * FROM places WHERE PlaceID='$id'";
$this_place_result =mysqli_query($con, $this_place_query);
$this_place_record = mysqli_fetch_assoc($this_place_result);

//checking id user is logged in
if(isset($_SESSION['logged_in'])){
    //if user is logged in...
    $username = $_SESSION['logged_in'];
}
else {
    //if user is not logged in, taken to log in page
    echo header("Location: login.php");
}
$reviewid = "$id$username"; //ReviewID is the PlaceID + UserName

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> GuideSITE | HOME </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>
<header>
    <nav class="nav_navy">
        <div class="nav_container">
            <img class="logo_img" src="GuideSITE.png" alt="Guide Site Logo">
            <form class="search_nav" action="search_results.php" method="post">
                <input class="search_text_nav" type="text" value="Search... " name='search_place'
                       onclick="value=''">
                <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
            </form>
            <?php
            //checking if user is logged in
            if(isset($_SESSION['logged_in'])){
                $username = $_SESSION['logged_in'];
                echo "<a class='a_nav' href='login.php'> Logged in as<br>".$username." </a>";
            }
            elseif(isset($_SESSION['logged_in_admin'])){
                $username_admin = $_SESSION['logged_in_admin'];
                echo "<a class='a_nav' href='login.php'> Logged in as ".$username_admin." </a>";
            }
            else {
                echo "<a class='a_nav' href='login.php'> LOGIN </a>";
            }
            ?>
            <a class="a_nav" href="index.php"> ABOUT </a>
            <a class="a_nav" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
        </div>
    </nav>
</header>
<main class="main_login">
    <div class="review_container2">
        <h2>Write a review for <?php echo $this_place_record['PlaceName']?></h2>
        <p>Reviewing as <?php echo $username ?></p>
        <!-- form for user to write review -->
        <form name="review_form" id="review_form" method="post" action="process_new_review.php">
            <label for="date">Date: <?php echo date("Y-m-d");?> </label>
            <input type='hidden' name='date' value='<?php //records today's date
            echo date("Y-m-d");?>'><br>
            <div class="stars">
                <!-- star rating -->
                <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                <label class="star star-1" for="star-1"></label>
            </div><br>
            <textarea class="review_box" placeholder="Write your review here..." type="text" name="description"></textarea><br>
            <!-- reviewid and placeid hidden so it's still posted to process_new_review.php -->
            <input type="hidden" name="reviewid" value="<?php echo $reviewid;?>">
            <input type="hidden" name="placeid" value="<?php echo $id;?>"><br>
            <input type="submit" name="submit" id="submit" value="Submit">
        </form>
    </div>
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
