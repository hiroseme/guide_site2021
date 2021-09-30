
<?php

include 'connection.php'; //connects to database
session_start()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> GuideSITE | LOGIN </title>
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
        echo "<a class='a_nav a_nav_clicked font_small' href='login.php'> Logged in as".$username." </a>";
    }
    elseif(isset($_SESSION['logged_in_admin'])){
        $username_admin = $_SESSION['logged_in_admin'];
        echo "<a class='a_nav a_nav_clicked font_small' href='login.php'> Logged in as ".$username_admin." </a>";
    }
    else {
        echo "<a class='a_nav a_nav_clicked' href='login.php'> LOGIN </a>";
    }
        ?>
            <a class="a_nav" href="index.php"> ABOUT </a>
            <a class="a_nav" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
        </div>
    </nav>
</header>
<main class="main_login">
    <?php
    //checking if user is logged in
    if(isset($_SESSION['logged_in'])){
        $username = $_SESSION['logged_in'];
        echo "<h1 class='margin_left'>You are logged in as ".$username."</h1>";
        echo "<a class='logout_btn' href='logout.php'> LOG OUT </a>";
    }
    //checking if user is logged in as an 'admin'
    elseif(isset($_SESSION['logged_in_admin'])){
        //if admin, edit and add buttons displayed
        $username_admin = $_SESSION['logged_in_admin'];
        echo "<h1 class='margin_left'>You are logged in as ".$username_admin." [Admin]</h1>";
        echo "<a class='button edit_places_btn' href='edit_places.php'>Edit places</a><br>";
        echo "<a class='button edit_places_btn' href='add_place.php'>Add a place</a><br>";
        echo "<a class='button logout_btn' href='logout.php'> LOG OUT </a><br>";
    }

    //if user is not logged in, log in form is displayed
    else {
        echo
            "<div class='login_container'>
    <h1>Log In</h1>
    <div class='user_login_container'>
    <!-- log in form for users -->
        <h3>User</h3>
        <form name='login_form' id='login_form' method='post' action='process_login_users.php'>
            <label for='username'>Username:</label>
            <input type='text' name='username'><br><br>
            <label for='password'>Password :</label>
            <input type='password' name='password'><br><br>";
            //error checking, if user doesn't enter everything
            if(isset($_SESSION['blank'])){
                echo "<p class='error_msg'>Fill in all the details</p>";
            }
            //error checking if user enters the wrong details
            elseif(isset($_SESSION['wrong_details'])){
                echo "<p class='error_msg'>Wrong Username or Password</p>";
            }
            echo
            "<input class='button' type='submit' name='submit' id='submit' value='Log In'>
        </form>
    <h4>Don't have an account?</h4>
    <a class='button' href='new_account.php'>Make an account</a>
    </div>
    <div class=user_login_container'>
    <!-- log in form for admins -->
    <h3>Admin</h3>
    <form name='login_form' id='login_form' method='post' action='process_login_admins.php'>
        <label for='username'>Username:</label>
        <input type='text' name='username'><br><br>
        <label for='password'>Password :</label>
        <input type='password' name='password'><br><br>";
            //error checking if user doesn't enter everything
            if(isset($_SESSION['blank_admin'])){
                echo "<p class='error_msg'>Fill in all the details</p>";
            }
            //error checking if user enters wrong details
            elseif(isset($_SESSION['wrong_details_admin'])){
                echo "<p class='error_msg'>Wrong Username or Password</p>";
            }
            echo "    
        <input class='button' type='submit' name='submit' id='submit' value='Log In'>
    </form>
    </div>";
        }?>
</main>
<footer>
    <div class="footer_container">
        <div class="footer_text">
            <p><b>Contact Us:<br></b><br>Ph: 020 123 4567<br>Email: guidesite@info.co.nz<br>Office Hours: 7:00am ~ 5:00pm /7 days<br>PO Box:32134</p>
            <p><b>Address:</b><br>1 Kiwi Avenue, Wellington<br></p>
        </div>
        <!-- embedded from google maps -->
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2998.536516319165!2d174.77800201539225!3d-41.27542644765783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38ae2f27710d0d%3A0x2d0763d38f00974b!2sWellington%20Girls&#39;%20College!5e0!3m2!1sen!2snz!4v1632524713252!5m2!1sen!2snz" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <p class="footer_small">By Megumi Hirose 2021</p>
</footer>
</body>
</html>
