<?php

include 'connection.php';
session_start()

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
            <a class="a_nav" href="places.php"> PLACES </a>
            <a class="a_nav a_nav_clicked" href="index.php"> HOME </a>
    </nav>
    <div class="head-img">
        <h1 class="h1_head"> Find your next adventure.<br>
        <form class="search_index" action="places.php" method="post">
            <input class="search_text_index" type="text" value="Search... " name='search_place'
                   onclick="value=''">
            <input class="search_btn_nav search_btn_index" type="submit" name="submit" value="&#x1F50D">
        </form>
        </h1>
    </div>
</header>
<main class="main_index">
    <div>
        <p style="margin-top:15rem; margin-bottom:15rem;" class="welcome_p">Welcome to GuideSITE. New Zealand's most trusted tourist website.<br>
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




