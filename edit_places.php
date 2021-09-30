<?php

session_start();
include 'connection.php';

// query to select all data form places table in database
$all_places_query = "SELECT * FROM places";
$all_places_result = mysqli_query($con, $all_places_query);
$all_places_record = mysqli_fetch_assoc($all_places_result);

//checking if user is logged in as an admin.
if(isset($_SESSION['logged_in_admin'])){
    $username_admin = $_SESSION['logged_in_admin'];
}
else {
    //sent to the log in page if not logged in as an admin
    echo "Must be logged in as an admin to access this page";
    echo header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> GuideSITE | EDIT </title>
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
            <?php
            //checking if user is logged in
            if(isset($_SESSION['logged_in'])){
                $username = $_SESSION['logged_in'];
                echo "<a class='font_small' href='login.php'> Logged in as<br>".$username." </a>";
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
        </div>
    </nav>
</header>
<main class="main_places">
    <h1 class="places_header">Edit Places</h1>
        <?php
        //displays all places in bullet points as a link
        while($row=mysqli_fetch_array($all_places_result))
        {
            $placename = $row['PlaceName'];
            echo "<form action='edit_places_form.php' method='post'>";
            echo "&#8226;";
            echo "<input class='blue_link' type='submit' name='PlaceName' id='PlaceName' value='$placename'>";
            echo "</form>";
            echo "<br>";
        }
        ?>
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
