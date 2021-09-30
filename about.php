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
        //checks if user is logged in
        //if user is logged in as a user...
        if(isset($_SESSION['logged_in'])){
            $username = $_SESSION['logged_in'];
            echo "<a class='a_nav font_small' href='login.php'> Logged in as<br>".$username." </a>";
        }
        //if user is logged in as an admin
        elseif(isset($_SESSION['logged_in_admin'])){
            $username_admin = $_SESSION['logged_in_admin'];
            echo "<a class='a_nav' href='login.php'> Logged in as ".$username_admin." </a>";
        }
        else {
            //if user is not logged in
            echo "<a class='a_nav' href='login.php'> LOGIN </a>";
        }
        ?>
        <a class="a_nav a_nav_clicked" href="about.php"> ABOUT </a>
        <a class="a_nav" href="places.php"> PLACES </a>
        <a class="a_nav" href="index.php"> HOME </a>
    </nav>
</header>
<main class="main_about"">
    <br><br><br><br>
    <img class='about_img' src="https://images.unsplash.com/photo-1486037242572-f25faf7505e3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTl8fHRyZWtraW5nfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60">
    <div class="about_text_container">
        <h1>!!!Notice!!!</h1>
        <p>Due to COVID-19, travelling is restricted. Our services will continue only under Level 1 & 2. Stay safe XX</p>
        <p><i>Pavlo Lamington & Coco Fisher</i></p>
        <br><br>
        <h1>About us</h1>
        <p>GuideSite was founded in 1987 in a small office in Wellington. The founders of GuideSite, Pavlo Lamington and Coco Fisher made GuideSite to help people find their next adventure.<br>Lamington and Fisher both love to tramp and sail. They made GuideSite as a place to share their favourite spots in NZ.
        <br>We are a not-for-profit organisation that support Kiwis who love to travel. </p>
        <br><br>
        <h1>Our Team</h1>
        <p>Everyone at GuideSite has a passion for travelling.<br>We have a wide range of employees in our customer service, IT and surveying departments.<br>We are a close-knit team and work together to make your experience the best it could be.</p>
        <br><br>
        <h1>Our Partners</h1>
        <p>At GuideSite be believe in supporting local businesses to make Aotearoa's economy thrive.<br>That's why GuideSite has partnerships with NZ-owned companies across the country.</p>
        <p><i>Proudly Sponsoring:</i></p>
        <a href="http://dtweb.wgc.school.nz/fordem/cake_shop_2021/"><img class="sponsor_img" src="Cakelogo.PNG"></a>
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




